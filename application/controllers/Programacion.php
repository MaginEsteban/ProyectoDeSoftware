<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Programacion extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comedor_model');
        $this->load->model('Turno_model');
        $this->load->model('Menu_model');
        $this->load->model('Days_model');
    }

    public function index(){
       
       // busca todos lo turnos del comedor que administrador-comedor
       $usuario =  $this->session->userdata('user');
       
        //busca el comedor que administra
       $comedor = $this->Comedor_model->findByIdAdminComedor($usuario->id_usuario);
       $turnos =  $this->Turno_model->findTurnosByIdComedor($comedor->id_comedor);
            
       $data['comedor'] = $comedor;
       $data['turnos'] = $turnos;   

       $this->load->view('programacion/dashboard_programacion',$data);
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

    public function delete_menu_programacion(){
        //obtiene el id del menu
        $menu_programacion = $this->input->post('programacion_menu');
        
        // Elimino
        $this->Menu_model->delete_programacion_menu($menu_programacion);
        
    }
    public function add_programacion_menu(){
        //obtiene los datos 
        $turno = $this->input->post('turno');
        $dias = $this->input->post('dias');
        $menu = $this->input->post('menu');
        
        echo $dias;
        //agrega el menu
        foreach($dias as $dia){
            $this->Menu_model->add_programacion_menu($turno,$dia,$menu);
        }
        
    }
    

    //dias de la programacion
    public function days(){
        $data['dias'] = $this->Days_model->findAllDaysProgramming();
        return $this->load->view('programacion/days',$data);
    }

    //menus de un comedor
    public function menus(){
        $id_comedor = $this->input->post('comedor')[0];
       
       //menus del comedor

       $data['menus'] = $this->Menu_model->findAllByIdComedor($id_comedor);

        return $this->load->view('programacion/menus',$data);
    }

    //menus de los turnos de un comedor
    public function menusAllTurnos(){
        //obtener datos por post
        $id_comedor = $this->input->post('comedor');
       
        //se obtiene todos los turnos de un comedor
        $turnos =  $this->Turno_model->findTurnosByIdComedor($id_comedor);
        //se obtiene todo los menus de los turnos
        $menus = [];

        foreach($turnos as $turno){
            $menu_aux = $this->Menu_model->findAllByIdTurno($turno->id_turno);
            $menus = array_merge($menus,$menu_aux);
        }

        echo json_encode($menus);
       // print_r($menus);

    }
}

?>