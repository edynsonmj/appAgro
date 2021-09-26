<?php
require_once '/xampp/htdocs/appAgro/application/controllers/GestionSesion.php';
require_once '/xampp/htdocs/appAgro/application/negocio/clsUsuario.php';
require_once '/xampp/htdocs/appAgro/application/controllers/GestionSesion.php';
require_once '/xampp/htdocs/appAgro/application/controllers/Frontal.php';
class GestionUsuario extends CI_Controller
{
    private $sesionAux;
    private $controladorFrontal;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloUsuario');        
        $this->sesionAux = new GestionSesion();        
        //$this->controladorFrontal = new Frontal();
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
    public function autenticacion()
    {
        $nombreUsuario = $this->input->post("userName");
        $contraseñaUsuario = $this->input->post("contraseña");
        $usuario = new clsUsuario();
        $usuario = $this->ModeloUsuario->obtenerUsuario($nombreUsuario);
        var_dump($usuario);
        if ($usuario == null) {
            echo "es nulo";
        }
        else {
            if ($contraseñaUsuario == $usuario->getPassword()) {
                $this->sesionAux->fijarSesion($usuario);
                header('Location:'.base_url()."index.php");
            }else{
                echo "la contraseña es erronea";
            }
        }
    }
    public function crearUsuario(){
        $nuevoNombre = $this->input->post("nombre");
        $userName = $this->input->post("userName");
        $nuevaContraseña = $this->input->post("password");
        $nuevoRol = $this->input->post("rol");
        $newUser = new clsUsuario();
        $newUser->setNombre($nuevoNombre);
        $newUser->setUsername($userName);
        $newUser->setPassword($nuevaContraseña);
        $newUser->setRole($nuevoRol); 
        $newUsuario = $this->ModeloUsuario->obtenerUsuario($nuevoNombre);  
        if($newUsuario == null){
            $this->ModeloUsuario->crearUsuario($newUser);
        }else{
            echo "el usuario ya existe";
        }

    }
}
?>
