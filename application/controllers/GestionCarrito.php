<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsProducto.php";
class GestionCarrito extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloCarrito');
    }
    /**
     * para obtener todos los producto de un carrito
     */
    public function AllItemsCarrito(){
        $sesion = new GestionSesion();
        $data['existeSesion']=$sesion->existeSesion();
        $data['carrito']=$this->ModeloCarrito->listarCarrito();
        if($data['existeSesion']){
            $datosGuardados = $sesion->datosSesion();
            $data['nombre'] = $datosGuardados['nombre'];
            $data['usuario'] = $datosGuardados['username'];
            $data['role'] = $datosGuardados['role'];
            if ($data['role'] == 'admin') {
                $this->load->view("estructura/vista_carrito",$data);
            }else {
                $this->load->view("estructura/vista_carrito",$data);
            }
        }else{
            $this->load->view("estructura/vista_carrito",$data);
        }   
    }
    /**
     * para agregar un producto al carrito
     */
    public function addItemCarrito($prmUsuarioId, $prmProductoId){

    }
    /**
     * para retirar un producto del carrito
     */
    public function deleteItemCarrito($prmCarId){
        $carId = $this->input->post("carId");
        $this->ModeloCarrito->retirarProductoCarrito(carId);
        header('Location:'.base_url()."index.php/Frontal/carrito");
    }
    /**
     * para obtener el precio total de los producto en el carrito de u usuario
     */
    public function total($prmUserId){
        //tu codigo posiblemtne aqui
        $this->ModeloCarrito->total($prmUserId);
        //tu codigo posiblemtne aqui
    }
}