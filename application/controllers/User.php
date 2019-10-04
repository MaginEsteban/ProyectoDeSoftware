<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class User extends Security {


    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
    }

    /**
     * Agrega un usuario
    */
    public function add()
	{
        
        $this->load->view('users/add');
    }

    /**
     * Lista todos los usuarios en el sistema
    */
    public function list()
	{
        
        $this->load->view('users/list');
        
    }

    /**
     * Permiter reestablecer la contraseña de un usuario
    */
    public function restore_password(){
        $this->load->view('users/restore_password');
    }
}