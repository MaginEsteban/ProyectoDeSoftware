<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle_Comedores extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comedor_model');
    }
	public function index()
	{
        $data = array(
            'comedores' => $this->Comedor_model->findAll()
        );
		$this->load->view('detalle_comedores', $data);
	}
}
