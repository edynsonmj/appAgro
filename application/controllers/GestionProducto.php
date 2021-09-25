<?php
require_once '/xampp/htdocs/appAgro/application/negocio/clsProducto.php';
class GestionProducto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloProducto');
    }

    public function agregarProducto(clsProducto $prmProducto){
        //tu codigo posiblemente aqui
            $idPro = $this->input->post("id");
            $nombreProducto =$this->input->post("nombrePro");
            $cantidaProducto = $this->input->post("cantidadPro");
            $precioProducto = $this->input->post("precioPro");
            $newproducto = new clsProducto();
            $newproducto->setNombre($nombreProducto);
            $newproducto->setCantidad($cantidaProducto);
            $newproducto->setPrecio($precioProducto);
            $newproducto = $this->ModeloProducto->obtenerProducto($newproducto);
            if($newproducto == null){
                $this->MoleloProducto->agregarProducto($newproducto);
            }else{
                echo"el usuario ya existe";
            }
        //$prmProducto es un producto con la informacion a agregar
        //hacer validaciones
        $this->ModeloProducto->agregarProducto($prmProducto);
        //tu codigo posiblemente aqui
    }

    public function eliminarProducto($prmId){
        //tu codigo posiblemente aqui
        //$prmId identificador del producto a eliminar, es un entero
        //hacer validaciones
        $this->ModeloProducto->eliminarProducto($prmId);
        //tu codigo posiblemente aqui
    }

    public function listarProductos(){
        //tu codigo posiblemente aqui
        //listar producto retorna un array de tipo clsProducto, con la informacion necesaria
        //hacer validaciones
        $resultado = $this->ModeloProducto->listarProductos();
        //tu codigo posiblemente aqui
    }

    public function obtenerProducto($prmId){
        //tu codigo posiblemente aqui
        $producto = new clsProducto();
        //obtener producto retorna un objeto de tipo producto, hacer validaciones
        $producto = $this->ModeloProducto->obtenerProducto($prmId);
        //tu codigo posiblemente aqui
    }

    public function actualizarProducto(clsProducto $prmProducto){
        //tu codigo posiblemente aqui
        //el parametro enviado es un producto con la informaicon a actualizar
        //hacer validaciones
        $this->ModeloProducto->actualizarProducto($prmProducto);
        //tu codigo posiblemente aqui
    }


    


    
}
?>