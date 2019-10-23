<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url');
	}

    public function index()
	{
		$data['user'] = $this->session->userdata('user');
		$this->load->view('dashboard/main_template', $data);
	}

}

?>