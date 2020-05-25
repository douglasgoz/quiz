<?php
require dirname(__FILE__)."/../_autoload.class.php";
        use CWG\PagSeguro\PagSeguroAssinaturas;
        
class Mapos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        $this->db->where('idEmpresa', $this->session->userdata('idEmpresa'));
        if($where){
            $this->db->where($where);
        }        
        $query = $this->db->get();        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function listarQuizDisponivel(){
        $this->db->where('dataInicio <=', date('Y-m-d H:i'));
        $this->db->where('dataFim >=', date('Y-m-d H:i'));
        return $this->db->get('quiz')->result();
    }

    function buscarRespostas($id){
        $this->db->where('idQuiz', $id);
        $this->db->where('idUsuario', $this->session->userdata('id'));
        $this->db->limit(1);
        return $this->db->get('quiz_respostas')->row();
    }

    function getQuiz($id){
        // $this->db->where('dataInicio <', date('Y-m-d'));
        $this->db->where('idQuiz', $id);
        return $this->db->get('quiz')->row();
    }

    function getQuestions($id){
        // $this->db->where('dataInicio <', date('Y-m-d'));
        $this->db->where('idQuiz', $id);
        return $this->db->get('quiz_perguntas')->result();
    }

    function getById($id){
        $this->db->from('usuarios');
        $this->db->select('usuarios.*, permissoes.nome as permissao');
        $this->db->join('permissoes', 'permissoes.idPermissao = usuarios.permissoes_id', 'left');
        $this->db->where('idUsuarios',$id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1'){
			return TRUE;
		}		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0){
			return TRUE;
		}		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1'){
			return TRUE;
		}		
		return FALSE;        
    }   
	
	function count($table){
		return $this->db->count_all($table);
	}

    function getUsuario($id){
        $this->db->where('idUsuarios', $id);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }

    function getRespostas($id){
        $this->db->where('idQuiz', $id);
        return $this->db->get('quiz_perguntas')->result();
    }

    function verificarResposta($idQuiz, $idUsuario){
        $this->db->where('idQuiz', $idQuiz);
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->get('quiz_respostas')->result();
    }
}