<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model{
   
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($codigo,$id_menu,$id_persona,$turno,$fecha_retiro,$fecha_registro){
            $id_estado_pago = 1;
            $data = array(
               'codigo' => $codigo,
               'id_estado_pago' => $id_estado_pago,
               'id_menu' => $id_menu,
               'id_persona' => $id_persona,
               'id_turno' => $turno,
               'fecha_retiro_ticket' => $fecha_retiro,
               'fecha_registro_ticket' => $fecha_registro
            );
       $this->db->insert('ticket', $data);
       return $this->db->insert_id();
    } 
    
    public function update($id_ticket,$estado_ticket,$id_estado){
        $fecha = date('Y-m-d H:i:s');
        $data = array(
            'id_estado_ticket' => $estado_ticket->id_estado_ticket,
            'fecha_inicio' => $estado_ticket->fecha_inicio,
            'fecha_fin' => $fecha,
            'id_ticket' => $id_ticket,
            'id_estado' => $estado_ticket->id_estado
        );
        $this->db->where('id_ticket', $id_ticket);
        $this->db->update('estado_ticket', $data);
        $this->insert_ticket_estado($fecha,null,$id_ticket,$id_estado);
    }

    public function get_estado_ticket_by_id($id_ticket){
        $this->db->select('max(id_estado) as maximo, id_estado_ticket,
        fecha_inicio');
        $this->db->from('estado_ticket');
        $this->db->where('id_ticket',$id_ticket);
        $query = $this->db->get();
        return $query->row(0,'Ticket_model');
    }

    public function get_estado($id_ticket){
        $this->db->select('max(id_estado) as maximo');
        $this->db->from('estado_ticket');
        $this->db->where('id_ticket',$id_ticket);
        $query = $this->db->get();
        return $query->row(0,'Ticket_model');
    }
    public function findAll(){
        $this->db->select('ticket.id_ticket,ticket.codigo, ticket.id_estado_pago,
        ticket.fecha_retiro_ticket,menu.nombre as nombre_menu,
        turno.nombre as nombre_turno , estado.nombre as nombre_estado,
        estado_ticket.fecha_fin as fecha_fin');
        $this->db->from('ticket');
        $this->db->join('menu', 'ticket.id_menu = menu.id_menu');
        $this->db->join('turno','ticket.id_turno = turno.id_turno');
        $this->db->join('estado_ticket','estado_ticket.id_ticket = ticket.id_ticket');
        $this->db->join('estado','estado_ticket.id_estado = estado.id_estado');
        $this->db->where('estado_ticket.fecha_fin',null);
        $query = $this->db->get();
        return $query->result();
    }
   
    public function find_by_id_persona($id_persona){
        $this->db->select('ticket.id_ticket,ticket.codigo, ticket.id_estado_pago,
        ticket.fecha_retiro_ticket,menu.nombre as nombre_menu,
        turno.nombre as nombre_turno , estado.nombre as nombre_estado,
        estado_ticket.fecha_fin as fecha_fin');
        $this->db->from('ticket');
        $this->db->join('menu', 'ticket.id_menu = menu.id_menu');
        $this->db->join('turno','ticket.id_turno = turno.id_turno');
        $this->db->join('estado_ticket','estado_ticket.id_ticket = ticket.id_ticket');
        $this->db->join('estado','estado_ticket.id_estado = estado.id_estado');
        $this->db->where('ticket.id_persona',$id_persona);
        $this->db->where('estado_ticket.fecha_fin',null);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_random_code(){
        $this->db->select('max(ticket.codigo) as maximo');
        $this->db->from('ticket');
        $query = $this->db->get();
        return $query->row(0,'Ticket_model')->maximo;
    }

    public function get_estados(){
        $this->db->select('*');
        $this->db->from('estado');
        $query = $this->db->get();
        return $query->result();
    }
    public function find_dias(){
        $this->db->select('*');
        $this->db->from('dia_programacion');
        //VER COMO HACER PARA  ORDENAR LOS DIAS
        //$this->db->orderby('id_dia_programacion',asc]);
        $query = $this->db->get();
        return $query->result();
    }

   public function insert_ticket_estado($fecha_inicio,$fecha_fin,$id_ticket ,$id_estado){
        $data = array(
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'id_ticket' => $id_ticket,
            'id_estado' => $id_estado
        );
       $this->db->insert('estado_ticket', $data);
   }
}

?>