<?php
require_once '/xampp/htdocs/appAgro/application/controllers/GestionSesion.php';
class Frontal extends CI_Controller
{
    private $sesion;
    public function __construct()
    {
        parent::__construct();        
        $this->load->model("ModeloProducto");
        $this->sesion = new GestionSesion();
    }
    public function index(){
        echo "paso";
        $data['existeSesion']=$this->sesion->existeSesion();
        $data['productos']=$this->ModeloProducto->listarProductos();
        if($data['existeSesion']){
            $datosGuardados = $this->sesion->datosSesion();
            $data['nombre'] = $datosGuardados['nombre'];
            $data['usuario'] = $datosGuardados['username'];
            $data['role'] = $datosGuardados['role'];
            if($data['role']=='admin'){
                
            }
            $this->load->view("principal",$data);
        }
        else {
            echo"No existe sesion";
            //ventana usuario generico.
            echo "no hay sesion";
            $this->load->view("principal",$data);
        }
    }
    public function cargarLogin()
    {
        $data['existeSesion']=$this->sesion->existeSesion();
        $this->load->view("estructura/barraOpciones",$data);
        $this->load->view("otras/login");
    }
    public function cerrarsesion(){
        $this->sesion->retirarSesion();
        $this->index();
    }
}
?>