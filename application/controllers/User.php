<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class User extends Security {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('User_model');
    }
   
    public function add()
	{
        
        $this->load->view('users/add');
    }

    public function list(){
        $this->load->view('users/list');
    }

    /*
     public function store(){

        $name_user = $this->input->post('nombre');
        $this->User_model->insert($name_user);
        
     }
     */



}