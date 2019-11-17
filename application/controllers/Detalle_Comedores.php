<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Detalle_Comedores extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comedor_model');
        $this->load->model('Turno_model');
        $this->load->model('Menu_model');
        $this->load->helper('url_helper');
    }
    
	public function index()
	{

        $comedores = $this->Comedor_model->findAll();

        foreach ($comedores as $comedor) {
            $turnos = $this->Turno_model->findTurnosByIdComedor($comedor->id_comedor);
            $comedor->turnos = $turnos;        
        }
        $data['comedores'] = $comedores;

       
		$this->load->view('detalle_comedores', $data);
    }
    
    public function findAllMenuByTurnos(){


         //obtener datos por post
         $id_comedor = $this->input->post('comedor');
       
         //se obtiene todos los turnos de un comedor
         $turnos =  $this->Turno_model->findTurnosByIdComedor($id_comedor);
         //se obtiene todo los menus de los turnos
         $menus = [];
 
         foreach($turnos as $turno){
             $menu_aux = $this->Menu_model->findAllByIdTurnoReserva($turno->id_turno);
             $menus = array_merge($menus,$menu_aux);
         }
 
         echo json_encode($menus);

       

    }
}