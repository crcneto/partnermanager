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
            
            $this->msg->sucesso("Tudo OK");
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            redirect(site_url('autenticacao'));
        }
    }
}

