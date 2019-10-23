<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class User extends Security {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('User_model','Comedor_model'));
        $this->load->helper('url_helper');
        
    }

    /**
     * Agrega un usuario
    */
    public function add()
	{
        $data = array(
            'comedores' => $this->Comedor_model->findAll(),
            'user' => $this->session->userdata('user')
        );
        $this->load->view('users/add',$data);
    }
   
    public function edit(){
        $id_usuario = $this->uri->segment(3);
        $data = array(
            'usuario' => $this->User_model->find_by_id($id_usuario),
            'comedores' => $this->Comedor_model->findAll(),
            'comedor'=> $this->User_model->find_comedor_by_id_user($id_usuario),
            'persona'=> $this->User_model->find_person_by_id_user($id_usuario),
            'user' => $this->session->userdata('user')
        );
        $this->load->view('users/edit',$data);
    }

    public function delete (){
        $id_usuario = $this->uri->segment(3);
        $this->User_model->delete($id_usuario);
        redirect(base_url('user/listing'));
    }
    public function listing()
	{
        $data = array(
            'usuarios' => $this->User_model->findAll(),
            'user' => $this->session->userdata('user')
        );
        $this->load->view('users/list',$data);
    }

    
     public function store(){

        $legajo = $this->input->post('legajo');
        $email= $this->input->post('email');
        $idTipoUsuario = $this->input->post('tipos');
        $idComedor = $this->input->post('comedores');
        $id_user = $this->User_model->insert($legajo,$idTipoUsuario,$legajo,$legajo,$email,$idComedor);

        if($_POST['tipos'] == '3'){
           $this->User_model->insert_usuario_comedor($id_user,$idComedor);     
        }
        redirect(base_url('users/list'));
        
     }
     
     public function modificarUsuario(){
        $id_pers = $this->input->post('id_persona');
        $email = $this->input->post('email');
        $tipoUser = $this->input->post('tipos');
        $nombre = $this->input->post('nombre');
        $num = $this->input->post('numero');
        $id_user_com = $this->input->post('id_user_comedor');
        $numeroCom = $this->input->post('comedores');
        $id_user = $this->input->post('id');
        $this->User_model->update($id_user,$id_pers,$tipoUser,$nombre,$email);
        //si el tipo seleccionado es distinto al que tenia y selecciono admin. comed
        if($_POST['tipos'] != $_POST['tipo'] && $_POST['tipos'] == 3){
            $this->User_model->insert_usuario_comedor($id_user,$numeroCom);     
        }
        //si el tipo seleccionado es igual al que tenia y el numero de comedor es distinto al que tenia
        if($_POST['tipos'] != $_POST['tipo'] && $numeroCom != $num){
            $this->User_model->update_usuario_comedor($id_user_com,$id_user,$numeroCom);     
        }
        //si el tipo seleccionado es distinto al que tenia y selecciono usuario client
        if($_POST['tipos'] != $_POST['tipo'] && $_POST['tipos'] == 1){
            $this->User_model->delete_usuario_comedor($id_user_com);
        }
        redirect(base_url('user/listing'));
    }

    

}