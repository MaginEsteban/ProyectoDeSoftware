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
        
        return $query->row(0,'Menu_model');
    }
     

    //retorn todos los menus de una comedor
    public function findAllByIdComedor($id_comedor){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('id_comedor',$id_comedor);
        $query = $this->db->get();
       
        return $query->result();
    }

    // eliminar menu de una programacion
    public function delete_programacion_menu($id_programacion_menu){
        $this->db->where('id_programacion_menu',$id_programacion_menu);
        $this->db->delete('programacion_menu');
    }

    // agrega una menu a una programacion
    public function add_programacion_menu($turno,$dia,$menu){
        $this->db->trans_start();
        $data_programacion = array(
            
            'id_turno' => $turno,
            'id_dia_programacion' => $dia
        );
        
        $this->db->set($data_programacion);
        $this->db->insert('programacion');

        $ultimoIdProgramacion = $this->db->insert_id();

        $data_programacion_menu = array(
            
            'id_programacion' => $ultimoIdProgramacion,
            'id_menu' => $menu
        );
         
        $this->db->set($data_programacion_menu);
        $this->db->insert('programacion_menu');
        $this->db->trans_complete();
    }



    //retorna todo los menus asignados a los turnos
    public function findAllByIdTurno($id_Turno){
        $this->db->select('*');
        $this->db->from('programacion');
        $this->db->where('programacion.id_turno',$id_Turno);
        $this->db->join('programacion_menu','programacion_menu.id_programacion=programacion.id_programacion');
        $this->db->join('menu','menu.id_menu=programacion_menu.id_menu');
        $this->db->join('dia_programacion','dia_programacion.id_dia_programacion=programacion.id_dia_programacion');
        $query = $this->db->get();
        return $query->result();
    }
}
