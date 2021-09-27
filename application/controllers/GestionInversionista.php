<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsInversionista.php";
class GestionInversionista extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloInversionista');
    }
    /**
     * para obtener un Inversionista
     */
    public function getInversionista($prmId)
    {
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //crear objeto clsInversionista
        $auxInversionista = new clsInversionista();
        //llamado al modelo
        $auxInversionista = $this->ModeloInversionista->obtenerInversionista($prmId);
    //posiblemente tu codigo aqui
    }
    /**
     * para obtener todas las Inversionistaes
     */
    public function allInversionistas()
    {
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //recupera los Inversionistas en un rray para ello, ejemplo
        $Inversionistas = array();
        //llamado al modelo
        $Inversionistas = $this->ModeloInversionista->listarInversionistas();
    //posiblemente tu codigo aqui
    }
    /**
     * para eliminar un Inversionista
     */
    public function deleteInversionista()
    {
        $idInver = $this->input->post("idInversionista");
        $this->ModeloInversionista->eliminarInversionista($idInver);
        header('Location:'.base_url()."index.php/Frontal/Inversionistas");
    }
    /**
     * para agregar un Inversionista
     */
    public function addInversionista()
    {
        $nombreInver = $this->input->post("nameInversionista");
        $imagenInver = $this->input->post("imageInversionista");
        $descripcionInver = $this->input->post("descripcionInversionista");
        $correoInver = $this->input->post("emailInversionista");
        $newInver = new clsInversionista();
        $newInver->setNombre($nombreInver);
        $newInver->setImagen($imagenInver);
        $newInver->setDescripcion($descripcionInver);
        $newInver->setTelefono($correoInver);
        $this->ModeloInversionista->agregarInversionista($newInver);
        header('Location:'.base_url()."index.php/Frontal/Inversionistas");
    }
    /**
     * para actualizar un Inversionista
     */
    public function updateInversionista()
    {
        $idInver = $this->input->post("idInversionista");
        $nombreInver = $this->input->post("nameInversionista");
        $imagenInver = $this->input->post("imageInversionista");
        $descripcionInver = $this->input->post("descriptionInversionista");
        $correoInver = $this->input->post("emailInversionista");
        $newInver = new clsInversionista();
        $newInver->setId($idInver);
        $newInver->setNombre($nombreInver);
        $newInver->setImagen($imagenInver);
        $newInver->setDescripcion($descripcionInver);
        $newInver->setTelefono($correoInver);
        $this->ModeloInversionista->actualizarInversionista($newInver);
        header('Location:'.base_url()."index.php/Frontal/Inversionistas");
    }


}