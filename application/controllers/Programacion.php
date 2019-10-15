<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Programacion extends Security {


    


    public function index(){
       
       // busca todos lo turnos del comedor que administrador-comedor
       $usuario =  $this->session->userdata('user');
       
       print_r($this->session->userdata('user'));
       die();
       
        $data['turnos'] = 

        $this->load->view('programacion/dashboard_programacion',$data);
    }

}