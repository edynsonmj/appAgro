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
        if ($this->sesion->existeSesion()) {
            echo "Si existe la sesion";
            //validar roll
            //rol admin?
            //vista admin
            //rol usuario
            //vista usuario con datos de sesion.
            $this->load->view("vistasCrud/vista_principal.php");
        }
        else {
            echo"No existe sesion";
            //ventana usuario generico.
            $this->load->view("vistasCrud/vista_principal.php");
        }
    }
    public function cargarLogin()
    {
        $this->load->view("vistasCrud/vista_inicio_sesion.php");
    }
    
    
}
?>