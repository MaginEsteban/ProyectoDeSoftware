<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Ticket extends Security {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Ticket_model','Menu_model','Comedor_model','Turno_model'));
        $this->load->helper('url_helper');
        
    }

    /**
     * Agrega un ticket
    */
    public function add()
	{
        /*En Session se podria tener el numero de comedor y entonces se buscaria 
          de que comedor quiere sacar un ticket para mostrarle solo los menues que
          estan disponibles en ese comedor
        */
        $data = array(
            'menues'=> $this->Menu_model->findAll(),
            'dias'=> $this->Ticket_model->find_dias(),
            'turnos' => $this->Turno_model->findAll()
        );
        $this->load->view('tickets_client/add',$data);
    }

    public function delete (){
        $id_ticket = $this->uri->segment(3);
        $data = $this->Ticket_model->get_estado_ticket_by_id($id_ticket);
        $id_estado = 6;
        $this->Ticket_model->update($id_ticket,$data,$id_estado);
        redirect(base_url('ticket/listing_client'));
    }

    //Con esta funcionalidad damos por echo que los estados son cambiados 
    //incrementalmente para evitar la complejidad de la busqueda.En caso de querer
    //volver a un estado por el que ya se paso, se debe cancelar el ticket.
    public function change_state(){
        $id_ticket = $this->input->post('id_ticket');
        $data = $this->Ticket_model->get_estado_ticket_by_id($id_ticket);
        $estado_elegido = $this->input->post('estados');
        $this->Ticket_model->update($id_ticket,$data,$estado_elegido);
        redirect(base_url('ticket/listing_admin'));
    }
    
    public function change(){
        $id_ticket = $this->uri->segment(3);
        $data = array(
            'estados' => $this->Ticket_model->get_estados(),
            'id_ticket' => $id_ticket,
            'estado_anterior' => $this->Ticket_model->get_estado($id_ticket)
        );
        $this->load->view('tickets_admin/change_state',$data);
    }
    public function listing_client(){
        $usuario = $this->session->userdata('user');
        $data['tickets'] = $this->Ticket_model->find_by_id_persona($usuario->id_persona);
        $this->load->view('tickets_client/list',$data);
    }

    public function listing_admin(){
        $data['tickets'] = $this->Ticket_model->findAll();
        $this->load->view('tickets_admin/list',$data);
    }

    
     public function store(){
        //Obtengo el nombre del dia en ingles 
        $nombreDia = $this->input->post('dias');
        //Calculo en base a ese dia lo formateo en una fecha y lo asigno a $fecha_retiro
        $fecha_retiro = date('Y-m-d',strtotime("$nombreDia"));
        //FALTA PREGUNTAR EN CASO DE QUE EL DIA DE LA FECHA ACTUAL SEA 
        //EL MISMO QUE LA FECHA SELECCIONADA PARA EL TICKET Y YA NO ESTE 
        //PERMITIDO EMITIRSE PORQUE SE ESTA FUERA DE HORARIO
        //EN ESE CASO SE DEBEN SUMAR 7 DIAS A FECHA RETIRO
        //fecha_final = date("Y-m-d",strtotime($fecha_retiro."+ 7 days"));
        $fecha_registro = date('Y-m-d H:i:s');
        $code = $this->Ticket_model->get_random_code() + 1;
        $id_menu = $this->input->post('menues');
        $user = $this->session->userdata('user');
        $turno = $this->input->post('turnos');
        //Realizo el insert de un ticket y obtengo el id de la bd
        $id_ticket = $this->Ticket_model->insert($code,$id_menu,$user->id_persona,$turno,$fecha_retiro,$fecha_registro);
        //Utilizo el id del ticket creado para hacer un insert en estado_ticket
        $this->Ticket_model->insert_ticket_estado($fecha_registro,null,$id_ticket,2);
        redirect(base_url('ticket/listing_client'));
    }
}