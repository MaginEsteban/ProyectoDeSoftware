<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comedor extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->load->helper('url_helper');
        $this->load->model('Comedor_model');
    }

    public function add()
	{
		$this->load->view('comedores/add', $data);
    }

    public function list()
	{
        $this->load->view('comedores/list');

    }

}