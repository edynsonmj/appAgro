<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsEvento.php";
class GestionEvento extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloEvento');
    }
    /**
     * para obtener un Evento
     */
    public function getEvento($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //crear objeto clsEvento
        $auxEvento = new clsEvento();
        //llamado al modelo
        $auxEvento = $this->ModeloEvento->obtenerEvento($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para obtener todos los Eventos
     */
    public function allEventos(){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //recupera los Eventos en un rray para ello, ejemplo
        $Eventos = array();
        //llamado al modelo
        $Eventos = $this->ModeloEvento->listarEventos();
        //posiblemente tu codigo aqui
    }
    /**
     * para eliminar un Evento
     */
    public function deleteEvento($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloEvento->eliminarEvento($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para agregar un Evento
     */
    public function addEvento(clsEvento $prmEvento){
        //posiblemente tu codigo aqui
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
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloEvento->agregarEvento($prmEvento);
        //posiblemente tu codigo aqui
    }
    /**
     * para actualizar un Evento
     */
    public function updateEvento(clsEvento $prmEvento){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloEvento->actualizarEvento($prmEvento);
        //posiblemente tu codigo aqui
    }
}