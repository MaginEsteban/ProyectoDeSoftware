<?php
class Turno_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($nombre,$hora_inicio,$hora_fin,$id_comedor){
            $data = array(
               'nombre' => $nombre,
               'hora_inicio' => $hora_inicio,
               'hora_fin' => $hora_fin,
               'id_comedor' => $id_comedor
            );
        $this->db->insert('turno', $data);
    } 

    public function update($id, $nombre,$hora_inicio,$hora_fin,$id_comedor){
        $data = array(
               'nombre' => $nombre,
               'hora_inicio' => $hora_inicio,
               'hora_fin' => $hora_fin,
               'id_comedor' => $id_comedor
            );
        $this->db->where('id_turno', $id);
        $this->db->update('turno', $data);
        
    }

    public function delete($id){
            $this->db->where('id_turno', $id);
            $this->db->delete('turno');
        
    }
    public function findAll(){
        $this->db->select('t.id_turno, t.nombre, t.hora_inicio, t.hora_fin, c.nombre as nombre_comedor, ciu.nombre as nombre_ciudad');
        $this->db->from('turno as t');
        $this->db->join('comedor as c', 't.id_comedor = c.id_comedor');
        $this->db->join('ciudad as ciu', 'c.id_ciudad = ciu.id_ciudad');
       
         $query = $this->db->get();
        
        return $query->result();
    }

    public function findAllComedores(){
        $this->db->select('com.id_comedor, com.nombre as nombre_comedor, c.id_ciudad, c.nombre as nombre_ciudad');
        $this->db->from('comedor as com');
        $this->db->join('ciudad as c', 'com.id_ciudad = c.id_ciudad');
        $query = $this->db->get();
        return $query->result();
    }

    public function findById($id){
        $this->db->select('tu.id_turno, tu.nombre as nombre_turno,tu.id_comedor, tu.hora_inicio, tu.hora_fin ');
        $this->db->from('turno tu');
        $this->db->join('comedor co', 'tu.id_comedor = co.id_comedor');
        $this->db->where('tu.id_turno', $id);
        $query = $this->db->get();
        return $query->row(0,'Turno_model');
    }

    public function findTurnosByIdComedor($id_comedor){
       
        $this->db->select('*');
        $this->db->from('turno');
        $this->db->where('id_comedor',$id_comedor);
        $query = $this->db->get();
        return $query->result();
    }

    public function findHoraTurno($id_turno){
        $this->db->select('hora_inicio, hora_fin');
        $this->db->from('turno');
        $this->db->where('id_turno',$id_turno);
        $query = $this->db->get();
        return $query->row(0,'Turno_model');
    }

    public function check($nombre,$hora_inicio,$hora_fin,$comedor){

        $this->db->select('*');
        $this->db->from('turno as t');
        $this->db->where('t.nombre',$nombre); 
        $this->db->where('t.hora_inicio',$hora_inicio);
        $this->db->where('t.hora_fin',$hora_fin);
        $this->db->where('t.id_comedor',$comedor);

        return $this->db->count_all_results();
    }
}
