<?php
class Comedor_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($nombre,$id_ciudad){
            $data = array(
               'nombre_comedor' => $nombre,
               'id_ciudad' => $id_ciudad
            );
        $this->db->insert('comedor', $data);
    } 

    public function update($id, $nombre,$id_ciudad){
            $data = array(
                'id_comedor' => $id,
                'nombre_comedor' => $nombre,
                'id_ciudad' => $id_ciudad
            );
        $this->db->where('id_comedor', $id);
        $this->db->update('comedor', $data);
    }

    public function delete($id){
            $this->db->where('id_comedor', $id);
            $this->db->delete('comedor');
        
    }
    public function findAll(){
        $this->db->select('*');
        $this->db->from('comedor');
        $this->db->join('ciudad', 'comedor.id_ciudad = ciudad.id_ciudad');
       
         $query = $this->db->get();
        
        return $query->result();
    }

    public function findAllCiudades(){

        $this->db->select('*');
        $this->db->from('ciudad');
        $this->db->join('sede', 'ciudad.id_sede = sede.id_sede');

        $query = $this->db->get();
        
        return $query->result();
    }

    public function findById($id){
        $this->db->select('*');
        $this->db->from('comedor');
        $this->db->join('ciudad', 'comedor.id_ciudad = ciudad.id_ciudad');
        $this->db->where('id_comedor', $id);
        $query = $this->db->get();
        return $query->row(0,'Comedor_model');
    }

}
