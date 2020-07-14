<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

    private $tabela;

    public function __construct() {
        //parent::__construct();
    }

    //define a tabela
    public function set_tabela($tabela) {
        $this->tabela = $tabela;
    }

    /**
     * Retorna todas as tuplas da tabela 
     * @param string $order = 'campo ASC/DESC'
     * @return array
     */
    public function get_all($order = null, $status = null) {
        $this->db->from($this->tabela);
        if($status!=NULL) {
            $this->db->where('status', $status);
        }
        if ($order) {
            $this->db->order_by($order);
        }
        $rs = $this->db->get();
        return $rs->result_array();
    }

    /**
     * Retorna a tupla identificada pelo campo ID (identificador)
     * @param int $id
     * @return array
     */
    public function get_by_id($id) {
        $this->db->from($this->tabela);
        $this->db->where('id', $id);
        $rs = $this->db->get();
        return $rs->row_array();
    }

    public function exists($id) {
        $this->db->from($this->tabela);
        $this->db->where('id', $id);
        $rs = $this->db->get();
        if ($rs->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Insert or Update dependendo do parâmetro $id.
     * @param int $id
     * @param array $dados ['campo1'=>'valor1', 'campo2'=>'valor2', ...]
     * @return boolean verificado por 'transaction'
     */
    public function save($dados, $id = null) {
        if ($id) {
            $this->db->trans_begin();
            $this->db->where("id", $id);
            $this->db->update($this->tabela, $dados);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        } else {
            $this->db->trans_begin();
            $this->db->insert($this->tabela, $dados);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
    }

    /**
     * Insert or Update dependendo do parâmetro $dados['id'].
     * @param int $dados['id']
     * @param array $dados ['campo1'=>'valor1', 'campo2'=>'valor2', ...]
     * @return boolean verificado por 'transaction'
     */
    public function insert($dados) {

        if (isset($dados['id']) && is_numeric($dados['id'])) {
            $this->db->trans_begin();
            $this->db->where("id", $dados['id']);

            $this->db->update($this->tabela, $dados);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        } else {
            $this->db->trans_begin();
            $this->db->insert($this->tabela, $dados);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
    }

    /**
     * Define 'STATUS=0'. NÃO DELETA A TUPLA.
     * @param int $id
     * @return boolean verificado por 'transaction'
     */
    public function delete($id) {
        $this->db->trans_begin();
        $dados = ['status' => 0];
        $this->db->where("id", $id);
        $this->db->update($this->tabela, $dados);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    /**
     * ****ATENÇÃO****
     * REMOVE A TUPLA. Não pode ser desfeito. Prefira 'delete'
     * @param int $id
     * @return boolean verificado por 'transaction'
     */
    public function remove($id) {
        $this->db->trans_begin();
        $this->db->where("id", $id);
        $this->db->delete($this->tabela);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function desativa($id) {
        $this->db->where('id', $id);
        $this->db->set('status', 0);
        $this->db->update($this->tabela);
        if ($this->db->affected->rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function ativa($id) {
        $this->db->where('id', $id);
        $this->db->set('status', 2);
        $this->db->update($this->tabela);
        if ($this->db->affected->rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
