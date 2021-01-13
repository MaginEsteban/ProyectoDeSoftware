<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
   
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function find($name,$pass){
               
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('tipo_usuario','usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario' );
        $this->db->where(array('nombre'=>$name,'contraseña'=>$pass));
        $query = $this->db->get();
        return $query->row(); 
    }

    public function find_by_id($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('tipo_usuario','usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario' );
        $this->db->where('id_usuario',$id);
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }
      

}

?>