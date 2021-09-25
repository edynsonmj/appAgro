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
    public function AllItemsCarrito($prmUsuarioId){
        //posiblemente tu codigo aqui
        //el metodo retorna un array de parejas del tipo [idCarrito,producto]
        //donde idCarrito es un valor entero que representa al item en el carrito
        //producto es un objeto de la clase clsProducto que encapsula la informacion del producto.
        $this->ModeloCarrito->listarCarrito($prmUsuarioId);
        //posiblemente tu codigo aqui
    }
    /**
     * para agregar un producto al carrito
     */
    public function addItemCarrito($prmUsuarioId, $prmProductoId){
        //psodiblemtne tu codigo aqui
        $this->ModeloCarrito->agregarProductoCarrito($prmUsuarioId,$prmProductoId);
        //posiblemente tu codigo aqui
    }
    /**
     * para retirar un producto del carrito
     */
    public function deleteItemCarrito($prmCarId){
        //posiblemnete codigo quei
        //$prmCarId representa el identificador del item dentro del carrito, NO es el identificador del producto.
        $this->ModeloCarrito->retirarProductoCarrito($prmCarId);
        //posiblemnete codigo quei
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