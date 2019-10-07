<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class User extends Security {


    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('User_model');
    }

    /**
     * Agrega un usuario
    */
    public function add()
	{
        
        $this->load->view('users/add');
    }

    public function listing()
	{
        $this->load->view('users/list');
    }

    /**
     * Permiter reestablecer la contraseña de un usuario
    */
    public function restore_password(){
        $this->load->view('users/restore_password');
    }
    /*
     public function store(){

        $name_user = $this->input->post('nombre');
        $this->User_model->insert(name);
        
     }

*/


}