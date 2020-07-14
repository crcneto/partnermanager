<?php

class Entidade extends CI_Controller {

    public function index() {
        $toview = [];
        try {
            $this->load->model("entidade_model", "em");
            
            $lista = $this->em->get_all("razao ASC", 2);
            
            $toview['entidades'] = $lista;
            
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            $this->load->view("inc/header_view");
            $this->load->view("entidade/lista_view", $toview);
            $this->load->view("inc/footer_view");
        }
    }

    public function cadastro() {
        $toview = [];
        $e = [
            'id'=> '',
            'razao'=> '',
            'fantasia'=> '',
            'cnpj'=> '',
            'descricao'=> '',
            'obs'=> '',
        ];
        try {
            
            if($this->input->post('id')){
                $this->load->model('entidade_model', 'em');
                $e = $this->em->get_by_id($this->input->post('id'));
            }
            
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            $toview['e'] = $e;
            $this->load->view("entidade/cadastro_view", $toview);
        }
    }

    public function create() {
        try {
            $this->load->model("entidade_model", "em");
            
            $p = $this->input->post();
            
            $e = null;
            
            if(isset($p['id'])){
                $e = $this->em->get_by_id($p['id']);
            }
            
            if(isset($p['razao']) && $p['razao']!=NULL){
                $e['razao'] = $p['razao'];
            }
            
            if(isset($p['fantasia'])){
                $e['fantasia'] = $p['fantasia'];
            }
            
            if(isset($p['cnpj']) && $p['cnpj']!=NULL){
                $e['cnpj'] = $p['cnpj'];
            }
            if(isset($p['descricao']) && $p['descricao']!=NULL){
                $e['descricao'] = $p['descricao'];
            }
            if(isset($p['obs']) && $p['obs']!=NULL){
                $e['obs'] = $p['obs'];
            }
            
            if($this->em->insert($e)){
                $this->msg->sucesso("Entidade cadastrada com sucesso");
            }else{
                throw new Exception("Erro ao cadastrar entidade");
            }
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            redirect('entidade');
        }
    }

}
