<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsUsuario.php";
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * BANDERAS DE RETORNO
 * exito: 1;
 * fracaso: 2;
 * error: -1;
 */
class GestionSesion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * antes de llamar a fijar sesion, realizar autenticacion
     * @param clsUsuario $prmUsuario: representa un usuario ecapsulado, debe contener obligatoriamente, username, nombre, role.
     * @return boolean: true en caso de exito, false en caso de no encontrarse datos en el registro $prmUsuario
     */
    public function fijarSesion(clsUsuario $prmUsuario){
        if(($prmUsuario->getUsername()==null) ||
            ($prmUsuario->getNombre()==null) ||
            ($prmUsuario->getRole()==null)){
            return false;
        }
        try{
            $usu = array(   'username' => $prmUsuario->getUsername(),
                            'nombre:' => $prmUsuario->getNombre(),
                            'role' => $prmUsuario->getRole());
            $this->session->set_userdata($usu);
            return true;
        }catch(Exception $e){
            echo "errora al fijar".$e->getMessage();
            return false;
        }
    }
    public function retirarSesion(){
        try{
            $items = array('username','nombre','role');
            $this->session->unset_userdata($items);
        }catch(Exception $e){
            echo "errora al retirar".$e->getMessage();
        }
        //unset($_SESSION['smert']);
    }
    /**
     * verifica si existe una sesion instanciada, no ace el proceso de autenticacion
     */
    public function existeSesion(){
        return isset($_SESSION['username']);
    }
    /**
     * auxiliar, borrar luego
     */
    public function mostrarSesion(){
        try{
            var_dump($_SESSION);
        }catch(Exception $e){
            echo "error al mostar sesion ".$e->getMessage();
        }
    }
}
?>