<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Dashboard extends Security {

	public function __construct() {
		parent::__construct();
		$this->load->model('Comedor_model');
		$this->load->model('Ticket_model');
		$this->load->model('Sancion_model');
	}
    public function index()
	{
		$user = $this->session->userdata('user');
		if($user->id_tipo_usuario == 1){
			$data = array(
				'user' => $user,
				'comedores'=> $this->Comedor_model->find_all_comedores_fav_by_id_user($user->id_usuario),
				'tickets'=> $this->Ticket_model->find_by_id_persona($user->id_persona),
				'sanciones'=> $this->Sancion_model->find_by_id_persona($user->id_persona),
			);
		}else {
			if($user->id_tipo_usuario == 3){
				$data = array(
					'user' => $user,
					'comedor'=> $this->Comedor_model->findByIdAdminComedor($user->id_usuario),
				);
				//print_r($data['comedor']);
			}else {
				$data = array(
					'user' => $user,
				);
			};
		};

		$this->load->view('dashboard/main_template',$data);
	}

}

?>