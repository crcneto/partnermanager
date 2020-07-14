<?php

class Entidade_model extends My_model{
    
    public function __construct() {
        parent::__construct();
        $this->set_tabela("entidade");
    }
}