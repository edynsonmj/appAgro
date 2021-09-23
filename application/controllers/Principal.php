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
        if($this->sesion->existeSesion()){
            echo "hay sesion";
            //validar roll
            //rol admin?
                //vista admin
            //rol usuario
                //vista usuario con datos de sesion.
        }else if(/*verificar datos de la vista*/true){
            //ventana usuario generico.
            echo "no hay sesion";
        }
    }
}
?>