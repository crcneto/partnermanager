<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Página inicial do sistema
     * 
     */
    public function index(){
        
        $toview = [];
        
        try{
            echo "ok";
        } catch (Exception $ex) {
            
        } finally {
            $this->load->view('inc/header_view');
            $this->load->view('home/home_view', $toview);
            $this->load->view('inc/footer_view');
        }
    }
}