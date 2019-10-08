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
     * Vista reestablecer la contraseña
    */
    public function restore_password(){
        $this->load->view('users/restore_password');
    }

     /**
     * Permiter reestablecer la contraseña de un usuario
    */
    public function check_password(){
            
        $ok = $this->User_model->update_password();
                
        $response;

        if($ok){
            $response = array(
                'mensaje' => 'La contraseña se cambio con exito',
                'class' => 'alert-primary'
            );  
        }
        else{
            $response = array(
                'mensaje' => 'Los datos ingresado son incorrento...no se reestablecio la contraseña',
                'class' => 'alert-danger'
            );                   
        }
       
        $this->load->view('users/restore_password',$response);

    }

}