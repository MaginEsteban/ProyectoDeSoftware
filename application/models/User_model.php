<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
   
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($legajo,$tipo_usuario,$email){
            $id_pers = $this->find_person_by_legajo($legajo);
            $data = array(
               'id_persona' => $id_pers,
               'id_tipo_usuario' => $tipo_usuario,
               'nombre' => $legajo,
               'contraseña' => $legajo,
               'email' => $email
            );
        $this->db->insert('usuario', $data);
        return $this->db->insert_id();
    } 
    
    public function insert_register ($legajo,$tipo_usuario,$name,$pass,$email){
       
            $id_pers = $this->find_person_by_legajo($legajo);
        
            $data = array(
               'id_persona' => $id_pers,
               'id_tipo_usuario' => $tipo_usuario,
               'nombre' => $name,
               'contraseña' => $pass,
               'email' => $email
            );
            
            $this->db->insert('usuario', $data);
   
    } 

    public function delete($id_user){
        $this->db->where('id_usuario', $id_user);
        $this->db->delete('usuario');
    }

    public function update($id,$id_pers,$tipo_usuario,$nombre,$contraseña,$email){
            $data = array(
                'id_usuario' => $id,
                'id_persona' => $id_pers,
                'id_tipo_usuario' => $tipo_usuario,
                'nombre' => $nombre,
                'contraseña' => $contraseña,
                'email' => $email
            );
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $data);
    }

    public function findAll(){
        $this->db->select('usuario.id_usuario,usuario.nombre,usuario.email,persona.numero_legajo,tipo_usuario.tipo');
        $this->db->from('usuario');
        $this->db->join('persona', 'usuario.id_persona = persona.id_persona');
        $this->db->join('tipo_usuario', 'usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario');
       
         $query = $this->db->get();
        
        return $query->result();
    }

    
    public function findAllAdminComedor(){
        $this->db->select('usuario.id_usuario,usuario.nombre,usuario.email,persona.numero_legajo,tipo_usuario.tipo');
        $this->db->from('usuario');
        $this->db->join('persona', 'usuario.id_persona = persona.id_persona');
        $this->db->join('tipo_usuario', 'usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario');
        $this->db->where('usuario.id_tipo_usuario', 1);
         $query = $this->db->get();
        
        return $query->result();
    }

    public function find_by_id($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('id_usuario',$id);
        $query = $this->db->get();
        return $query->row(0,'User_model');
    }

    public function find_person_by_id_user($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('persona','usuario.id_persona = persona.id_persona');
        $this->db->where('usuario.id_usuario',$id);
        $query = $this->db->get();
        return $query->row(0,'User_model');
    }

    //bool
    public function exists($legajo){
        $this->db->select('persona.numero_legajo');
        $this->db->from('usuario');
        $this->db->join('persona','usuario.id_persona = persona.id_persona');
        $this->db->where('persona.numero_legajo',$legajo);
        $query = $this->db->get();
        if(empty($query->row(0,'User_model'))){
            return false;
        }
        return true;
    }
    
    /**
     * Permite reestablecer la contraseña
    */
    public function update_password(){
        $pass_act =  $this->input->post('pass_act');
        $pass_act2 =  $this->input->post('pass_act2');
        $nro_legajo = $this->input->post('nro_legajo');
        $email =  $this->input->post('email');
        
        //compara si las contraseña ingresadas son iguales
        if(! ( $pass_act == $pass_act2 ) )
            return false;

        $data = array(
            'email' => $email,
            'contraseña' => $pass_act,
        );
        //busca la persona en base a al legajo
      $id_persona = $this->find_person_by_legajo($nro_legajo);

        $this->db->where(   array(
            'id_persona' => $id_persona,
            'email' => $email ) );

        $this->db->update('usuario', $data );

        if($this->db->affected_rows() == 0){
            return false;

        }
        else
            return true;
    }
      
     public function find_person_by_legajo($legajo){
         $persona = 
         
         $this->db->select('*');
         $this->db->from('persona');
         $this->db->where('numero_legajo',$legajo);

      
         $query = $this->db->limit(1)->get();    
         if($query->num_rows() > 0)
             return $query->result()[0]->id_persona;//->id_persona;
        else
            return null;     
     }

     public function update_my_user($id,$id_pers,$nombre,$email,$su_nombre,$su_apellido,$contraseña){
        $data = array(
            'id_usuario' => $id,
            'id_persona' => $id_pers,
            'nombre' => $nombre,
            'email' => $email,
            'contraseña' => $contraseña
        );
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $data);
        $this->edit_my_datos($id_pers,$su_nombre,$su_apellido);
    }
    
    public function edit_my_datos($id_pers,$su_nombre,$su_apellido){
        $data = array(
            'id_persona' => $id_pers,
            'nombre' => $su_nombre,
            'apellido' => $su_apellido
        );
        $this->db->where('id_persona', $id_pers);
        $this->db->update('persona', $data);
    }

    public function check($email){

        $this->db->select('*');
        $this->db->from('usuario as u');
        $this->db->where('u.email',$email);

        return $this->db->count_all_results();
    }

}

?>