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
    public function Organizacion(){
        $data['existeSesion']=$this->sesion->existeSesion();
        $data['organizaciones']=$this->ModeloOrganizacion->listarOrganizaciones();
        if($data['existeSesion']){
            $datosGuardados = $this->sesion->datosSesion();
            $data['nombre'] = $datosGuardados['nombre'];
            $data['usuario'] = $datosGuardados['username'];
            $data['role'] = $datosGuardados['role'];
            if ($data['role'] == 'admin') {
                $this->load->view("estructura/Vista_editar_organizacion",$data);
            }else {
                $this->load->view("estructura/Vista_organizaciones",$data);
            }
        }else{
            $this->load->view("estructura/Vista_organizaciones",$data);
        }   
    }
    public function Ofertas(){
        $data['existeSesion']=$this->sesion->existeSesion();
        $data['ofertas']=$this->ModeloOferta->listarOfertas();
        if($data['existeSesion']){
            $datosGuardados = $this->sesion->datosSesion();
            $data['nombre'] = $datosGuardados['nombre'];
            $data['usuario'] = $datosGuardados['username'];
            $data['role'] = $datosGuardados['role'];
            if ($data['role'] == 'admin') {
                $this->load->view("estructura/Vista_editar_ofertas",$data);
            }else {
                $this->load->view("estructura/Vista_oferta",$data);
            }
        }else{
            $this->load->view("estructura/Vista_oferta",$data);
        }   
    }
    public function Inversionistas(){
        $data['existeSesion']=$this->sesion->existeSesion();
        $data['inversionistas']=$this->ModeloInversionista->listarInversionistas();
        if($data['existeSesion']){
            $datosGuardados = $this->sesion->datosSesion();
            $data['nombre'] = $datosGuardados['nombre'];
            $data['usuario'] = $datosGuardados['username'];
            $data['role'] = $datosGuardados['role'];
            if ($data['role'] == 'admin') {
                $this->load->view("estructura/Vista_editar_inversionistas",$data);
            }else {
                $this->load->view("estructura/Vista_inversionistas",$data);
            }
        }else{
            $this->load->view("estructura/Vista_inversionistas",$data);
        }   
    }
    public function Eventos(){
        $data['existeSesion']=$this->sesion->existeSesion();
        $data['eventos']=$this->ModeloEvento->listarEventos();
        if($data['existeSesion']){
            $datosGuardados = $this->sesion->datosSesion();
            $data['nombre'] = $datosGuardados['nombre'];
            $data['usuario'] = $datosGuardados['username'];
            $data['role'] = $datosGuardados['role'];
            if ($data['role'] == 'admin') {
                $this->load->view("estructura/Vista_editar_eventos",$data);
            }else {
                $this->load->view("estructura/Vista_eventos",$data);
            }
        }else{
            $this->load->view("estructura/Vista_eventos",$data);
        }   
    }
    
}
?>