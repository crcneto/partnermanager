<?php

class Autenticacao extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
        try{
            
        } catch (Exception $ex) {
            
            
        } finally {
            $this->load->view('inc/header_view');
            $this->load->view('autenticacao/index_view');
            $this->load->view('inc/footer_view');
        }
    }
    
    public function login(){
        try{
            $login = $this->input->post('login');
            $senha = $this->input->post('senha');
            
            if(!$login || $login== ""){
                throw new Exception('Não foi possível determinar o login');
            }
            
            if(!$senha || $senha==''){
                throw new Exception('Senha inválida');
            }
            if($login=='claudiorcneto@gmail.com' && hash('sha256', $senha)=='562cb08c67d35b1445ba1f7ef0ac8ef91fe0705f0e16480fdc697b618c19c83e'){
                $this->msg->sucesso("Tudo OK");
            }else{
                throw new Exception("Senha incorreta");
            }
            
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            redirect(site_url('autenticacao'));
        }
    }
}

