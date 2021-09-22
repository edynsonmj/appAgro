<?php
require_once '/xampp/htdocs/appAgro/application/negocio/clsUsuario.php';
class GestionUsuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloUsuario');
    }

    public function agregarUsuario(clsUsuario $prmUsuario){
        //tu codigo posiblemente aqui
        $this->ModelUsuario->agregarUsuario($prmUsuario);
        //tu codigo posiblemente aqui
    }
    /**
     * @var string $username: cadena que define el nombre de usuario, de un usuario a eliminar
     */
    public function eliminarUsuario($prmUsername){
        //tu codigo posiblemente aqui
        $this->ModeloUsuario->eliminarUsuario($prmUsername);
        //tu codigo posiblemente aqui
    }

    public function actualizarUsuario(clsUsuario $prmUsuario){
        //tu codigo posiblemente aqui
        $this->ModeloUsuario->actualizarUsuario($prmUsuario);
        //tu codigo posiblemente aqui
    }

    public function listarUsuarios(){
        //tu codigo posiblemente aqui
        $this->ModeloUsuario->listarUsuarios();
        //tu codigo posiblemente aqui
    }

    public function obtenerUsuario($prmUsername){
        //tu codigo posiblemente aqui
        //este recibe una cadena, username
        $this->ModeloUsuario->obtenerUsuario($prmUsername);
        //tu codigo posiblemente aqui
    }
    public function obtenerUsuarioPorId($prmId){
        //tu codigo posiblemente aqui
        //recibe un entero Id del usuario
        $this->ModeloUsuario->obtenerUsuarioPorId($prmId);
        //tu codigo posiblemente aqui
    }
}
?>