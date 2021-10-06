<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsProducto.php";
require_once "/xampp/htdocs/appAgro/application/controllers/GestionSesion.php";
class GestionCarrito extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloCarrito');
        $this->load->model('ModeloProducto');
        $this->load->model('ModeloUsuario');
    }
    /**
     * para obtener todos los producto de un carrito
     */
    public function AllItemsCarrito()
    {
        $sesion = new GestionSesion();
        $datosGuardados = $sesion->datosSesion();
        $username = $datosGuardados[0];
        $usuario = $this->ModeloUsuario->obtenerUsuario($username);
        $data['existeSesion'] = $sesion->existeSesion();
        $data['compras'] = $this->ModeloCarrito->listarCarrito($usuario->getId());
        $datosGuardados = $sesion->datosSesion();
        $data['nombre'] = $datosGuardados[1];
        $data['usuario'] = $datosGuardados[0];
        $data['role'] = $datosGuardados[2];
        $data['total'] = $this->total($data['usuario']);
        if ($data['compras'] == null) {
            $data['compras'] = array();
        }
        $this->load->view("estructura/barraOpciones", $data);
        $this->load->view("estructura/vista_carrito", $data);
    }
    public function addItemCarrito()
    {
        $carId = $this->input->post("idCarrito");
        $sesion = new GestionSesion();
        if ($sesion->existeSesion() == false) {
            header('Location: ' . base_url() . 'index.php/Frontal/cargarLogin');
        } else {
            $datosGuardados = $sesion->datosSesion();
            $username = $datosGuardados[0];
            $user = $this->ModeloUsuario->obtenerUsuario($username);
            $carVista = $this->input->post("vista");
            $retorno = $this->ModeloCarrito->agregarProductoCarrito($user->getId(), $carId);
            echo "retorno: " . $retorno;
            if ($retorno != 1) {
                echo "no sirve esta maricasd";
            } else {
                if ($carVista == "index") {
                    header('Location:' . base_url() . "index.php");
                } else {
                    header('Location:' . base_url() . "index.php/GestionOferta/allOfertas");
                }
            }
        }
    }
    public function deleteItemCarrito()
    {
        $carId = $this->input->post("id");
        $this->ModeloCarrito->retirarProductoCarrito($carId);
        $this->AllItemsCarrito();
    }
    /**
     * para obtener el precio total de los producto en el carrito de u usuario
     */
    public function total($prmUsername)
    {
        //tu codigo posiblemtne aqui
        $auxUsuario = new clsUsuario();
        $auxUsuario = $this->ModeloUsuario->obtenerUsuario($prmUsername);
        $total = $this->ModeloCarrito->total($auxUsuario->getId());
        //tu codigo posiblemtne aqui
        return $total;
    }

    public function deleteCarrito(){
        $prmUsername = $this->input->post('usuario');
        $user = $this->ModeloUsuario->obtenerUsuario($prmUsername);
        $this->ModeloCarrito->borrarTodo($user->getId());
        $this->AllItemsCarrito();
    }
}
