<?php
class Comedor_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($nombre,$id_ciudad,$direccion){
            $data = array(
               'nombre_comedor' => $nombre,
               'id_ciudad' => $id_ciudad,
               'direccion' => $direccion
            );
        $this->db->insert('comedor', $data);
    } 

    public function update($id, $nombre,$id_ciudad,$direccion){
            $data = array(
                'id_comedor' => $id,
                'nombre_comedor' => $nombre,
                'id_ciudad' => $id_ciudad,
                'direccion' => $direccion
            );
        $this->db->where('id_comedor', $id);
        $this->db->update('comedor', $data);
    }

    public function delete($id){
        $data = array(
                
            'activado' => FALSE,
            
        );
        $this->db->where('id_comedor', $id);
        $this->db->update('comedor', $data);
    
    }

    public function findAll(){
        $this->db->select('com.id_comedor, com.nombre as nombre_comedor, com.direccion_comedor as direccion, c.id_ciudad, c.nombre as nombre_ciudad, s.nombre as sede');
        $this->db->from('comedor as com');
        $this->db->join('ciudad as c', 'com.id_ciudad = c.id_ciudad');
        $this->db->join('sede as s', 'c.id_sede = s.id_sede');
        $this->db->where('com.activado', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function findAllNotAsigned(){
       
        $this->db->select('com.id_comedor, com.nombre as nombre_comedor, com.direccion_comedor, c.id_ciudad, c.nombre as nombre_ciudad');
        $this->db->from('comedor as com');
        $this->db->join('ciudad as c', 'com.id_ciudad = c.id_ciudad');
        $this->db->where('com.activado', 1);
        $this->db->where('com.id_usuario',0);
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
        $this->db->select('com.id_comedor, com.nombre as nombre_comedor, com.direccion_comedor, c.id_ciudad, c.nombre as nombre_ciudad');
        $this->db->from('comedor as com');
        $this->db->join('ciudad as c', 'com.id_ciudad = c.id_ciudad');
        $this->db->where('com.id_comedor', $id);
        $query = $this->db->get();
        return $query->row(0,'Comedor_model');
    }

    public function updateUserComedor($id_usuario,$id_comedor){
        $data['id_usuario'] = $id_usuario;
        $this->db->where('id_comedor',$id_comedor);
        $this->db->update('comedor',$data);
    }

    public function find_comedor_by_id_user($id_usuario){
        $this->db->select('*');
        $this->db->from('comedor');
        $this->db->where('id_usuario',$id_usuario);
        $query = $this->db->get();
        return $query->row(0,'Comedor_model');
    }

    public function findByIdAdminComedor($id_usuario){
       
        $this->db->select('*');
        $this->db->from('comedor');
        $this->db->join('ciudad','comedor.id_ciudad = ciudad.id_ciudad');
        $this->db->where('id_usuario',$id_usuario);
         $query = $this->db->get();
         return $query->row(0);
    }
    

    public function find_all_comedores_fav_by_id_user($id_usuario){
        $this->db->select('*');
        $this->db->from('comedor_favorito');
        $this->db->join('comedor','comedor_favorito.id_comedor = comedor.id_comedor');
        $this->db->join('ciudad','comedor.id_ciudad = ciudad.id_ciudad');
        $this->db->where('comedor_favorito.id_usuario',$id_usuario);
        $query = $this->db->get();
        return $query->result();
    }

    public function es_favorito($id_usuario,$id_comedor)
    {
        $this->db->select('id_comedor_favorito');
        $this->db->from('comedor_favorito');
        $this->db->where('comedor_favorito.id_usuario',$id_usuario);
        $this->db->where('comedor_favorito.id_comedor',$id_comedor);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_comedor_favorito($usuario,$comedor)
    {
        $data = array(
            'id_usuario' => $usuario,
            'id_comedor' => $comedor
         );
     $this->db->insert('comedor_favorito', $data);
        
    }

    public function delete_comedor_favorito($id_usuario,$id_comedor)
    {
        $this->db->where('id_comedor', $id_usuario);
        $this->db->where('id_usuario', $id_comedor);
        $this->db->delete('comedor');
    }
    
    public function esUserAdminComedor($id_user){
        $this->db->select('id_comedor,id_usuario');
        $this->db->from('comedor');
        $this->db->where('id_usuario', $id_user);
        $query = $this->db->get();

        return $query->row(0,'Comedor_model');
    }

    public function check($nombreComedor,$idCiudad){

        $this->db->select('*');
        $this->db->from('comedor as com');
        $this->db->where('com.nombre',$nombreComedor);
        $this->db->where('com.id_ciudad',$idCiudad);

        return $this->db->count_all_results();
    }

}