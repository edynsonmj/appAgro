<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsInversionista.php";
require_once "/xampp/htdocs/appAgro/application/controllers/GestionSesion.php";
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
    public function allInversionistas(){
        $sesion = new GestionSesion();        
        $data['existeSesion']=$sesion->existeSesion();
        $data['inversionistas']=$this->ModeloInversionista->listarInversionistas();
        if($data['inversionistas']==null){
            $data['inversionistas']=array();
        }
        if($data['existeSesion']){
            $datosGuardados = $sesion->datosSesion();
            $data['nombre'] = $datosGuardados[1];
            $data['usuario'] = $datosGuardados[0];
            $data['role'] = $datosGuardados[2];
            if ($data['role'] == 'admin') {
                $this->load->view("estructura/Vista_editar_inversionistas",$data);
            }else {
                $this->load->view("estructura/Vista_inversionistas",$data);
            }
        }else{
            $this->load->view("estructura/Vista_inversionistas",$data);
        }   
    }
    public function deleteInversionista()
    {
        $idInver = $this->input->post("idInversionista");
        $this->ModeloInversionista->eliminarInversionista($idInver);
        $this->allInversionistas();
    }
    /**
     * para agregar un Inversionista
     */
    public function addInversionista()
    {
        $nombreInver = $this->input->post("nameInversionista");
        $descripcionInver = $this->input->post("descripcionInversionista");
        $correoInver = $this->input->post("emailInversionista");
        $ruta = "imagen3";
        $imagen = $this->validarImag($ruta);
        $newInver = new clsInversionista();
        $newInver->setNombre($nombreInver);
        $newInver->setImagen($imagen);
        $newInver->setDescripcion($descripcionInver);
        $newInver->setTelefono($correoInver);
        $this->ModeloInversionista->agregarInversionista($newInver);
        $this->allInversionistas();
    }
    /**
     * para actualizar un Inversionista
     */
    public function updateInversionista()
    {
        $idInver = $this->input->post("idInversionista");
        $nombreInver = $this->input->post("nameInversionista");
        $descripcionInver = $this->input->post("descriptionInversionista");
        $correoInver = $this->input->post("emailInversionista");
        $ruta = "imagen4";
        $imagen = $this->validarImag($ruta);
        $newInver = new clsInversionista();
        $newInver->setId($idInver);
        $newInver->setNombre($nombreInver);
        $newInver->setImagen($imagen);
        $newInver->setDescripcion($descripcionInver);
        $newInver->setTelefono($correoInver);
        $this->ModeloInversionista->actualizarInversionista($newInver);
        $this->allInversionistas();
    }
    public function validarImag($imagen)
    {
        $binariosImagen = "";
        $tamanio = $_FILES[$imagen]['size'];
        if($tamanio > 0){
            $imagenSubida = fopen($_FILES[$imagen]['tmp_name'],'r');
            $binariosImagen = fread($imagenSubida,$tamanio);
        }
        return $binariosImagen;
    }


}