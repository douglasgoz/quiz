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
        $this->data['ranking'] = $this->admin_model->ranking();
        $this->data['view'] = 'admin/ranking';
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

    public function quiz(){
        if($this->uri->segment(3)){
            $this->data['quiz'] = $this->admin_model->getById($this->uri->segment(3));
            $this->data['perguntas'] = $this->admin_model->getPerguntas($this->uri->segment(3));
            $this->data['view'] = 'admin/listar_perguntas';
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

    public function excluirQuiz(){
        $id = $this->input->post('id');
        if($id != null){
            $this->admin_model->excluirQuiz($id);
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
