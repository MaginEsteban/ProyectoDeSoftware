<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function add()
	{
		$this->load->view('users/add');
    }

    public function list()
	{
        $this->load->view('users/list');
    }

}