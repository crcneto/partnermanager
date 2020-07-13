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
            
            $auth = [
                "email"=>$login,
                "senha"=>$senha
            ];
            
            /*
            if($login=='claudiorcneto@gmail.com' && hash('sha256', $senha)=='562cb08c67d35b1445ba1f7ef0ac8ef91fe0705f0e16480fdc697b618c19c83e'){
                $this->msg->sucesso("Tudo OK");
            **/
            $this->load->model("usuario_model", "um");
         
            if($this->um->autentica($auth)){
                $usuario = $this->um->get_by_email($login);
                
                $this->session->set_userdata("usuario", $usuario);
                $this->session->set_userdata("operador", $usuario['id']);
                $nome = ucwords($usuario['nome']);
                $this->msg->sucesso("$nome, seja bem-vindo ao Sistema de Administração de Associações!");
            }else{
                throw new Exception("Combinação E-mail/Senha incorreta".hash('sha256', $senha));
            }
            
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            redirect(site_url());
        }
    }
    
    public function logout() {
        //destrói a sessão e redireciona para a página inicial
        $this->session->sess_destroy();
        redirect(site_url());
    }
}

