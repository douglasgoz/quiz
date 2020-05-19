<?php
class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getQuiz(){
        return $this->db->get('quiz')->result();
    }

    function ranking(){
        $this->db->select(
            '*, 
            sum(percentual)'
        );
        $this->db->group_by('idUsuario');
        $this->db->order_by('sum(percentual)', 'DESC');
        return $this->db->get('quiz_respostas')->result();
    }

    function getRanking(){
        $this->db->limit(10);
        $this->db->where('idUsuarios !=', 39);
        return $this->db->get('usuarios')->result();
    }

    function getUsuarios(){
        $this->db->where('idUsuarios !=', 39);
        return $this->db->get('usuarios')->result();
    }

    function getNomeUsuario($id){
        $this->db->where('idUsuarios', $id);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }

    function getPontosUsuario($id){
        $this->db->select_sum('percentual');
        $this->db->from('quiz_respostas');
        $this->db->where('idUsuario', $id);
        return $this->db->get()->row()->percentual;
    }

    function getUltimoQuiz(){
        $this->db->limit(1);
        $this->db->order_by('idQuiz', 'DESC');
        return $this->db->get('quiz')->row()->idQuiz;
    }

    function getPerguntas($id){
        $this->db->where('idQuiz', $id);
        return $this->db->get('quiz_perguntas')->result();
    }

    function getById($id){
        $this->db->where('idQuiz',$id);
        $this->db->limit(1);
        return $this->db->get('quiz')->row();
    }

    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function excluirQuiz($ID){
        $this->db->where('idQuiz', $ID);
        $this->db->delete('quiz');
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }       
        return FALSE;        
    }

    function excluirPergunta($ID){
        $this->db->where('idPergunta', $ID);
        $this->db->delete('quiz_perguntas');
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }       
        return FALSE;        
    }

    function excluirUsuario($ID){
        $this->db->where('idUsuarios', $ID);
        $this->db->delete('usuarios');
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }       
        return FALSE;        
    }

    function excluirRespostas($ID){
        $this->db->where('idUsuario', $ID);
        $this->db->delete('quiz_respostas');
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }       
        return FALSE;        
    }
	
	function total($table){
        $this->db->where('idEmpresa', $this->session->userdata('idEmpresa'));
		return $this->db->count_all_results($table);
	}
}