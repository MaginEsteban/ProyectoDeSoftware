<?php
class Days_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    //permite obtener todos los dias disponibles para una programacion
    public function findAllDaysProgramming(){
        $this->db->select('id_dia_programacion,nombre as nombre_dia');
        $this->db->from('dia_programacion');
        $this->db->order_by( 'id_dia_programacion','CREC'); 
        $query = $this->db->get();

        return $query->result();
    }

}

?>