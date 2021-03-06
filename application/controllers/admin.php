<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

 
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Sao_Paulo");
        $this->load->model('admin_model','',TRUE);
        $this->load->model('mapos_model');
    }

    public function index() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        if(!$this->session->userdata('permissao') != 39){
            redirect(base_url());
        }

        $this->data['quiz'] = $this->admin_model->getQuiz();
        $this->data['view'] = 'admin/listar_quiz';
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

        $this->data['view'] = 'mapos/exibir_quiz';
        $this->load->view('tema/topo',  $this->data);      
    }

    public function ranking(){
        $idQuiz = $this->admin_model->idUltimoRanking();

        if(@$_GET['rodada']){
            $this->data['rankingRodada'] = $this->admin_model->rankingRodada($idQuiz);
            $this->data['view'] = 'admin/rankingRodada';
        }else{
            $this->data['ranking'] = $this->admin_model->ranking();
            $this->data['view'] = 'admin/ranking';
        }
        $this->load->view('tema/topo', $this->data);
    }

    public function usuarios(){
        $this->data['usuarios'] = $this->admin_model->getUsuarios();
        $this->data['view'] = 'admin/listar_usuarios';
        $this->load->view('tema/topo', $this->data);
    }

    public function novo(){
        $this->data['view'] = 'admin/add_quiz';
        $this->load->view('tema/topo', $this->data);
    }

    public function addQuiz(){
        $t1 = strtotime(date($this->input->post('data').' '.$this->input->post('hora'))) + 60*60;
        $t2 = date('Y-m-d H:i', $t1);
        $dados = array(
            'descricao' => $this->input->post('descricao'),
            'dataInicio' => date($this->input->post('data').' '.$this->input->post('hora')),
            'dataFim' => $t2,
            'tempo' => $this->input->post('tempo'),
            'log' => date('Y-m-d H:i')
        );
        $result = $this->admin_model->add('quiz', $dados);
        if ($result) {
            redirect(base_url().'admin/quiz/'.$this->admin_model->getUltimoQuiz());
        }else{
            redirect(base_url().'admin');
        }
    }

    public function editarQuiz(){
        if($this->uri->segment(3)){
            $this->data['result'] = $this->admin_model->getById($this->uri->segment(3));
            $this->data['view'] = 'admin/editar_quiz';
            $this->load->view('tema/topo', $this->data);
        }else{
            redirect(base_url().'admin');
        }        
    }

    public function quiz(){
        if($this->uri->segment(3)){
            $this->data['quiz'] = $this->admin_model->getById($this->uri->segment(3));
            $this->data['perguntas'] = $this->admin_model->getPerguntas($this->uri->segment(3));
            $this->data['respostas'] = $this->admin_model->getTotalRespostas($this->uri->segment(3));
            $this->data['view'] = 'admin/listar_perguntas';
            $this->load->view('tema/topo', $this->data);
        }else{
            redirect(base_url().'admin');
        }        
    }

    public function verRespostas(){
        if($this->uri->segment(3)){
            $this->data['respostas'] = $this->admin_model->getRespostas($this->uri->segment(3));
            $this->data['quiz'] = $this->admin_model->getById($this->uri->segment(3));
            $this->data['view'] = 'admin/listar_respostas';
            $this->load->view('tema/topo', $this->data);
        }else{
            redirect(base_url().'admin');
        }        
    }

    public function novaPergunta(){
        if($this->uri->segment(3)){
            $this->data['quiz'] = $this->admin_model->getById($this->uri->segment(3));
            $this->data['view'] = 'admin/add_pergunta';
            $this->load->view('tema/topo', $this->data);
        }else{
            redirect(base_url().'admin');
        } 
    }

    public function addPergunta(){
        $id = $this->input->post('idQuiz');
        if($id != null){
            $alternativas = ($this->input->post('a1').'|'.$this->input->post('a2').'|'.$this->input->post('a3').'|'.$this->input->post('a4'));
            $dados = array(
                'idQuiz' => $id,
                'pergunta' => $this->input->post('pergunta'),
                'imagem' => $this->input->post('imagem'),
                'alternativas' => $alternativas,
                'resposta' => $this->input->post('resposta')
            );

            $result = $this->admin_model->add('quiz_perguntas', $dados);

            if ($result) {
                redirect(base_url().'admin/quiz/'.$this->input->post('idQuiz'));
            }else{
                redirect(base_url().'admin');
            }
        }
    }

    public function editarInfoQuiz(){
        $id = $this->input->post('idQuiz');
        $d = $this->input->post('data');
        $h = $this->input->post('hora');
        $data = date('Y-m-d H:i', strtotime($d.' '.$h));
        if($id != null){
            $dados = array(
                'descricao' => $this->input->post('descricao'),
                'dataInicio' => $data,
                'tempo' => $this->input->post('tempo')
            );

            $this->admin_model->edit('quiz', $dados, 'idQuiz', $id);
            redirect(base_url().'admin/quiz?status=editado');
        }
    }

    public function excluirQuiz(){
        $id = $this->input->post('id');
        if($id != null){
            $this->admin_model->excluirRespostasDoQuiz($id);
            $this->admin_model->excluirPerguntasDoQuiz($id);
            $this->admin_model->excluirQuiz($id);
        }
    }

    public function excluirRespostaIndividual(){
        $id = $this->input->post('id');
        if($id != null){
            $this->admin_model->excluirRespostaIndividual($id);
        }
    }

    public function excluirPergunta(){
        $id = $this->input->post('id');
        if($id != null){
            $this->admin_model->excluirPergunta($id);
        }
    }

    public function excluirUsuario(){
        $id = $this->input->post('id');
        if($id != null){
            $this->admin_model->excluirUsuario($id);
            $this->admin_model->excluirRespostas($id);
        }
    }
    
}
