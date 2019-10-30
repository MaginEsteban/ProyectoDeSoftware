<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Menu extends Security {

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

    public function edit(){ 
        $id_menu = $this->uri->segment(3);
        $data = array(
            'menu' => $this->Menu_model->findById($id_menu),
            'tiposdemenu' => $this->Menu_model->findAllTiposDeMenu(),
            'comedores' => $this->Menu_model->findAllComedores()
        );
        $this->load->view('menues/edit',$data);
    }

    public function delete(){
        $id_menu = $this->uri->segment(3);
        $this->Menu_model->delete($id_menu);
        redirect(base_url('menu/listing'));
    }

    public function delete_post(){
        $id = $this->input->post('id');
        $this->Menu_model->delete($id_menu);
        redirect(base_url('menu/listing'));

    }

    public function crearMenu(){
        $nombreMenu = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $idTipoMenu = $this->input->post('tiposdemenues');
        $idComedor = $this->input->post('comedores');
        $this->Menu_model->insert($nombreMenu,$descripcion,$idTipoMenu,$idComedor);

        redirect(base_url('menu/listing'));
    }

    public function modificarMenu(){
        $nombreMenu = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $idTipoMenu = $this->input->post('tiposdemenues');
        $idComedor = $this->input->post('comedores');
        $idMenu = $this->input->post('id');
        $this->Menu_model->update($idMenu,$nombreMenu,$descripcion,$idTipoMenu,$idComedor);
        redirect(base_url('menu/listing'));

    }

}