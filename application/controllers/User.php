<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class User extends Security {



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