<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


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
