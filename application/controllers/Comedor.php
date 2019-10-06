<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comedor extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('notes_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function add()
	{
        $data['nombre'] = 'Añadir Comedor';
		$this->load->view('comedores/add', $data);
    }

    public function list()
	{
        $this->load->view('comedores/list');
        $this->form_validation->set_rules('nombre', 'Title', 'required');
 
        $id = $this->input->post('id');
 
        if ($this->form_validation->run() === FALSE)
        {  
            if(empty($id)){
              redirect( base_url('comedores/add') ); 
        }
        else
        {
            $data['note'] = $this->notes_model->createOrUpdate();
            redirect( base_url('note') ); 
        }
    }

}