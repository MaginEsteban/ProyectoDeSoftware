<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php';

class Programacion extends Security
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Comedor_model');
        $this->load->model('Turno_model');
        $this->load->model('Menu_model');
        $this->load->model('Days_model');
        $this->load->model('Ticket_model');
        $this->load->helper('date');
    }

    public function index()
    {

        // busca todos lo turnos del comedor que administrador-comedor
        $usuario =  $this->session->userdata('user');

        $fechaActual = mdate('%Y-%m-%d', time());

        //busca el comedor que administra
        $data['comedor'] = $this->Comedor_model->findByIdAdminComedor($usuario->id_usuario);
      
        $data['turnos'] =  $this->Turno_model->findTurnosByIdComedor($data['comedor']->id_comedor);

        $tickets = $this->Ticket_model->countTicketByEstate($data['turnos']);

        // print_r($tickets);
        // print_r('<br>');
        //  print_r('<br>');


        $data['ticket_cancelados'] = $tickets[0]; 
        $data['ticket_en_procesos'] = $tickets[3]; 
        $data['ticket_entregados'] = $tickets[1]; 
        $data['ticket_reservados'] = $tickets[2];
        $data['ticket_para_cancelar'] =  $this->Ticket_model->findAllForCancel($fechaActual);
       

        //  print_r($data);
        // print_r('<br>');
        //  print_r('<br>');

        // print_r( $this->Ticket_model->findAllForCancel($fechaActual) );
        //  die;

      //  print_r($fechaActual.'<br>');
      // print_r(  $data['ticket_para_cancelar'] );

        $this->load->view('programacion/dashboard_programacion', $data);
    }

    public function ver_programacion()
    {
        $id_comedor = $this->uri->segment(3);
        $usuario =  $this->session->userdata('user');
       
       $turnos =  $this->Turno_model->findTurnosByIdComedor($id_comedor);
            
       $data['comedor'] = $comedor;
       $data['turnos'] = $turnos;   

       $this->load->view('programacion/dashboard_programacion',$data);
    }

    public function delete_menu_programacion()
    {
        //obtiene el id del menu
        $menu_programacion = $this->input->post('programacion_menu');

        // Elimino
        $this->Menu_model->delete_programacion_menu($menu_programacion);
    }
    public function add_programacion_menu()
    {
        //obtiene los datos 
        $turno = $this->input->post('turno');
        $dias = $this->input->post('dias');
        $menu = $this->input->post('menu');

        //agrega el menu
        foreach ($dias as $dia) {
            $this->Menu_model->add_programacion_menu($turno, $dia, $menu);
        }
    }


    //dias de la programacion
    public function days()
    {
        $data['dias'] = $this->Days_model->findAllDaysProgramming();
        return $this->load->view('programacion/days', $data);
    }

    //menus de un comedor
    public function menus()
    {
        $id_comedor = $this->input->post('comedor');

        //menus del comedor
        $data['menus'] = $this->Menu_model->findAllByIdComedor($id_comedor);

        return $this->load->view('programacion/menus', $data);
    }

    //menus de los turnos de un comedor
    public function menusAllTurnos()
    {
        //obtener datos por post
        $id_comedor = $this->input->post('comedor');

        //se obtiene todos los turnos de un comedor
        $turnos =  $this->Turno_model->findTurnosByIdComedor($id_comedor);
        //se obtiene todo los menus de los turnos
        $menus = [];

        foreach ($turnos as $turno) {
            $menu_aux = $this->Menu_model->findAllByIdTurno($turno->id_turno);
            $menus = array_merge($menus, $menu_aux);
        }

        echo json_encode($menus);
        // print_r($menus);

    }


    public function cancelarTicketOutDate()
    {
        //obtener datos por post
        $id_comedor = $this->input->post('comedor');

        //se obtiene todos los turnos de un comedor
        $turnos =  $this->Turno_model->findTurnosByIdComedor($id_comedor);

        foreach ($turnos as $turno) {
            $this->Ticket_model->prCancelarTicketsByTurno($turno->id_turno);
        }

        redirect('programacion','refresh');
    }
}
