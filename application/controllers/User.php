<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class User extends Security {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('User_model','Comedor_model','Login_model'));
        $this->load->helper('url_helper');
    }

    /**
     * Agrega un usuario
    */
    public function add()
	{
        $data ['comedores'] = $this->Comedor_model->findAllNotAsigned();
        $this->load->view('users/add',$data);
    }

    public function edit(){
        $id_usuario = $this->uri->segment(3);
        $data = array(
            'usuario' => $this->User_model->find_by_id($id_usuario),
            'comedores' => $this->Comedor_model->findAll(),
            'comedor'=> $this->Comedor_model->find_comedor_by_id_user($id_usuario),
            'persona'=> $this->User_model->find_person_by_id_user($id_usuario)
        );
        $this->load->view('users/edit',$data);//modificar vista comedor
    }

    public function delete (){
        $id_usuario = $this->uri->segment(3);
        $this->User_model->delete($id_usuario);
        redirect(base_url('user/listing'));
    }
    public function listing(){
        $data['usuarios'] = $this->User_model->findAll();
        $this->load->view('users/list',$data);
    }

    
     public function store(){
        
        $legajo = $this->input->post('legajo');
        if(!is_null($this->User_model->find_person_by_legajo($legajo)) && !($this->User_model->exists($legajo))){

        $email= $this->input->post('email');
        $idTipoUsuario = $this->input->post('tipos');
        $idComedor = $this->input->post('comedores');
        $id_user = $this->User_model->insert($legajo,$idTipoUsuario,$email);

       //Si es admin. Comedor entra al if
        if($idTipoUsuario == '3'){
           $this->Comedor_model->updateUserComedor($id_user,$idComedor);     
        }  
        redirect(base_url('user/listing'));
        }
        redirect(base_url('user/add'));
     }
     
     public function modificarUsuario(){
        
        $email = $this->input->post('email');
        $nombre = $this->input->post('nombre');
        $contraseña = $this->input->post('contraseña');
        $tipo = $this->input->post('tipo_seleccionado');
        if($tipo != 1){
        $comedor_new = $this->input->post('numero_comedor_seleccionado');
        }
        else{
            $comedor_new = -1;
        }
        $comedor_old = $this->input->post('id_comedor');
        $id_user = $this->input->post('id_usuario');
        $id_pers = $this->input->post('id_persona');
              
        
        $this->User_model->update($id_user,$id_pers,$tipo,$nombre,$contraseña,$email);
        
        // verifica si se cambio el comedor
         if( !($comedor_new == $comedor_old)){
            $this->Comedor_model->updateUserComedor($id_user,$comedor_new);
         }
        redirect(base_url('user/listing'));
    }

    public function modificarMiUsuario(){
        $su_nombre = $this->input->post('su_nombre');
        $su_apellido = $this->input->post('su_apellido');
        $id_persona = $this->input->post('id_persona');
        $email = $this->input->post('email');
        $contraseña = $this->input->post('contraseña');
        $nombre = $this->input->post('nombre');
        $id_usuario = $this->input->post('id_usuario');
        $this->User_model->update_my_user($id_usuario,$id_persona,$nombre,$email,$su_nombre,$su_apellido,$contraseña);
        
        $user = $this->Login_model->find_by_id($id_usuario);
        $this->recargar_sesion($user);
        redirect(base_url('dashboard'));
    }

    public function edit_my_user(){
        $id_usuario = $this->uri->segment(3);
        $data = array(
            'usuario' => $this->User_model->find_by_id($id_usuario),
            'persona'=> $this->User_model->find_person_by_id_user($id_usuario),
            'user' => $this->session->userdata('user')
        );
        $this->load->view('users/edit_my_user',$data);
    }

    private function recargar_sesion($usuario){
		if ($usuario) {
			$usuario_data = array (
				'user' => $usuario,
				'logged' => TRUE);
			$this->session->sess_expiration = '28800';// expires 
			$this->session->set_userdata($usuario_data);
		}
	}	


 /**
     * Vista reestablecer la contraseña
    */
    public function restore_password(){
        $this->load->view('users/restore_password');
    }

    /**
     * Permiter reestablecer la contraseña de un usuario
    */
    public function check_password(){
            
        $ok = $this->User_model->update_password();
                
        $response;
        if($ok){
            $response = array(
                'mensaje' => 'La contraseña se cambio con exito',
                'class' => 'alert-primary'
            );  
        }
        else{
            $response = array(
                'mensaje' => 'Los datos ingresado son incorrento...no se reestablecio la contraseña',
                'class' => 'alert-danger'
            );                   
        }
       
        $this->load->view('users/restore_password',$response);
    }

}