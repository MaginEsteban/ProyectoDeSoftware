<?php
class DetalleComedor_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function findAllSedes(){
        $this->db->select('*');
        $this->db->from('sede');
        $query = $this->db->get();
        return $query->result();
    }

    public function findAllCiudades($id_sede){
        $this->db->select('*');
        $this->db->from('ciudad');
        $this->db->where('id_sede', $id_sede);
        $query = $this->db->get();
        return $query->result();
    }
    public function findAllComedores($id_ciudad){
        $this->db->select('c.id_comedor, c.nombre, c.id_ciudad');
        $this->db->from('comedor as c');
        $this->db->where('c.id_ciudad', $id_ciudad);
        $this->db->where('c.activado', 1);
        
        $query = $this->db->get();
        return $query->result();
    }

    
    public function findTurnosByIdComedor($id_comedor){
       
        $this->db->select('id_turno, nombre');
        $this->db->from('turno');
        $this->db->where('id_comedor',$id_comedor);
        $this->db->where('activado',1);
        $query = $this->db->get();
        return $query->result();
    }

    public function findAllByIdTurnoReserva($id_Turno,$dia,$id_comedor){
                
        $fechaInicioSemana = date('Y-m-d',strtotime('last '."Monday",strtotime(date('Y-m-d'))));

        $this->db->select('m.id_menu,m.nombre');
        $this->db->from('programacion as p');
        $this->db->join('programacion_menu','programacion_menu.id_programacion=p.id_programacion');
        $this->db->join('menu as m','m.id_menu=programacion_menu.id_menu');
        $this->db->join('dia_programacion as dp','dp.id_dia_programacion=p.id_dia_programacion');
        $this->db->join('stock','stock.id_menu=m.id_menu');
        $this->db->where('dp.id_dia_programacion',  $dia);
        $this->db->where('p.id_turno',$id_Turno);
        $this->db->where('m.id_comedor',$id_comedor);
        $this->db->where('m.activado',1);
        $this->db->where('stock.cantidad >',0);
        $this->db->where('stock.fecha', $fechaInicioSemana);
        $query = $this->db->get();

        if($query->num_rows() == 0)
            return array();

        return $query->result();
    }


    public function ver($id_Turno,$dia,$id_comedor){
        
        $this->db->select('m.id_menu,m.nombre');
        $this->db->from('programacion');
        $this->db->join('programacion_menu','programacion_menu.id_programacion=programacion.id_programacion');
        $this->db->join('menu as m','m.id_menu=programacion_menu.id_menu');
        $this->db->join('dia_programacion as dp','dp.id_dia_programacion=programacion.id_dia_programacion');
        $this->db->join('stock','stock.id_menu=m.id_menu');
        $this->db->where('dp.id_dia_programacion',$dia);
        $this->db->where('programacion.id_turno',$id_Turno);
        $this->db->where('m.id_comedor',$id_comedor);
        $this->db->where('stock.cantidad >',0);
        $this->db->where('stock.fecha', '2021-01-25');


        
        $query = $this->db->get()->result();
        return print_r($this->db->last_query());


    }
}
