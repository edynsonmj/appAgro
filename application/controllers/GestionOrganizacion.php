<?php
require_once '/xampp/htdocs/appAgro/application/negocio/clsOrganizacion.php';
require_once "/xampp/htdocs/appAgro/application/controllers/GestionSesion.php";
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
            $sesion = new GestionSesion();
            $data['existeSesion']=$sesion->existeSesion();
            $data['organizaciones']=$this->ModeloOrganizacion->listarOrganizaciones();
            if($data['organizaciones']==null){
                $data['organizaciones']= array();
            }
            if($data['existeSesion']){
                $datosGuardados = $sesion->datosSesion();
                $data['nombre'] = $datosGuardados[1];
                $data['usuario'] = $datosGuardados[0];
                $data['role'] = $datosGuardados[2];
                if ($data['role'] == 'admin') {
                    $this->load->view("estructura/Vista_editar_organizacion",$data);
                }else {
                    $this->load->view("estructura/Vista_organizaciones",$data);
                }
            }else{
                $this->load->view("estructura/Vista_organizaciones",$data);
            }   
        }
    public function deleteOrganizacion(){
        $idOrg = $this->input->post("idOrg");
        $this->ModeloOrganizacion->eliminarOrganizacion($idOrg);
        $this->allOrganizaciones();
    }
    /**
     * para agregar una Organizacion
     */
    public function addOrganizacion(){
        $nombreOrg = $this->input->post("nameOrg");
        $ruta = "imagen2";
        $ubicacionOrg = $this->input->post("ubicationOrg");
        $telefonoOrg = $this->input->post("phoneOrg");
        $imagen = $this->validarImag($ruta);
        $newOrg = new clsOrganizacion();
        $newOrg->setNombre($nombreOrg);
        $newOrg->setImagen($imagen);
        $newOrg->setUbicacion($ubicacionOrg);
        $newOrg->setTelefono($telefonoOrg);
        $this->ModeloOrganizacion->agregarOrganizacion($newOrg);
        $this->allOrganizaciones();
        
    }
    /**
     * para actualizar una Organizacion
     */
    public function updateOrganizacion(){
        $idOrg = $this->input->post("idOrganizacion");
        $nombreOrg = $this->input->post("nameProd");
        $ubicacionOrg = $this->input->post("ubication");
        $telefonoOrg = $this->input->post("phone");
        $ruta = "nameProd";
        $imagen = $this->validarImag($ruta);
        $newOrg = new clsOrganizacion();
        $newOrg->setId($idOrg);
        $newOrg->setNombre($nombreOrg);
        $newOrg->setImagen($imagen);
        $newOrg->setUbicacion($ubicacionOrg);
        $newOrg->setTelefono($telefonoOrg);
        $this->ModeloOrganizacion->actualizarOrganizacion($newOrg);
        $this->allOrganizaciones();
    }
    public function validarImag($imagen)
    {
        $tamanio = $_FILES[$imagen]['size'];
        $imagenSubida = fopen($_FILES[$imagen]['tmp_name'],'r');
        $binariosImagen = fread($imagenSubida,$tamanio);
        return $binariosImagen;
    }
}
?>