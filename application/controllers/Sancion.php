<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Sancion extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Sancion_model');
        $this->load->model('User_model');
        $this->load->helper('url_helper');
    }

    public function add()
	{   
        $id_usuario = $this->uri->segment(3);
        $data['persona'] = $this->User_model->find_person_by_id_user($id_usuario);
        $this->load->view('sanciones/add',$data);
    }

    public function listing()
	{
        $data['sanciones'] = $this->Sancion_model->findAll();
        $this->load->view('sanciones/list',$data);
    }

    public function edit(){ 
        $id_sancion = $this->uri->segment(3);
        $data['sancion'] = $this->Sancion_model->findById($id_sancion);
        $this->load->view('sanciones/edit',$data);
    }

    public function delete(){
        $id_sancion = $this->uri->segment(3);
        $this->Sancion_model->delete($id_sancion);
        redirect(base_url('sancion/listing'));
    }


    public function crearSancion(){
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $descripcion = $this->input->post('descripcion');
        $id_persona = $this->input->post('id_persona');
        $this->Sancion_model->insert($fecha,$hora,$descripcion,$id_persona);

        redirect(base_url('sancion/listing'));
    }

    public function modificarSancion(){
        $id = $this->input->post("id_sancion");
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $descripcion = $this->input->post('descripcion');
        $id_persona = $this->input->post('id_persona');
        $this->Sancion_model->update($id, $fecha,$hora,$descripcion,$id_persona);
        redirect(base_url('sancion/listing'));

    }
}