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
        $user = $this->session->userdata('user');
        $comedores = $this->Comedor_model->findAll();

        foreach ($comedores as $comedor) {
            $turnos = $this->Turno_model->findTurnosByIdComedor($comedor->id_comedor);
            $comedor->turnos = $turnos;  
            $comedor->esFavorito = $this->Comedor_model->es_favorito($user->id_usuario,$comedor->id_comedor); 
            if (! $comedor->esFavorito) {
                $comedor->esFavorito = 0;
            }
        }
       
        foreach ($comedores as $comedor) {
            print_r( $comedor);  print_r('<br><br>');
        }
      

        $data['comedores'] = $comedores;
        $data['user'] = $user;
        print_r('<br><br><br>');
        print_r($data['user']);
		//$this->load->view('detalle_comedores', $data);
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

    public function add_favorito(){
        $id_user = $this->input->post('usuario');
        $id_comedor = $this->input->post('comedor');
        $this->Comedor_model->add_comedor_favorito($id_user,$id_comedor);
    }

    public function delete_favorito(){
        $id_user = $this->input->post('usuario');
        $id_comedor = $this->input->post('comedor');
        $this->Comedor_model->delete_comedor_favorito($id_user,$id_comedor);
    }
}