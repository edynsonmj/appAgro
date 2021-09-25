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
        //posiblemente tu codigo aqui
    }
    /**
     * para eliminar una Organizacion
     */
    public function deleteOrganizacion($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloOrganizacion->eliminarOrganizacion($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para agregar una Organizacion
     */
    public function addOrganizacion(clsOrganizacion $prmOrganizacion){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloOrganizacion->agregarOrganizacion($prmOrganizacion);
        //posiblemente tu codigo aqui
    }
    /**
     * para actualizar una Organizacion
     */
    public function updateOrganizacion(clsOrganizacion $prmOrganizacion){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloOrganizacion->actualizarOrganizacion($prmOrganizacion);
        //posiblemente tu codigo aqui
    }
}
?>