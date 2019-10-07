<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
   
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($id = null,$id_persona,$tipo_usuario,$nombre,$contraseña){
            $data = array(
               'id_usuario' => $id,
               'id_persona' => find_by_id_person($id_persona),
               'id_tipo_usuario' => $tipo_usuario,
               'nombre' => $nombre,
               'contraseña' => $contraseña
            );
        $this->db->insert('usuario', $data);
    } 

    public function update($id,$id_persona,$tipo_usuario,$nombre,$contraseña){
            $data = array(
                'id_usuario' => $id,
                'id_persona' => find_by_id_person($id_persona),
                'id_tipo_usuario' => $tipo_usuario,
                'nombre' => $nombre,
                'contraseña' => $contraseña
            );
        $this->db->where('id', $id);
        $this->db->update('usuario', $data);
    }

    public function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('usuario');
        
    }
    public function findAll(){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('persona', 'persona.id_persona = usuario.id_persona');
       
         $query = $this->db->get();
        
        return $query->result();
    }

    private function find_by_id_person ($id){
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where(array('id_persona'=>$id));
        $query = $this->db->get();
        return $query->result();
    }
      
}

?>