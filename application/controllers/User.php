<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Security.php'; 

class User extends Security {
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('User_model','Comedor_model','Login_model'));
        $this->load->library(array('form_validation','session'));
		$this->load->helper(array('url','html','form'));
       
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

        $tipo_usuario = $this->session->userdata('user')->id_tipo_usuario;

        //es admin de comedor
       if( $tipo_usuario == 3){
           //solo ve los usuario USER_CLIENTE
           $data['usuarios'] = $this->User_model->findAllAdminComedor();
           $this->load->view('users/list',$data);
       }
       else
       {
        $data['usuarios'] = $this->User_model->findAll();
      
        $this->load->view('users/list',$data);
       }

       
    }

    
     public function store(){
        
        $this->form_validation->set_rules('legajo', 'legajo', 'required|callback_user_unicidad|callback_person_exist',
            array(  'required' => 'Ingresar el legago del usuario...',
                    'user_unicidad' => 'Los datos ingresados pertenecen a otro usuario ya registrado...',
                    'person_exist' => 'El legajo indicado no pertenece a ninguna persona...' ));
        
        $this->form_validation->set_rules('email', 'email', 'required|valid_email',
            array(  'required' => 'Ingresar el email del usuario...',
                    'valid_email' =>'El email ingresado no es valido...'));
        
        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');
        
        if ($this->form_validation->run() == FALSE)
        {
            $data ['comedores'] = $this->Comedor_model->findAllNotAsigned();
            $this->load->view('users/add',$data);
        }
        else
        {
           
                $legajo = $this->input->post('legajo');
                $email= $this->input->post('email');
                $idTipoUsuario = $this->input->post('tipos');
                $idComedor = $this->input->post('comedores');
            
                $id_user = $this->User_model->insert($legajo,$idTipoUsuario,$email);

                //Si es admin. Comedor 
                if($idTipoUsuario == '3'){
                    $this->Comedor_model->updateUserComedor($id_user,$idComedor);     
                }  
                redirect(base_url('user/listing'));
            
        }
        
     }

     function person_exist($legajo){
  
         if(!is_null($this->User_model->find_person_by_legajo($legajo)))
             return true;
        
        return false;

     }
     
     function user_unicidad($legajo){
        $result = $this->User_model->exists($legajo);
        return  !$result;
     }

     public function modificarUsuario(){

        $this->form_validation->set_rules('nombre', 'nombre', 'required',
        array('required' => 'Ingresar el nombre...');
    
        $this->form_validation->set_rules('email', 'email', 'required|valid_email',
            array('required' => 'Ingresar un email...'),
                'valid_email' =>'El email ingresado no es valido...'));
    
        $this->form_validation->set_rules('contraseña', 'contraseña', 'required',
            array('required' => 'Ingresar la constraseña...'));
        
        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');

        if ($this->form_validation->run() == FALSE)
        {
            $id_usuario = $this->uri->segment(3);
            $data = array(
                'usuario' => $this->User_model->find_by_id($id_usuario),
                'comedores' => $this->Comedor_model->findAll(),
                'comedor'=> $this->Comedor_model->find_comedor_by_id_user($id_usuario),
                'persona'=> $this->User_model->find_person_by_id_user($id_usuario)
            );

            $this->load->view('users/edit',$data)
        }else{
              //paso la validacion

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
        
    }

    public function modificarMiUsuario(){
        $this->form_validation->set_rules('su_nombre', 'su_nombre', 'required',
        array('required' => 'Ingresar el nombre...');

        $this->form_validation->set_rules('su_apellido', 'su_apellido', 'required',
        array('required' => 'Ingresar el apellido...');
    
        $this->form_validation->set_rules('email', 'email', 'required|valid_email',
        array('required' => 'Ingresar un email...'),
            'valid_email' =>'El email ingresado no es valido...'));
    
        $this->form_validation->set_rules('contraseña', 'contraseña', 'required',
            array('required' => 'Ingresar la constraseña...'));

        $this->form_validation->set_rules('nombre', 'nombre', 'required',
            array('required' => 'Ingresar el nombre...');
        $this->form_validation->set_rules('nro_legajo', 'nro_legajo', 'required|numeric',
        array(  'required' => 'Ingresar el numero de legajo...',
                'numeric' => 'El numero de legajo no es valido...'));
                
        $su_nombre = $this->input->post('su_nombre');
        $su_apellido = $this->input->post('su_apellido');
        $id_persona = $this->input->post('id_persona');
        $email = $this->input->post('email');
        $nombre = $this->input->post('nombre');
        $id_usuario = $this->input->post('id_usuario');
       

       
        $this->User_model->update_my_user($id_usuario,$id_persona,$nombre,$email,$su_nombre,$su_apellido);
        
        $this->form_validation->set_error_delimiters('<p class="text-center text-danger">', '</p>');

        if ($this->form_validation->run() == FALSE) {
            $id_usuario = $this->uri->segment(3);
            $data = array(
                'usuario' => $this->User_model->find_by_id($id_usuario),
                'persona'=> $this->User_model->find_person_by_id_user($id_usuario),
                'user' => $this->session->userdata('user')
            );
        $this->load->view('users/edit_my_user',$data);
        }else{

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
        
        $this->form_validation->set_rules('nro_legajo', 'nro_legajo', 'required|numeric',
            array(  'required' => 'Ingresar el numero de legajo...',
                    'numeric' => 'El numero de legajo no es valido...'));
       
        $this->form_validation->set_rules('email', 'email', 'required',
            array('required' => 'Ingresar el email...'));

        $this->form_validation->set_rules('pass_act', 'contraseña', 'required',
            array('required' => 'Ingresar la contraseña nueva...'));
        
        $this->form_validation->set_rules('pass_act2', 'contraseña', 'required|callback_contraseña_check',
            array('required' => 'Ingresar contraseña de confirmacion nueva...',
              'contraseña_check' => 'Las contraseñas indicadas no son iguales...'));
            
        $pass_act =  $this->input->post('pass_act');
        $pass_act2 =  $this->input->post('pass_act2');
        $nro_legajo = $this->input->post('nro_legajo');
        $email =  $this->input->post('email');

          //compara si las contraseña ingresadas son iguales
        
        $ok =  $this->form_validation->run() && $this->User_model->update_password($nro_legajo,$pass_act,$email);
                
        $response;
        if($ok){
            $response = array(
                'mensaje' => 'La contraseña se cambio con exito...',
                'class' => 'alert-primary'
            );  
        }
        else{
            if( empty(validation_errors()))
                $mensaje = "Error al actualizar la contraseña..."; //error modelo
            else
                $mensaje = validation_errors();//error del formulario, dato mal ingresado
           
            $response = array(
                'mensaje' => $mensaje,
                'class' => 'alert-danger'
            );                   
        }
       
        $this->load->view('users/restore_password',$response);
    }

    function contraseña_check(){

        $pass_act =  $this->input->post('pass_act');
        $pass_act2 =  $this->input->post('pass_act2');

        return ( $pass_act == $pass_act2 );
      
    }

}