<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
   
    public function __construct()
    {
        $this->load->helper('url');
    }
    
    public function findAll(){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('persona', 'persona.id_persona = usuario.id_persona');
       
         $query = $this->db->get();
        
        return $query->result();
    }

      

}

?>