<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
   
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function insert ($legajo,$tipo_usuario,$nombre,$contraseña,$email){
        $id_pers = $this->find_person_by_legajo($legajo);
        $data = array(
            'id_persona' => $id_pers,
            'id_tipo_usuario' => $tipo_usuario,
            'nombre' => $nombre,
            'contraseña' => $contraseña,
            'email' => $email
        );
        $this->db->insert('usuario', $data);
        return $this->db->insert_id();
    } 

    public function insert_usuario_comedor($id_user,$id_comedor){
        $data = array(
            'id_usuario' => $id_user,
            'id_comedor' => $id_comedor
        );
        $this->db->insert('usuario_comedor',$data);
    }

    public function delete_usuario_comedor($id_user_comedor){
        $this->db->where('id_usuario_comedor', $id_user_comedor);
        $this->db->delete('usuario_comedor');
    }

    public function delete($id_user){
        $this->db->where('id_usuario', $id_user);
        $this->db->delete('usuario');
    }
    public function update_usuario_comedor($id_usuario_comedor,$id_usuario,$id_comedor){
        $data = array(
            'id_usuario_comedor' => $id_usuario_comedor,
            'id_usuario' => $id_usuario,
            'id_comedor' => $id_comedor
        );
        $this->db->where('id_usuario_comedor', $id_usuario_comedor);
        $this->db->update('usuario_comedor', $data);
    }
    public function update($id,$id_pers,$tipo_usuario,$nombre,$email){
            $data = array(
                'id_usuario' => $id,
                'id_persona' => $id_pers,
                'id_tipo_usuario' => $tipo_usuario,
                'nombre' => $nombre,
                'email' => $email
            );
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $data);
    }

    public function findAll(){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('persona', 'usuario.id_persona = persona.id_persona');
        $this->db->join('tipo_usuario', 'usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario');
       
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

    public function find_comedor_by_id_user($id){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('usuario_comedor', 'usuario.id_usuario = usuario_comedor.id_usuario');
        $this->db->join('comedor', 'usuario_comedor.id_comedor = comedor.id_comedor');
        $this->db->where('usuario.id_usuario',$id);
        $query = $this->db->get();
        return $query->row(0,'User_model');

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
      
     private function find_person_by_legajo($legajo){
         $persona = $this->db->get_where('persona',array('numero_legajo' => $legajo))->row(); 
         return $persona->id_persona;
     }



}

?>