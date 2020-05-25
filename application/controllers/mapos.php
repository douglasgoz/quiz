<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapos extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Sao_Paulo");
        $this->load->model('mapos_model','',TRUE);
    }

    public function index() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        $this->data['quiz'] = $this->mapos_model->listarQuizDisponivel();
        $this->data['view'] = 'mapos/painel';
        $this->load->view('tema/topo',  $this->data);      
    }

    public function inicio() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        $idQuiz = $this->input->post('idQuiz');

        if(!$idQuiz){
            redirect('mapos');
        }

        $this->data['quiz'] = $this->mapos_model->getQuiz($idQuiz);
        $this->data['questions'] = $this->mapos_model->getQuestions($idQuiz);
        $this->data['naoExibirMenu'] = 1;
        $this->data['view'] = 'mapos/exibir_quiz';
        $this->load->view('tema/topo',  $this->data);      
    }

    public function resultado() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        $idQuiz = $this->input->post('idQuiz');
        $resultados = $this->input->post('resultados');

        if((!$resultados) && (!$idQuiz)){
            redirect('mapos');
        }

        $this->data['idQuiz'] = $idQuiz;
        $this->data['resultados'] = $resultados;
        $this->data['respostas'] = $this->mapos_model->getRespostas($idQuiz);
        $this->data['view'] = 'mapos/exibir_resultado';
        $this->load->view('tema/topo',  $this->data);      
    }

    public function minhaConta() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        $this->data['usuario'] = $this->mapos_model->getById($this->session->userdata('id'));
        $this->data['tituloPagina'] = 'Meu perfil';
		$this->data['menuUsuarios'] = 1;
        $this->data['view'] = 'mapos/minhaConta';
        $this->load->view('tema/topo',  $this->data);     
    }

    public function login(){ 
        $this->load->view('mapos/login');        
    }

    public function cadastro(){ 
        $this->load->view('mapos/cadastro');        
    }

    public function registro(){ 
        if(!$this->input->post('email') || !$this->input->post('senha')){
                redirect(base_url().'mapos/cadastro');

        }else{
                $this->load->library('encrypt');   
                $senha = $this->encrypt->sha1($this->input->post('senha'));
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'email' => $this->input->post('email'),
                    'senha' => $senha
                );
                $result = $this->mapos_model->add('usuarios', $dados);
                if ($result) {
                    redirect(base_url().'mapos/login?acao=cadastro');
                }else{
                    redirect(base_url().'mapos/cadastro');
                }
        }
    }
	
    public function sair(){
        $this->session->sess_destroy();
        redirect('mapos/login');
    }


    public function verificarLogin(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome','Nome','required|xss_clean|trim');
        $this->form_validation->set_rules('senha','Senha','required|xss_clean|trim');
        $ajax = $this->input->get('ajax');
        if ($this->form_validation->run() == false) {
            
            if($ajax == true){
                $json = array('result' => false);
                echo json_encode($json);
            }
            else{
                redirect($this->login);
            }
        } 
        else {

            $nome = $this->input->post('nome');
            $senha = $this->input->post('senha');

            $this->load->library('encrypt');   
            $senha = $this->encrypt->sha1($senha);

            $this->db->where('nome',$nome);
            $this->db->where('senha',$senha);
            $this->db->limit(1);
            $usuario = $this->db->get('usuarios')->row();
            if(count($usuario) > 0){

                $dados = array('nome' => $usuario->nome, 'id' => $usuario->idUsuarios, 'logado' => TRUE);
                $this->session->set_userdata($dados);

                if($ajax == true){
                    $json = array('result' => true);
                    echo json_encode($json);
                }
                else{
                    if($usuario->idUsuarios == 39){
                        redirect(base_url().'admin');
                    }else{
                        redirect(base_url().'mapos');
                    }                    
                }

                
            }
            else{

                if($ajax == true){
                    $json = array('result' => false);
                    echo json_encode($json);
                }
                else{
                    redirect($this->login);
                }
            }
            
        }
        
    }

    function fetch(){

            if($this->input->post('view') != ''){
                $dados = array(
                    'usuarios' => $this->session->userdata('id')
                );
                $this->mapos_model->atualizarNotificacoes($dados);
            }

            $output = '';
            $count = $this->mapos_model->totalNotificacoes();
            $notificacoes = $this->mapos_model->getNotificacoes();

            if($notificacoes){
                foreach ($notificacoes as $a) {
                    $output .= '
                       <li>
                       <a href="'.base_url().'eventos/agenda?idBanda='.$a->idBanda.'">
                       <strong>'.$a->titulo.'</strong><br />
                       <span><em>'.$a->texto.'</em></span>
                       </a>
                       </li>
                       <hr style="padding: 0; margin: 0">
                    ';
                }
            }else{
                $output .= '<li style="text-align: center; color: black">Nenhuma novidade</li>';
            }

            $data = array(
                'notification' => $output,
                'unseen_notification'  => $count
            );
            echo json_encode($data);

    }
    
}
