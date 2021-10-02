<?php
require_once '/xampp/htdocs/appAgro/application/controllers/GestionSesion.php';
class Frontal extends CI_Controller
{
    private $sesion;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModeloProducto");
        $this->load->model("ModeloOrganizacion");
        $this->load->model("ModeloOferta");
        $this->load->model("ModeloEvento");
        $this->load->model("ModeloInversionista");
        $this->load->model("ModeloCarrito");
        $this->sesion = new GestionSesion();
    }
    public function index()
    {
        $data['existeSesion'] = $this->sesion->existeSesion();
        $data['productos'] = $this->ModeloProducto->listarProductos();
        if($data['productos']==null){
            $data['productos']=array();
        }
        if ($data['existeSesion']) {
            $datosGuardados = $this->sesion->datosSesion();
            $data['nombre'] = $datosGuardados[1];
            $data['usuario'] = $datosGuardados[0];
            $data['role'] = $datosGuardados[2];
            if ($data['role'] == 'admin') {
                $this->load->view("estructura/barraOpciones", $data);
                $this->load->view("estructura/vista_editar_principal", $data);
            } else {
                $this->load->view("principal", $data);
            }
        } else {
            $this->load->view("principal", $data);
        }
    }
    public function cargarLogin()
    {
        $data['existeSesion'] = $this->sesion->existeSesion();
        $this->load->view("estructura/barraOpciones", $data);
        $this->load->view("otras/login");
    }
    public function cerrarsesion()
    {
        $this->sesion->retirarSesion();
        $this->index();
    }
    public function datosSesion()
    {
        $datosGuardados = $this->sesion->datosSesion();
        $data['nombre'] = $datosGuardados[1];
        $data['usuario'] = $datosGuardados[0];
        $data['role'] = $datosGuardados[2];
    }
}
