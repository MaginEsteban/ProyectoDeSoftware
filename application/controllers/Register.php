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



	/**
	 * 
	 * 
	 * 
	 * 
	*/
	public function post_register()
    {
		
		// no paso la validacion del formulario
		if (! $this->validacionFormulario()){  

            $this->load->view('register');
        }
        else{   
					
				$legajo = $this->input->post('legajo');
				$email = $this->input->post('email');
				$nombre = $this->input->post('username');
				$tipo_usuario = 1;
				$contraseña = $this->input->post('pass');
				
				$this->User_model->insert_register($legajo,$tipo_usuario,$nombre,$contraseña,$email);  
				
				// validacion de unicidad
				if ($this->db->error() == 1062){
					
					$this->session->set_flashdata('error','EL usuario ya existe');

					$this->load->view('register');
				}else
				{
					redirect( base_url('login') ); 
				}

				
			
        }
 
         
	}
	

	public function validacionFormulario(){
		
		$this->form_validation->set_rules('legajo', 'Legajo', 'required|numeric|greater_than[0]',
			array(	'required' => 'Ingresar el legajo...',
					'greater_than' => 'Ingresar un numero de legajo mayor a 0',
					'numeric' => 'El legajo debe ser numerico'));
		$this->form_validation->set_rules('username', 'nombre', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|is_unique[usuario.email]|valid_email', array('is_unique' => "El correo ya le pertenece a otra persona"));
		$this->form_validation->set_rules('pass', 'contraseña', 'required');
		$this->form_validation->set_rules('cpass', 'confirmar contraseña', 'required|matches[pass]',
			array(	'matches' => 'Las contraseñas son diferentes...',
					'required' => 'Ingresar la %s...'));
		$this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');
		$this->form_validation->set_message('rule', 'Ingresar {field}');
		
		return $this->form_validation->run() === TRUE;
	}
}