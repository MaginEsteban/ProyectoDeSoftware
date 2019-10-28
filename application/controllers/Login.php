<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('Login_model');
	}

     public function index(){
		$this->load->view('login');
	}
	
	/**Valida los datos ingresados para poder acceder al dashboard*/
	public function check(){
		
		$user_name = $this->input->post('name_user');
		$user_password = $this->input->post('pass_user');
		$user = $this->Login_model->find($user_name,$user_password);
		
		//datos para enviar por json
		$mensaje = "";
		$redirec_to = true;
		$url = base_url('dashboard/');

		
		if( !isset( $user ) )	{
			$redirec_to = false;
			$mensaje = 'El nombre de usuario o la contraseña no es valida...';
		}else{
			$this->abrir_sesion($user);
		}
		$response = array('redirecTo'=>$redirec_to,'url'=>$url,'message'=>$mensaje,'user'=>$user,'nombre'=>$user_name,'pass'=>$user_password);
	    header('Content-Type: application/json');
		echo json_encode ($response);
	}
	 
	private function abrir_sesion($usuario){
		if ($usuario) {
			$usuario_data = array (
				'user' => $usuario,
				'logged' => TRUE);
			$this->session->sess_expiration = '28800';// expires 
			$this->session->set_userdata($usuario_data);
		}
	}	

	public function cerrar_sesion() {
		$this->session->sess_destroy ();
	}
}