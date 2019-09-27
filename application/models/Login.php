<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model{
   
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function find(){
        return $this->db->get('persona');
    }

      

}

?>