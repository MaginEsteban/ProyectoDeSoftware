<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
     public function index(){

		$this->load->view('login');
	}
	
	/**Valida los datos ingresados para poder acceder al dashboard*/
	public function check(){
		//$nameUser = ;
		//$passUser = ;
		
		
		$response = array('redirecTo'=>false,'url'=>base_url('index.php/dashboard/'),'message'=>'El nombre de usuario o la contraseña no es valida...');
	    header('Content-Type: application/json');
		echo json_encode ($response);
	}

}
