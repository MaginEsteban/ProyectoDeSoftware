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

    public function findAllNotAsigned(){
        $this->db->select('*');
        $this->db->from('comedor');
        $this->db->join('ciudad', 'comedor.id_ciudad = ciudad.id_ciudad');
        $this->db->where('id_usuario',0);
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

}
