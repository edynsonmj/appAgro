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
    public function getInversionista($prmId){
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
    public function allInversionistas(){
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
    public function deleteInversionista($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloInversionista->eliminarInversionista($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para agregar un Inversionista
     */
    public function addInversionista(clsInversionista $prmInversionista){
            //posiblemente tu codigo aqui
            $nombreInver = $this->input->post("nombre");
            $imagenInver = $this->input->post("imagen");
            $descripcionInver = $this->input->post("descripcion");
            $correoInver = $this->input->post("correo");
            $newInver = new clsInversionista();
            $newInver->setNombre($nombreInver);
            $newInver->setImagen($imagenInver);
            $newInver->setDescripcion($descripcionInver);
            $newInver->setTelefono($correoInver);
            $this->ModeloInversionista->obtenerInversionista($getId); 
            if($getId == null){
                $this->ModeloInversionista->obtenerInversionista($newInver);
            }else{
                echo "el usuario ya existe";
            }
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloInversionista->agregarInversionista($prmInversionista);
        //posiblemente tu codigo aqui
    }
    /**
     * para actualizar un Inversionista
     */
    public function updateInversionista(clsInversionista $prmInversionista){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloInversionista->actualizarInversionista($prmInversionista);
        //posiblemente tu codigo aqui
    }
    
}