<?php
use MongoDB\Driver\Session;
require_once "/xampp/htdocs/appAgro/application/negocio/clsEvento.php";
require_once "/xampp/htdocs/appAgro/application/controllers/GestionSesion.php";
class GestionEvento extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloEvento');
    }
    /**
     * para obtener un Evento
     */
    public function getEvento($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //crear objeto clsEvento
        $auxEvento = new clsEvento();
        //llamado al modelo
        $auxEvento = $this->ModeloEvento->obtenerEvento($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para obtener todos los Eventos
     */
    public function allEventos(){
            $sesion = new GestionSesion();
            $data['existeSesion']=$sesion->existeSesion();
            $data['eventos']=$this->ModeloEvento->listarEventos();
            if($data['existeSesion']){
                $datosGuardados = $sesion->datosSesion();
                $data['nombre'] = $datosGuardados['nombre'];
                $data['usuario'] = $datosGuardados['username'];
                $data['role'] = $datosGuardados['role'];
                if ($data['role'] == 'admin') {
                    $this->load->view("estructura/Vista_editar_eventos",$data);
                }else {
                    $this->load->view("estructura/Vista_eventos",$data);
                }
            }else{
                $this->load->view("estructura/Vista_eventos",$data);
            }   
    }
    
    /**
     * para eliminar un Evento
     */
    public function deleteEvento(){
        $idEvento = $this->input->post("idEvento");
        $this->ModeloEvento->eliminarEvento($idEvento);
        header('Location:'.base_url()."index.php/Frontal/Eventos");
    }
    /**
     * para agregar un Evento
     */
    public function addEvento(){
        //posiblemente tu codigo aqui
        $NombreEvento = $this->input->post("nameEvento");
        $ubicationEvento = $this->input->post("ubicationEvento");
        $newEvent = new clsEvento();
        $newEvent->setNombre($NombreEvento);
        $newEvent->setUbicacion($ubicationEvento);
        $this->ModeloEvento->agregarEvento($newEvent);
        header('Location:'.base_url()."index.php/Frontal/Eventos");
    }
    /**
     * para actualizar un Evento
     */
    public function updateEvento(){
        $idEvento = $this->input->post("idEvento");
        $NombreEvento = $this->input->post("nameEvento");
        $ubicationEvento = $this->input->post("ubicationEvento");
        $newEvent = new clsEvento();
        $newEvent->setId($idEvento);
        $newEvent->setNombre($NombreEvento);
        $newEvent->setUbicacion($ubicationEvento);
        $this->ModeloEvento->actualizarEvento($newEvent);
        header('Location:'.base_url()."index.php/Frontal/Eventos");
    }
    
}