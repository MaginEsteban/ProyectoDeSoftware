<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Menu extends Security {

    public function __construct(){
        parent::__construct();
        
        $this->load->model('Menu_model');
        $this->load->model('Comedor_model');
        $this->load->library(array('form_validation','session'));
		$this->load->helper(array('url','html','form'));
       

    }

    public function add()
	{
        $usuario = $this->session->userdata('user');
        $data = array (
            'tiposdemenu' => $this->Menu_model->findAllTiposDeMenu(),
            'comedor' => $this->Comedor_model->findByIdAdminComedor($usuario->id_usuario)
        );

       
        $this->load->view('menues/add',$data);
    }

    public function listing()
	{
        //mostrar menus por comedor
        $comedor = $this->session->userdata('id_comedor');
        $data['menues'] = $this->Menu_model->findAllByIdComedor($comedor);
        
        $this->load->view('menues/list',$data);
    }

    public function edit( ){ 
        $usuario = $this->session->userdata('user');
        $id_menu = $this->uri->segment(3);

        $data = array(
            'menu' => $this->Menu_model->findById($id_menu),
            'tiposdemenu' => $this->Menu_model->findAllTiposDeMenu(),
            'comedor' => $this->Comedor_model->findByIdAdminComedor($usuario->id_usuario)
        );

        $this->load->view('menues/edit',$data);
    }

    public function delete(){
        $id_menu = $this->uri->segment(3);
        $this->Menu_model->delete($id_menu);
        redirect(base_url('menu/listing'));
    }

    public function delete_post(){
        $id = $this->input->post('id');
        $this->Menu_model->delete($id_menu);
        redirect(base_url('menu/listing'));

    }

    public function crear(){
        //validacion de formulario
       
        $this->form_validation->set_rules('nombre', 'nombre', 'required|callback_unicidad_menu_check',
            array('required' => 'Ingresar el nombre del menu...',
                  'unicidad_menu_check' => 'El menu ya existe en el comedor...'));
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required',
        
        array('required' => 'Ingresar la descripcion del menu...'));
        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');

        if ($this->form_validation->run() == FALSE)
        {
            $usuario = $this->session->userdata('user');
            $data = array (
                'tiposdemenu' => $this->Menu_model->findAllTiposDeMenu(),
                'comedor' => $this->Comedor_model->findByIdAdminComedor($usuario->id_usuario)
            ); 
            $this->load->view('menues/add',$data);
               
        }
        else
        {
            //paso la validacion
            $nombreMenu = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion');
            $idTipoMenu = $this->input->post('tiposdemenues');
            $idComedor = $this->input->post('comedores');
           
            $this->Menu_model->insert($nombreMenu,$descripcion,$idTipoMenu,$idComedor);
            redirect(base_url('menu/listing')); 
        }

        
       
    }

    public function modificarMenu(){
      

        $this->form_validation->set_rules('nombre', 'nombre', 'required|callback_unicidad_menu_check',
            array('required' => 'Ingresar el nombre del menu...',
                  'unicidad_menu_check' => 'El menu ya existe en el comedor...'));
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required',
        
        array('required' => 'Ingresar la descripcion del menu...'));
        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');

        if ($this->form_validation->run() == FALSE)
        {
            $usuario = $this->session->userdata('user');
            $id_menu = $this->input->post('id');
           
            $data = array(
                'menu' => $this->Menu_model->findById($id_menu),
                'tiposdemenu' => $this->Menu_model->findAllTiposDeMenu(),
                'comedor' => $this->Comedor_model->findByIdAdminComedor($usuario->id_usuario)
            );
    
            $this->load->view('menues/edit',$data);
                   
        //    $this->session->set_flashdata('error', validation_errors());
        //    redirect(base_url('menu/edit/').$this->input->post('id'));
        }
        else
        {
            //paso la validacion
                
            $nombreMenu = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion');
            $idTipoMenu = $this->input->post('tiposdemenues');
            $idComedor = $this->input->post('comedores');
            $idMenu = $this->input->post('id');
        
            $this->Menu_model->update($idMenu,$nombreMenu,$descripcion,$idTipoMenu,$idComedor);
            redirect(base_url('menu/listing'));
        }

    }


    function unicidad_menu_check(){
       
        $menu = $this->input->post('nombre');
        $id_tipo_menu = $this->input->post('tiposdemenues');
        $id_comedor = $this->input->post('comedores');

        if ($this->Menu_model->check($menu, $id_tipo_menu,$id_comedor) === 0 )
            return TRUE;
               
        return FALSE;
    }

}