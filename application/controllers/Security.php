<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {

    protected  $usuario = '';
 
    //Array asociativo de lo que no puede hacer cada rol. Ej: el administrador puede hacer todo pero el vendedor
    //no puede acceder a lo que este en su array.
    public $rol_no_puede = array(
<<<<<<< HEAD
       'USUARIO_CLIENTE' => array(),
       'USUARIO_NO_REGISTRADO' => array('user'),
=======
       'USUARIO_CLIENTE' => array('turno/add','turno/edit'),
       'USUARIO_NO_REGISTRADO' => array(),
>>>>>>> 8db2a5be51ab7a689221d0f9bf944c2b772163c3
       'ADMINISTRADOR_COMEDOR'=> array(),
       'ADMINISTRADOR'=> array()
      );
 
    public function __construct() {
       parent::__construct();
 
       $this->usuario = $this->session->userdata('user');
 
       $this->validarPagina(current_url());
 
       $datos['mnu_activo'] = $this->uri->segment(1);
 
       if ($this->uri->segment(2) != ""){
 
          $datos['mnu_activo'] .= "_".$this->uri->segment(2);
 
          if ($this->uri->segment(3) != "") {
 
             $datos['mnu_activo'] .= "_".$this->uri->segment(3);
 
          }
       } 
       $this->session->set_userdata($datos);
    } 

    public function validarPagina($url_actual){

        if($this->logeado()){
          $no_url = $this->rol_no_puede[$this->usuario->tipo];
 
          foreach ($no_url as $url) {
 
             if(stristr($url_actual,base_url($url))){
                //comparo si $url se encuentra en $url_actual
                redirect(base_url('error_403'));
             }
         }
         
       }
 
    }
 
 
    public function logeado(){
 
      if($this->session->userdata('logged'))
      {
         return true;
      }else{
         redirect('login', 'refresh');
      }
 
   }
}