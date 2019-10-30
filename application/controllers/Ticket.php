<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class Ticket extends Security {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Ticket_model','Menu_model','Comedor_model'));
        $this->load->helper('url_helper');
        
    }

    /**
     * Agrega un ticket
    */
    public function add()
	{
        /*En Session se podria tener el numero de comedor y entonces se buscaria 
          de que comedor quiere sacar un ticket para mostrarle solo los menues que
          estan disponibles en ese comedor
        */
        $data ['menues'] = $this->Menu_model->findAll();
        $this->load->view('tickets_user/add',$data);
    }
   
    public function edit(){
        $id_usuario = $this->uri->segment(3);
        $data = array(
            'usuario' => $this->User_model->find_by_id($id_usuario),
            'comedores' => $this->Comedor_model->findAll(),
            'comedor'=> $this->User_model->find_comedor_by_id_user($id_usuario),
            'persona'=> $this->User_model->find_person_by_id_user($id_usuario)
        );
        $this->load->view('users/edit',$data);
    }

    public function delete (){
        $id_usuario = $this->uri->segment(3);
        $this->User_model->delete($id_usuario);
        redirect(base_url('user/listing'));
    }
    
    public function listing(){
        $data['tickets'] = $this->Ticket_model->findAll();
        $this->load->view('tickets_user/list',$data);
    }

    
     public function store(){
        $code = $this->Ticket_model->get_random_code() + 1;
        $id_menu = $this->input->post('menues');
        $id_estado_pago = 1;
        $id_ticket = $this->Ticket_model->insert($code,$id_estado_pago,$id_menu);
        /*
        Con el dato del usuario en _$SESSION se realiza el insert en la tabla reserva
        $this->Ticket_model->insert_reserva($,$,$,$);
        */
             
        redirect(base_url('ticket/listing'));
        
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