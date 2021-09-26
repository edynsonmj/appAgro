<?php
require_once '/xampp/htdocs/appAgro/application/controllers/GestionSesion.php';
class Principal extends CI_Controller
{
    private $sesion;
    public function __construct()
    {
        parent::__construct();
        $this->sesion = new GestionSesion();
    }
    public function index(){
        $productos = array();
        if($this->sesion->existeSesion()){
            echo "hay sesion";
            //validar roll
            //rol admin?
            //vista admin
            //rol usuario
            //vista usuario con datos de sesion.
            
            $this->load->view("vistasCrud/vista_editar_principal.php", compact('productos'));
        }
        else {
            //ventana usuario generico.
            echo "no hay sesion";
            $this->load->view("vistasCrud/vista_principal.php", compact('productos'));
        }
    }
    public function cargarLogin()
    {
        $this->load->view("vistasCrud/vista_inicio_sesion.php");
    }    
}
?>