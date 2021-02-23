<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Prueba extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
    }

    public function index(){
        echo $this->config->item('base_url_angular');
    }
}