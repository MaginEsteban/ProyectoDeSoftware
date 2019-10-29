<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model{
   
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($codigo,$id_estado_pago,$id_menu){
            $id_estado_pago = 1;
            $data = array(
               'codigo' => $codigo,
               'id_estado_pago' => $id_estado_pago,
               'id_menu' => $id_menu
            );
       $this->db->insert('ticket', $data);
       return $this->db->insert_id();
    } 

    public function delete($id_ticket){
        $this->db->where('id_ticket', $id_ticket);
        $this->db->delete('ticket');
    }
    
    public function update($algo){
            $data = array(
                '' => $algo
            );
        $this->db->where('', $$algo);
        $this->db->update('', $data);
    }

    public function findAll(){
        $this->db->select('ticket.id_ticket,ticket.codigo,ticket.id_estado_pago,
        ticket.id_menu,menu.nombre,menu.id_comedor');
        $this->db->from('ticket');
        $this->db->join('menu', 'ticket.id_menu = menu.id_menu');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_random_code(){
        $this->db->select('max(ticket.codigo) as maximo');
        $this->db->from('ticket');
        $query = $this->db->get();
        return $query->row(0,'Ticket_model')->maximo;
    }
    /*
    public function find_by_id($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('id_usuario',$id);
        $query = $this->db->get();
        return $query->result();
    }
    */
    /*
    public function find_menu_by_id_ticket($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('persona','usuario.id_persona = persona.id_persona');
        $this->db->where('usuario.id_usuario',$id);
        $query = $this->db->get();
        return $query->result();
    }
    */
}

?>