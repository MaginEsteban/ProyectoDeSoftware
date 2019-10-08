<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Comedor extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comedor_model');
        $this->load->helper('url_helper');
    }

    public function add()
	{
        $data = $this->Comedor_model->findAllCiudades();
      
        echo $data;
        //$this->load->view('comedores/add',$data);
        $data['ciudades'] = $this->Comedor_model->findAllCiudades();
        $this->load->view('comedores/add',$data);
    }

    public function listing()
	{
        $data['comedores'] = $this->Comedor_model->findAll();
        $this->load->view('comedores/list',$data);
    }

    public function crearComedor(){
        $nombreCiudad = $this->input->post('nombre');
        $idCiudad = $this->input->post('ciudades');
        $this->Comedor_model->insert($nombreCiudad,$idCiudad);
    }

    public function modificarComedor(){
        

    }

}