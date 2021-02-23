<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Comedor extends Security {

    public function __construct(){
        parent::__construct();
        $this->load->model(array('Comedor_model','Ciudad_model'));
        $this->load->helper(array('url','html','form'));
        $this->load->library(array('form_validation','session'));
    }

    public function add()
	{
        $data['ciudades'] = $this->Ciudad_model->findAll();
        $this->load->view('comedores/add',$data);
    }

    public function listing()
	{
        $data['comedores'] = $this->Comedor_model->findAll();
        $this->load->view('comedores/list',$data);
    }


    //pagina principal para editar
    public function edit(){ 
        $id_comedor = $this->uri->segment(3);
        $data = array(
            'comedor' => $this->Comedor_model->findById($id_comedor),
            'ciudades' => $this->Ciudad_model->findAll()
        );
        $this->load->view('comedores/edit',$data);
    }

    //accion de editar
    public function update(){
        $id_user = $this->uri->segment(3);
        $this->Comedor_model->update_user_comedor($id_user);
        redirect(base_url('user/listing'));
    }


    public function delete(){
        $id_comedor = $this->uri->segment(3);
        $this->Comedor_model->delete($id_comedor);
      
      
        redirect(base_url('comedor/listing'));
    }

    public function crearComedor(){
        
      
        $this->form_validation->set_rules('nombre', 'nombre', 'required|callback_unicidad_comedor_check',
            array(  'required' => 'Ingresar el nombre del comedor...',
                    'unicidad_comedor_check' => 'Los datos ingresado ya pertenecen a otro comedor...'
                  ));

        $this->form_validation->set_rules('ciudades', 'ciudades', 'required',
            array('required' => 'Ingresar la ciudad del comedor...'));
        
        $this->form_validation->set_rules('direccion', 'direccion', 'required',
            array('required' => 'Ingresar la direccion del comedor...'));
        
        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');

      
       if ($this->form_validation->run() == FALSE)
       {
            $data['ciudades'] = $this->Ciudad_model->findAll();
          
            $this->load->view('comedores/add',$data);
        }
        else{

            //paso la validacion
            $nombreComedor = $this->input->post('nombre');
            $idCiudad = $this->input->post('ciudades');
            $direccionComedor =  $this->input->post('direccion');

            $this->Comedor_model->insert($nombreComedor,$idCiudad,$direccionComedor);
            redirect(base_url('comedor/listing'));
        }
       
    }

    public function unicidad_comedor_check(){
       
        $nombreComedor = $this->input->post('nombre');
        $idCiudad = $this->input->post('ciudades');
        $direccionComedor = $this->input->post('direccion');
       
        // $this->Comedor_model->insert($nombreComedor,$idCiudad,$direccionComedor);
        // redirect(base_url('comedor/listing'));
       
        if ($this->Comedor_model->check($nombreComedor,$idCiudad) === 0 )
            return TRUE;
               
        return FALSE;
    }


    public function modificarComedor(){
        $nombreComedor = $this->input->post('nombre');
        $nombreComedorOld = $this->input->post('nombre');
        $idCiudad = $this->input->post('ciudades');
        $ciudad_old = $this->input->post('ciudad_old');
        $idComedor = $this->input->post('id');
        $direccionComedor = $this->input->post('direccion');
       

        $this->form_validation->set_rules('nombre', 'nombre', 'required',
                array('required' => 'Ingresar el nombre del comedor...'));

        //los datos ingresados cambiaron, se verifica la unicidad
        if( ! ( ($nombreComedor==$nombreComedorOld) and ($idCiudad==$ciudad_old) ) ){ 
           
            $this->form_validation->set_rules('nombre', 'nombre', 'callback_unicidad_comedor_check',
                array('unicidad_comedor_check' => 'Los datos ingresado ya pertenecen a otro comedor...'));
        }

        $this->form_validation->set_rules('direccion', 'direccion', 'required',
        array('required' => 'Ingresar la direccion del comedor...'));

        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');

        if ($this->form_validation->run() == FALSE)
        {
            $data = array(
                'comedor' => $this->Comedor_model->findById($idComedor),
                'ciudades' => $this->Ciudad_model->findAll()
            );
            $this->load->view('comedores/edit',$data);
        }
        else{ 

            $this->Comedor_model->update($idComedor,$nombreComedor,$idCiudad,$direccionComedor);
            redirect(base_url('comedor/listing'));
        }
    }

    public function esUserComedor(){
        $id_user = $this->uri->segment(3);
        $id_user_comedor = $this->Comedor_model->esUserAdminComedor($id_user);
        if(isset($id_user_comedor->id_usuario)){
            
            if($id_user_comedor->id_usuario != 0){
                $this->Comedor_model->updateUserComedor(0,$id_user_comedor->id_comedor);
            }
        }
        redirect(base_url('user/listing'));
    }


   

}