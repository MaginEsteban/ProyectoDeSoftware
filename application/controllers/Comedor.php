<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Comedor extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comedor_model');
        $this->load->model('Ciudad_model');
        $this->load->helper('url_helper');
    }

    public function add()
	{
        $data['ciudades'] = $this->Ciudad_model->findAll();
        $this->load->view('comedores/add',$data);
    }

    public function listing()
	{
        $data['comedores'] = $this->Comedor_model->findAll();
        $this->load->view('comedores/list',$data);
    }

    public function edit(){ 
        $id_comedor = $this->uri->segment(3);
        $data = array(
            'comedor' => $this->Comedor_model->findById($id_comedor),
            'ciudades' => $this->Ciudad_model->findAll()
        );
        $this->load->view('comedores/edit',$data);
    }

    public function delete(){
        $id_comedor = $this->uri->segment(3);
        $this->Comedor_model->delete($id_comedor);
        redirect(base_url('comedor/listing'));
    }

    public function crearComedor(){
        $nombreCiudad = $this->input->post('nombre');
        $idCiudad = $this->input->post('ciudades');
        $this->Comedor_model->insert($nombreCiudad,$idCiudad);
        redirect(base_url('comedor/listing'));
    }

    public function modificarComedor(){
        $nombreCiudad = $this->input->post('nombre');
        $idCiudad = $this->input->post('ciudades');
        $idComedor = $this->input->post('id');
        $this->Comedor_model->update($idComedor,$nombreCiudad,$idCiudad);
        redirect(base_url('comedor/listing'));
    }

}