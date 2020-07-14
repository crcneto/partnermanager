<?php

class Usuario_model extends My_model{
    
    public function __construct() {
        parent::__construct();
        $this->set_tabela("usuario");
    }
    
    public function autentica($login){
        $passwd = hash('sha256', $login['senha']);
        $mail = $login['email'];
        $this->db->from('usuario');
        $this->db->where('email', $mail);
        $this->db->where('senha', $passwd);
        $rs = $this->db->get();
        if($rs->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function existe_email($email){
        $this->db->from("usuario");
        $this->db->where("email", $email);
        $rs = $this->db->get();
        if($rs->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_by_email($email){
        $this->db->from("usuario");
        $this->db->where("email", $email);
        $this->db->limit(1);
        $rs = $this->db->get();
        if($rs->num_rows()<1){
            throw new Exception("Usuário não localizado");
        }
        $usuario = $rs->row_array();
        unset($usuario['senha']);
        
        return $usuario;
    }
}