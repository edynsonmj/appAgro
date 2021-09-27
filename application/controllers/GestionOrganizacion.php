<?php
require_once '/xampp/htdocs/appAgro/application/negocio/clsOrganizacion.php';
class GestionOrganizacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloOrganizacion');
    }
    /**
     * para obtener una Organizacion
     */
    public function getOrganizacion($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //crear objeto clsOrganizacion
        $auxOrganizacion = new clsOrganizacion();
        //llamado al modelo
        $auxOrganizacion = $this->ModeloOrganizacion->obtenerOrganizacion($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para obtener todas las Organizaciones
     */
    public function allOrganizaciones(){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //recupera las Organizacions en un rray para ello, ejemplo
        $Organizaciones = array();
        //llamado al modelo
        $Organizaciones = $this->ModeloOrganizacion->listarOrganizaciones();
    }
    /**
     * para eliminar una Organizacion
     */
    public function deleteOrganizacion(){
        $idOrg = $this->input->post("idOrg");
        $this->ModeloOrganizacion->eliminarOrganizacion($idOrg);
        header('Location:'.base_url()."index.php/Frontal/Organizacion");
    }
    /**
     * para agregar una Organizacion
     */
    public function addOrganizacion(){
        $nombreOrg = $this->input->post("nameOrg");
        $imagenOrg = $this->input->post("pathImageOrg");
        $ubicacionOrg = $this->input->post("ubicationOrg");
        $telefonoOrg = $this->input->post("phoneOrg");
        $newOrg = new clsOrganizacion();
        $newOrg->setNombre($nombreOrg);
        $newOrg->setImagen($imagenOrg);
        $newOrg->setUbicacion($ubicacionOrg);
        $newOrg->setTelefono($telefonoOrg);
        $this->ModeloOrganizacion->agregarOrganizacion($newOrg);
        header('Location:'.base_url()."index.php/Frontal/Organizacion");
    }
    /**
     * para actualizar una Organizacion
     */
    public function updateOrganizacion(){
        $idOrg = $this->input->post("idOrganizacion");
        $nombreOrg = $this->input->post("nameProd");
        $imagenOrg = $this->input->post("pathImage");
        $ubicacionOrg = $this->input->post("ubication");
        $telefonoOrg = $this->input->post("phone");
        $newOrg = new clsOrganizacion();
        $newOrg->setId($idOrg);
        $newOrg->setNombre($nombreOrg);
        $newOrg->setImagen($imagenOrg);
        $newOrg->setUbicacion($ubicacionOrg);
        $newOrg->setTelefono($telefonoOrg);
        $this->ModeloOrganizacion->actualizarOrganizacion($newOrg);
        header('Location:'.base_url()."index.php/Frontal/Organizacion");
    }
}
?>