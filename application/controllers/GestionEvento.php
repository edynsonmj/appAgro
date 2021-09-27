<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsEvento.php";
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
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //recupera los Eventos en un rray para ello, ejemplo
        $Eventos = array();
        //llamado al modelo
        $Eventos = $this->ModeloEvento->listarEventos();
        //posiblemente tu codigo aqui
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