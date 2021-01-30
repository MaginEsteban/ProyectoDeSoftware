<?php
//use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH . 'libraries/REST_Controller.php';
//require APPPATH . 'libraries/Format.php';

class Detalle_Comedores extends CI_Controller {

    public function __construct(){
        parent::__construct();


        $this->load->model('Comedor_model');
        $this->load->model('Turno_model');
        $this->load->model('Menu_model');
        $this->load->model('DetalleComedor_model');
        
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
       
        
      

        $data['comedores'] = $comedores;
        $data['user'] = $user;
       
		$this->load->view('detalle_comedores', $data);
    }
    
    public function findAllMenuByTurnos($id_comedor){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");

         //se obtiene todos los turnos de un comedor
         $turnos =  $this->DetalleComedor_model->findTurnosByIdComedor($id_comedor);
 
         foreach($turnos as $turno){
            
            
            $turno->lunes = new stdClass;
            $turno->lunes->id = 1;
            $turno->lunes->menus = new stdClass;
            $turno->lunes->menus = $this->DetalleComedor_model->findAllByIdTurnoReserva($turno->id_turno,1,$id_comedor);
            
            $turno->martes = new stdClass;
            $turno->martes->id = 2;
            $turno->martes->menus = new stdClass;
            $turno->martes->menus = $this->DetalleComedor_model->findAllByIdTurnoReserva($turno->id_turno,2,$id_comedor);
             
            $turno->miercoles = new stdClass;
            $turno->miercoles->id = 3;
            $turno->miercoles->menus = new stdClass;
            $turno->miercoles->menus = $this->DetalleComedor_model->findAllByIdTurnoReserva($turno->id_turno,3,$id_comedor);
            
            $turno->jueves = new stdClass;
            $turno->jueves->id = 4;
            $turno->jueves->menus = new stdClass;
            $turno->jueves->menus = $this->DetalleComedor_model->findAllByIdTurnoReserva($turno->id_turno,4,$id_comedor);
           
            $turno->viernes = new stdClass;
            $turno->viernes->id = 5;
            $turno->viernes->menus = new stdClass;
            $turno->viernes->menus = $this->DetalleComedor_model->findAllByIdTurnoReserva($turno->id_turno,5,$id_comedor);
             
            $turno->sabado = new stdClass;
            $turno->sabado->id = 6;
            $turno->sabado->menus = new stdClass;
            $turno->sabado->menus = $this->DetalleComedor_model->findAllByIdTurnoReserva($turno->id_turno,6,$id_comedor);
         }
         


         echo json_encode($turnos);

       

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

    public function sedes(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");

        $sedes = $this->DetalleComedor_model->findAllSedes();
       
        echo json_encode($sedes);
        //$this->response($sedes, REST_Controller::HTTP_OK); 
    }

    public function ciudades($id_sede){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");

        $sedes = $this->DetalleComedor_model->findAllCiudades($id_sede);
       
        echo json_encode($sedes);
    }

    public function comedores($id_ciudad){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");

        $comedores = $this->DetalleComedor_model->findAllComedores($id_ciudad);
       
        echo json_encode($comedores);
    }

    
    public function ver($id_comedor){

       
        $this->DetalleComedor_model->ver(2,1,$id_comedor);
            
    }

}