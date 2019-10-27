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
        $this->db->select('*');
        $this->db->from('turno');
        $this->db->join('comedor', 'turno.id_comedor = comedor.id_comedor');
        $query = $this->db->get();
        return $query->result();
    }


    public function findById($id){
        $this->db->select('*');
        $this->db->from('turno tu');
        $this->db->join('comedor co', 'tu.id_comedor = co.id_comedor');
        $this->db->where('tu.id_turno', $id);
        $query = $this->db->get();
        return $query->row(0,'Turno_model');
    }

}
