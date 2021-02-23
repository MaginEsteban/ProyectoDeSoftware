<?php

defined('BASEPATH') OR exit('No direct script access allowed');


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');
class Detalle_Comedores extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Comedor_model');
        $this->load->model('Turno_model');
        $this->load->model('Ticket_model');
        $this->load->model('Menu_model');
        $this->load->model('DetalleComedor_model');

        $this->load->helper('url_helper');
    }

    public function findAllMenuByTurnos($id_comedor){

         //se obtiene todos los turnos de un comedor
         $turnos =  $this->DetalleComedor_model->findTurnosByIdComedor($id_comedor);
 
         foreach($turnos as $turno){
            
            $turno->lunes = new stdClass;
            $this->menusDelDia($turno->lunes, $turno->id_turno, 1, "monday", $id_comedor );
           
            $turno->martes = new stdClass;
            $this->menusDelDia($turno->martes, $turno->id_turno, 2, "tuesday", $id_comedor );
           
            $turno->miercoles = new stdClass;
            $this->menusDelDia($turno->miercoles, $turno->id_turno, 3, "wednesday", $id_comedor );

            $turno->jueves = new stdClass;
            $this->menusDelDia($turno->jueves, $turno->id_turno, 4, "thursday", $id_comedor );
           
            $turno->viernes = new stdClass;
            $this->menusDelDia($turno->viernes, $turno->id_turno, 5, "friday", $id_comedor );

           
            $turno->sabado = new stdClass;
            $this->menusDelDia($turno->sabado, $turno->id_turno, 6, "saturday", $id_comedor );

        }
         
        echo json_encode($turnos);
    }

    private function menusDelDia(&$turno_obj,$id_Turno,$dia,$nombre_dia,$id_comedor){
        
        $turno_obj->id = $id_Turno;
        $turno_obj->nombre_dia = $nombre_dia;
        $turno_obj->menus = new stdClass;
        $turno_obj->menus = $this->DetalleComedor_model->findAllByIdTurnoReserva($id_Turno,$dia,$id_comedor);
       
        
    }

    public function sedes(){ 

        $sedes = $this->DetalleComedor_model->findAllSedes();
       
        echo json_encode($sedes);
        }

    public function ciudades($id_sede){
        
        $ciudades = $this->DetalleComedor_model->findAllCiudades($id_sede);
        echo json_encode($ciudades);
    }

    public function comedores($id_ciudad){
        
        $comedores = $this->DetalleComedor_model->findAllComedores($id_ciudad);
        
        echo json_encode($comedores);    
    }

    public function favorito($comedor, $email){
        
        $persona = $this->Comedor_model->find_person_by_email_user($email);


        if($persona == null)
            echo json_encode(array('error' => '¡El correo ingresado no pertecene a ninguna persona!'));

        else{
            $data = array(
                'favorito' => $this->Comedor_model->es_favorito($email,$comedor)
            );
                    
            echo json_encode($data);    
        }
         
    }


    //ok
    public function add_favorito(){
       
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $email = $dataObject->email;
        $id_comedor = $dataObject->comedor;

        $persona = $this->Comedor_model->find_person_by_email_user($email);

        if($persona == null)
            echo json_encode(array('error' => '¡El correo ingresado no pertecene a ninguna persona!')); 

        $this->Comedor_model->add_comedor_favorito($persona->id_usuario, $id_comedor);


        echo json_encode(['comedor successfully.']);
    }

    //ok
    public function delete_favorito(){
              
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $email = $dataObject->email;
        $id_comedor = $dataObject->comedor;

        $persona = $this->Comedor_model->find_person_by_email_user($email);

        if($persona == null)
        echo json_encode(array('error' => '¡El correo ingresado no pertecene a ninguna persona!')); 


        $this->Comedor_model->delete_comedor_favorito($persona->id_usuario, $id_comedor);
        echo json_encode(array('mensaje' => 'Comedor eliminado como favorito'));
    }


    public function ticket_add(){

        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        //Obtengo el nombre del dia en ingles 
        $nombreDia = $dataObject->nombre_dia;
        //Calculo en base a ese dia lo formateo en una fecha y lo asigno a $fecha_retiro
        $turno = $dataObject->id_turno;//id turno
        $id_comedor = $dataObject->id_comedor;
        $email = $dataObject->email;
        
        $horas = $this->Turno_model->findHoraTurno($turno);
        
        $fecha_final = $this->fechaFinal($nombreDia,$horas);
       
        $fecha_inicio_semana = $this->inicio_semana($fecha_final);
        
       //validacion cantidad de sanciones
       $cantidad_sanciones = $this->DetalleComedor_model->cantidad_sanciones($email);
        
       if($cantidad_sanciones > 2) // alcanzo las 3 sanciones
       {
           echo json_encode(array('error' => 'No es posible, debido a que posee 3 sanciones...'));
       }
       else{
            $code = $this->Ticket_model->get_random_code() + 1;
            $id_menu = $dataObject->id_menu;
            $persona = $this->Comedor_model->find_person_by_email_user($email);
            $fecha_now = date('Y-m-d H:i:s');
            
            //Realizo el insert de un ticket y obtengo el id de la bd
            $id_ticket = $this->Ticket_model->insert($code,$id_menu,$persona->id_persona,$turno,$fecha_final,$fecha_now);
            
            //Utilizo el id del ticket creado para hacer un insert en estado_ticket
            $this->Ticket_model->insert_ticket_estado($fecha_now,null,$id_ticket,2);
            
            //hacer insert tabla reserva
            $this->Ticket_model->reserva($id_ticket,$persona->id_persona,$turno,$fecha_inicio_semana);

            echo json_encode(array('mensaje' => 'ticket agregado...'));
       }


       
    }
   
    public function inicio_semana($fecha){

        $diaInicio="Monday";
        $strFecha = strtotime($fecha);
    
        $fechaInicio = date('Y-m-d',strtotime('last '.$diaInicio,$strFecha));
    
        if(date("l",$strFecha)==$diaInicio){
            $fechaInicio= date("Y-m-d",$strFecha);
        }
       
        return $fechaInicio;
    }

    private function fechaFinal($nombreDia,$horas){
        
        $fecha_now_as_number = strtotime(date('Y-m-d H:i:s'));

        $hora_inicio = $horas->hora_inicio;
        $hora_fin = $horas->hora_fin;
       
        $fecha_retiro = date('Y-m-d',strtotime("$nombreDia"));
        $fecha_retiro_as_number = strtotime($fecha_retiro);
       
        $hora_now = date("H:i:s",$fecha_now_as_number);
        $dia_now = date("d",$fecha_now_as_number);
        $dia_retiro = date("d",$fecha_retiro_as_number);

        if($dia_now == $dia_retiro){
            //SI EL DIA ES EL MISMO QUE SELECCIONO PARA EL PEDIDO
            //Y SI ESTA DENTRO DEL HORARIO
            //DEJO LA FECHA ACTUAL

           if($hora_now > $hora_inicio && $hora_now < $hora_fin){
             $fecha_final = $fecha_retiro;
           }
           else{
            //EN CASO DE QUE EL DIA DE LA FECHA ACTUAL SEA 
            //EL MISMO QUE LA FECHA SELECCIONADA PARA EL TICKET Y YA NO ESTE 
            //PERMITIDO EMITIRSE PORQUE SE ESTA FUERA DE HORARIO
            //EN ESE CASO SE DEBEN SUMAR 7 DIAS A FECHA RETIRO
            $fecha_final = date('Y-m-d',strtotime($fecha_retiro."+ 7 days"));
            }
        }
        else{
            $fecha_final = $fecha_retiro;
        }
        return $fecha_final;
    }

}