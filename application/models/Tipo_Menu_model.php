<?php
class Tipo_Menu_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function findAll(){
        $this->db->select('*');
        $this->db->from('tipo_menu');
        $query = $this->db->get();
        return $query->result();
    }
}
?>