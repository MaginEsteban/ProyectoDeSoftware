<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
	 parent::__construct();
		$this->load->model('User_model');
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('url','html','form'));
		$this->user_id = $this->session->userdata('user_id');
	}

	public function index(){
		$this->load->view('register');
	}

	public function post_register()
    {
		$this->form_validation->set_rules('username', 'nombre', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('pass', 'contraseña', 'required');
		$this->form_validation->set_rules('cpass', 'confirmar_contraseña', 'required|matches[pass]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('register');
        }
        else
        {   $legajo = $this->input->post('legajo');
            $email = $this->input->post('email');
			$nombre = $this->input->post('username');
			$tipo_usuario = 1;
			$contraseña = $this->input->post('pass');
            $this->User_model->insert($legajo,$tipo_usuario,$nombre,$contraseña,$email);
             redirect( base_url('login') ); 
            }
 
         
    }
}
