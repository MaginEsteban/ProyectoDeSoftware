<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Detalle_Comedores extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comedor_model');
        $this->load->model('Turno_model');
        $this->load->model('Menu_model');
        $this->load->helper('url_helper');
    }
    
	public function index()
	{

        $comedores = $this->Comedor_model->findAll();

        foreach ($comedores as $comedor) {
            $turnos = $this->Turno_model->findTurnosByIdComedor($comedor->id_comedor);
            $comedor->turnos = $turnos;        
        }
        $data['comedores'] = $comedores;
		$this->load->view('detalle_comedores', $data);
	}
}