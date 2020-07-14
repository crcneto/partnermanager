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
        try {
            
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            $this->load->view("entidade/cadastro_view", $toview);
        }
    }

    public function create() {
        try {
            
        } catch (Exception $ex) {
            $this->msg->erro($ex->getMessage());
        } finally {
            
        }
    }

}
