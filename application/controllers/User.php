<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __constructor(){
        $this->load->model('user');
    }

    public function add()
	{
		$this->load->view('users/add');
    }

    public function list()
	{
        $data = $this->User->findAll();
        if( isset( $data ) ){
            echo "error";
        }
        else{
            $this->load->view('users/list',$data);
        }
    }

}