<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Turno extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Turno_model');
        $this->load->helper('url_helper');
    }

    public function add()
	{
        $data ['comedores'] = $this->Turno_model->findAllComedores();
        $this->load->view('turnos/add',$data);
    }

    public function listing()
	{
        $data['turnos'] = $this->Turno_model->findAll();
        $this->load->view('turnos/list',$data);
    }

    public function edit($id_turno){
        $data = array(
            'turno' => $this->Turno_model->findById($id_turno),
            'comedores' => $this->Turno_model->findAllComedores()
        );
        $this->load->view('turnos/edit',$data);
    }

    public function delete(){
        $id_turno = $this->uri->segment(3);
        $this->Turno_model->delete($id_turno);
        redirect(base_url('turno/listing'));
    }

    public function crearTurno(){
        $nombreTurno = $this->input->post('nombre');
        $hora_inicio = $this->input->post('hora_inicio');
        $hora_fin = $this->input->post('hora_fin');
        $idComedor = $this->input->post('comedores');
        $this->Turno_model->insert($nombreTurno,$hora_inicio,$hora_fin,$idComedor);

        redirect(base_url('turno/listing'));
    }

    public function modificarTurno(){
        $nombreTurno = $this->input->post('nombre');
        $hora_inicio = $this->input->post('hora_inicio');
        $hora_fin = $this->input->post('hora_fin');
        $idComedor = $this->input->post('comedores');
        $idTurno = $this->input->post('id');
        $this->Turno_model->update($idTurno,$nombreTurno,$hora_inicio,$hora_fin,$idComedor);
        redirect(base_url('turno/listing'));
    }

}