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
        $data['existeSesion']=$this->sesion->existeSesion();
        $data['productos']=$this->ModeloProducto->listarProductos();
        if($data['existeSesion']){
            $datosGuardados = $this->sesion->datosSesion();
            $data['nombre'] = $datosGuardados['nombre'];
            $data['usuario'] = $datosGuardados['username'];
            $data['role'] = $datosGuardados['role'];
            if($data['role']=='admin'){
                $this->load->view("estructura/barraOpciones",$data);
                $this->load->view("estructura/vista_editar_principal",$data);
            }else{
                $this->load->view("principal",$data);
            }
        }
        else {
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