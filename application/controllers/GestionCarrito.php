<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsProducto.php";
require_once "/xampp/htdocs/appAgro/application/controllers/GestionSesion.php";
class GestionCarrito extends CI_Controller
{
    private $username;
    private $sesion;
    private $datosGuardados;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloCarrito');
        $this->load->model('ModeloProducto');
        $this->load->model('ModeloUsuario');
        $this->sesion = new GestionSesion();
        $this->datosGuardados = $this->sesion->datosSesion();
        $this->username = $this->datosGuardados[0];
    }
    /**
     * para obtener todos los producto de un carrito
     */
    public function AllItemsCarrito()
    {
            $usuario = $this->ModeloUsuario->obtenerUsuario($this->username);       
            $data['existeSesion'] = $this->sesion->existeSesion();
            $data['compras'] = $this->ModeloCarrito->listarCarrito($usuario->getId());
            $this->load->view("estructura/barraOpciones", $data);
            $this->load->view("estructura/vista_carrito", $data);
    }
    public function addItemCarrito()
    {   
        $carId = $this->input->post("idCarrito");
        echo "llego que ".$carId;
        $user = $this->ModeloUsuario->obtenerUsuario($this->username);
        var_dump($user);
        $carVista = $this->input->post("vista");
        echo "".$this->ModeloCarrito->agregarProductoCarrito($user->getId(), $carId);
        if ($carVista == "index") {
            header('Location:'.base_url()."index.php");
        }
        else {
            header('Location:'.base_url()."index.php/GestionOferta/allOfertas");
        }    
    }

    public function deleteItemCarrito($prmCarId)
    {
        $carId = $this->input->post("carId");
        $this->ModeloCarrito->retirarProductoCarrito(carId);
        header('Location:'.base_url()."index.php/Frontal/carrito");
    }
    /**
     * para obtener el precio total de los producto en el carrito de u usuario
     */
    public function total($prmUserId)
    {
        //tu codigo posiblemtne aqui
        $this->ModeloCarrito->total($prmUserId);
    //tu codigo posiblemtne aqui
    }
}