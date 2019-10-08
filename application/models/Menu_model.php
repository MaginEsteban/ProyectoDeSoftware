<?php
class Menu_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($nombre,$descripcion,$id_tipo_menu,$id_comedor){
            $data = array(
               'nombre' => $nombre,
               'descripcion' => $descripcion,
               'id_tipo_menu' => $id_tipo_menu,
               'id_comedor' => $id_comedor
            );
        $this->db->insert('menu', $data);
    } 

    public function update($id, $nombre,$descripcion,$id_tipo_menu,$id_comedor){
        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'id_tipo_menu' => $id_tipo_menu,
            'id_comedor' => $id_comedor
         );
        $this->db->where('id_menu', $id);
        $this->db->update('menu', $data);
    }

    public function delete($id){
            $this->db->where('id_menu', $id);
            $this->db->delete('menu');
        
    }
    public function findAll(){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('tipo_menu', 'menu.id_tipo_menu = tipo_menu.id_tipo_menu');
        $this->db->join('comedor', 'menu.id_comedor = comedor.id_comedor');
       
         $query = $this->db->get();
        
        return $query->result();
    }

    public function findAllTiposDeMenu(){

        $this->db->select('*');
        $this->db->from('tipo_menu');
        $query = $this->db->get();
        return $query->result();
    }

    public function findAllComedores(){

        $this->db->select('*');
        $this->db->from('comedor');
       
         $query = $this->db->get();
        
        return $query->result();
    }
    
    public function findById($id){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('tipo_menu', 'menu.id_tipo_menu = tipo_menu.id_tipo_menu');
        $this->db->join('comedor', 'menu.id_comedor = comedor.id_comedor');
        $this->db->where('id_menu', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }
     

}
