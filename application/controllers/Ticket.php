<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Ticket extends Security {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Ticket_model','Menu_model','Comedor_model','Turno_model'));
        $this->load->helper('url_helper');
        
    }

    /*
    
    public function add(){
        $data = array(
            'menu'=> $this->Menu_model->findAll(),
            'dia'=> $this->Ticket_model->find_dias(),
            'turnos' => $this->Turno_model->findAll()
        );
        $this->load->view('tickets_client/add',$data);
    }
    */
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
    
    public function cobrar_ticket(){
        $id_ticket = $this->uri->segment(3);
        $data =$this->Ticket_model->get_estado_ticket_by_id($id_ticket);
        $this->Ticket_model->update($id_ticket,$data,5);
        $data = $this->Ticket_model->get_ticket_by_id($id_ticket);
        $this->Ticket_model->update_ticket($id_ticket,$data);
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


    // permite aplicar cambios de filtrado
    public function listing_admin(){
        
        $state = $this->uri->segment(3); 
        $data['tickets'] = array();
        
        if(  $state  ){
            // con filtro
            $data['tickets'] = $this->Ticket_model->findAllByState($state);
        }
        else{
            // sin filtro
            $data['tickets'] = $this->Ticket_model->findAll();
        }
       
      

        $this->load->view('tickets_admin/list',$data);   

    }

    
     public function add(){
        //Obtengo el nombre del dia en ingles 
        $nombreDia = $this->input->post('dia');
        //Calculo en base a ese dia lo formateo en una fecha y lo asigno a $fecha_retiro
        $turno = $this->input->post('turno');
        $id_comedor = $this->input->post('idComedor');
        
        $horas = $this->Turno_model->findHoraTurno($turno);
        $hora_inicio = $horas->hora_inicio;
        $hora_fin = $horas->hora_fin;
       
        $fecha_retiro = date('Y-m-d',strtotime("$nombreDia"));
        $fecha_retiro_as_number = strtotime($fecha_retiro);
     
        $fecha_now_as_number = strtotime(date('Y-m-d H:i:s'));
      
        $hora_now = date("H:i:s",$fecha_now_as_number);
        $dia_now = date("d",$fecha_now_as_number);
        $dia_retiro = date("d",$fecha_retiro_as_number);
      
        if($dia_now == $dia_retiro){
            //SI EL DIA ES EL MISMO QUE SELECCIONO PARA EL PEDIDO
            //Y SI ESTA DENTRO DEL HORARIO
            //DEJO LA FECHA ACTUAL

           if($hora_now > $hora_inicio && $hora_now < $hora_fin){
            $fecha_final = $fecha_retiro;
           }
           else{
            //EN CASO DE QUE EL DIA DE LA FECHA ACTUAL SEA 
            //EL MISMO QUE LA FECHA SELECCIONADA PARA EL TICKET Y YA NO ESTE 
            //PERMITIDO EMITIRSE PORQUE SE ESTA FUERA DE HORARIO
            //EN ESE CASO SE DEBEN SUMAR 7 DIAS A FECHA RETIRO
            $fecha_final = date('Y-m-d',strtotime($fecha_retiro."+ 7 days"));
            }
        }
        else{
            $fecha_final = $fecha_retiro;
        }
        $code = $this->Ticket_model->get_random_code() + 1;
        $id_menu = $this->input->post('menu');
        $user = $this->session->userdata('user');

        //Realizo el insert de un ticket y obtengo el id de la bd
        $id_ticket = $this->Ticket_model->insert($code,$id_menu,$user->id_persona,$turno,$fecha_final,$fecha_now);
        
        //Utilizo el id del ticket creado para hacer un insert en estado_ticket
        $this->Ticket_model->insert_ticket_estado($fecha_now,null,$id_ticket,2);
        
        redirect(base_url('ticket/listing_client'));
    }

}