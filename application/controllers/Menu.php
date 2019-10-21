<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url_helper');
    }

    public function add()
	{
        $data = array (
            'tiposdemenu' => $this->Menu_model->findAllTiposDeMenu(),
            'comedores' => $this->Menu_model->findAllComedores()
        );
        $this->load->view('menues/add',$data);
    }

    public function listing()
	{
        $data['menues'] = $this->Menu_model->findAll();
        $this->load->view('menues/list',$data);
    }

    public function crearMenu(){
        $nombreMenu = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $idTipoMenu = $this->input->post('tiposdemenues');
        $idComedor = $this->input->post('comedores');
        $this->Menu_model->insert($nombreMenu,$descripcion,$idTipoMenu,$idComedor);

        redirect(base_url('menues/list'));
    }


    public function modificarMenu(){
        

    }

}