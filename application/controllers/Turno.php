<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Turno extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model('Turno_model');
        $this->load->library(array('form_validation','session'));
		$this->load->helper(array('url','html','form'));
       
    }

    public function add()
	{
        $data ['comedores'] = $this->Turno_model->findAllComedores();
        $this->load->view('turnos/add',$data);
    }

    public function listing()
	{
        $data['turnos'] = $this->Turno_model->findAll();
        $this->load->view('turnos/list',$data);
    }

    public function edit($id_turno){
        $data = array(
            'turno' => $this->Turno_model->findById($id_turno),
            'comedores' => $this->Turno_model->findAllComedores()
        );
        $this->load->view('turnos/edit',$data);
    }

    public function delete(){
        $id_turno = $this->uri->segment(3);
        $this->Turno_model->delete($id_turno);
        redirect(base_url('turno/listing'));
    }

    public function crearTurno(){
        
        //validacion de formulario
        if($this->validarFormularioTurno() == FALSE){
            $data ['comedores'] = $this->Turno_model->findAllComedores();
            $this->load->view('turnos/add',$data);
        }
        else{
            $nombreTurno = $this->input->post('nombre');
            $hora_inicio = $this->input->post('hora_inicio');
            $hora_fin = $this->input->post('hora_fin');
            $idComedor = $this->input->post('comedores');
            
            $this->Turno_model->insert($nombreTurno,$hora_inicio,$hora_fin,$idComedor);
            redirect(base_url('turno/listing'));
        }
       

      
    }

    public function modificarTurno(){

        $nombreTurno = $this->input->post('nombre');
        $hora_inicio = $this->input->post('hora_inicio');
        $hora_fin = $this->input->post('hora_fin');
        $idComedor = $this->input->post('comedores');
        $idTurno = $this->input->post('id_turno');
       
        if($this->validarFormularioTurno() == FALSE){
             $data = array(
                'turno' => $this->Turno_model->findById($idTurno),
                'comedores' => $this->Turno_model->findAllComedores()
             );
             $this->load->view('turnos/edit',$data);
          
        }else{
            //paso la validacion
            $this->Turno_model->update($idTurno,$nombreTurno,$hora_inicio,$hora_fin,$idComedor);
            redirect(base_url('turno/listing'));
        }
        
    }


    function validarFormularioTurno(){
        $this->form_validation->set_rules('nombre', 'nombre', 'required|callback_unicidad_turno_check',
            array(  'required' => 'Ingresar el nombre del turno...',
                    'unicidad_turno_check' => 'Los datos ingresados le pertenecen a otro turno...'));
        
        $this->form_validation->set_rules('hora_inicio', 'hora_inicio', 'required',
            array('required' => 'Ingresar la hora de inicio del turno...'));
        
        $this->form_validation->set_rules('hora_fin', 'hora_fin', 'required',
            array('required' => 'Ingresar la hora de fin del turno...'));

        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');

        return $this->form_validation->run();
    }

    function unicidad_turno_check(){
       
        $nombre = $this->input->post('nombre');
        $hora_inicio = $this->input->post('hora_inicio');
        $hora_fin = $this->input->post('hora_fin');
        $comedor = $this->input->post('comedores');
        
        if( $this->input->post('update') == 'TRUE' || $this->input->post('update') == FALSE ){
          //caso agregar turno o en la actualizacion  se modifica ningun dato
          if ($this->Turno_model->check($nombre,$hora_inicio,$hora_fin,$comedor) === 0 )
            return TRUE;
         
        return FALSE;
          
        }
        else{
            //no tiene sentido validar unicidad update false
            return TRUE; 
        }
            
       
        
    }
}