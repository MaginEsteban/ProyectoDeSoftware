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
        $data ['comedores'] = $this->Comedor_model->findAll();
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
        $this->load->view('users/edit',$data);
    }

    public function delete (){
        $id_usuario = $this->uri->segment(3);
        $this->User_model->delete($id_usuario);
        redirect(base_url('user/listing'));
    }
    public function listing()
	{
        $data['usuarios'] = $this->User_model->findAll();
        $this->load->view('users/list',$data);
    }

    
     public function store(){
        $legajo = $this->input->post('legajo');
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
     
     public function modificarUsuario(){
        
        $email = $this->input->post('email');
        $nombre = $this->input->post('nombre');
        $contraseña = $this->input->post('contraseña');
        $tipo = $this->input->post('tipo_seleccionado');
        $comedor_new = $this->input->post('numero_comedor_seleccionado');
        $comedor_old = $this->input->post('id_comedor');
        $id_user = $this->input->post('id_usuario');
        $id_pers = $this->input->post('id_persona');
        
        
        $this->User_model->update($id_user,$id_pers,$tipo,$nombre,$contraseña,$email);
        

        // verifica si se cambio el comedor
         if( !($comedor_new == $comedor_old)){
            $this->Comedor_model->updateUserComedor($id_user,$comedor_new);
         }
        /*
        //si el tipo seleccionado es distinto al que tenia y selecciono admin. comed
        // 1 = Usuario Cliente / 3 = Administrador de Comedores
        if($_POST['tipos_new'] != $_POST['tipo'] && $_POST['tipos'] == 3){
            $this->User_model->insert_usuario_comedor($id_user,$numeroCom);     
        }
        //si el tipo seleccionado es igual al que tenia y el numero de comedor es distinto al que tenia
        if($_POST['tipos_new'] == $_POST['tipo'] && $numero_com_old != $numeroCom){
            $this->User_model->update_usuario_comedor($id_user_com,$id_user,$numeroCom);     
        }
        //si el tipo seleccionado es distinto al que tenia y selecciono usuario client
        if($_POST['tipos_new'] != $_POST['tipo'] && $_POST['tipos'] == 1){
            $this->User_model->delete_usuario_comedor($id_user_com);
        }
        */
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


}