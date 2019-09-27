<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
    }

    public function add()
	{
		$this->load->view('users/add');
    }

    public function list()
	{
        $data = $this->user_model->findAll();
        if( isset( $data ) ){
            echo "error";
        }
        else{
            $this->load->view('users/list',$data);
        }
    }

}