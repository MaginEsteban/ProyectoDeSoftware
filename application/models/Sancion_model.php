<?php
class Sancion_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($fecha,$hora,$descripcion,$id_persona){
            $data = array(
               'fecha' => $fecha,
               'hora' => $hora,
               'descripcion' => $descripcion,
               'id_persona' => $id_persona
            );
        $this->db->insert('sancion', $data);
    } 

    public function update($id, $fecha,$hora,$descripcion,$id_persona){
        $data = array(
                'fecha' => $fecha,
                'hora' => $hora,
                'descripcion' => $descripcion,
                'id_persona' => $id_persona
            );
        $this->db->where('id_sancion', $id);
        $this->db->update('sancion', $data);
        
    }

    public function delete($id){
            $this->db->where('id_sancion', $id);
            $this->db->delete('sancion');
        
    }
    public function findAll(){
        $this->db->select('*');
        $this->db->from('sancion');
        $this->db->join('persona', 'sancion.id_persona = persona.id_persona');
       
         $query = $this->db->get();
        
        return $query->result();
    }

    public function findById($id){
        $this->db->select('*');
        $this->db->from('sancion');
        $this->db->join('persona', 'sancion.id_persona = persona.id_persona');
        $this->db->where('sancion.id_sancion', $id);
        $query = $this->db->get();
        return $query->row(0,'Sancion_model');
    }

    public function findSancionesByLegajo($legajo){
        $this->db->select('*');
        $this->db->from('sancion');
        $this->db->join('persona', 'sancion.id_persona = persona.id_persona');
        $this->db->where('persona.numero_legajo', $legajo);
        $query = $this->db->get();

        return $query->result();


    }
}
