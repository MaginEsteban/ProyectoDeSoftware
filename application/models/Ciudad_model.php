<?php
class Ciudad_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function findAll(){
        $this->db->select('c.id_ciudad, c.nombre as nombre, s.id_sede, s.nombre as nombre_sede');
        $this->db->from('ciudad as c');
        $this->db->join('sede as s', 'c.id_sede = s.id_sede');
        $query = $this->db->get();
        return $query->result();
    }

}
