<?php

class Msg {
    
    private $CI;


    public function __construct() {
        $this->CI = & get_instance();
    }
    
    public  function erro($msg){
        if($msg!=null && $msg!=''){
            $this->CI->session->set_flashdata('erro_mensagem', $msg);
        }
    }
    
    public function sucesso($msg){
       if($msg!=null && $msg!=''){
            $this->CI->session->set_flashdata('sucesso_mensagem', $msg);
        }
    }
}

