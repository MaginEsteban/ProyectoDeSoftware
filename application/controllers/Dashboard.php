<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Dashboard extends Security {

	public function __construct() {
		parent::__construct();
		
	}
    public function index()
	{
		$this->load->view('dashboard/main_template');
	}

}

?>