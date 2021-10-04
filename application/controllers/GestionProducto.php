<?php
require_once '/xampp/htdocs/appAgro/application/negocio/clsProducto.php';
class GestionProducto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloProducto');
    }

    public function agregarProducto()
    {
        $idPro = $this->input->post("id");
        $nombreProducto = $this->input->post("nombrePro");
        $cantidaProducto = $this->input->post("cantidadPro");
        $precioProducto = $this->input->post("precioPro");
        $ruta = "imagen1";      
        $imagen = $this->validarImag($ruta);
        $newproducto = new clsProducto();
        $newproducto->setNombre($nombreProducto);
        $newproducto->setCantidad($cantidaProducto);
        $newproducto->setPrecio($precioProducto);
        $newproducto->setImagen($imagen);

        $this->ModeloProducto->agregarProducto($newproducto);
        //}else{
        //    echo"el usuario ya existe";
        //}
        header('Location:' . base_url() . "index.php");
    }

    public function eliminarProducto()
    {
        $idPro = $this->input->post("idPro");
        $this->ModeloProducto->eliminarProducto($idPro);
        header('Location:' . base_url() . "index.php");
    }

    public function listarProductos()
    {
        $resultado = $this->ModeloProducto->listarProductos();
        if ($resultado == null) {
            $resultado = array();
        }
        return $resultado;
    }

    public function obtenerProducto($prmId)
    {
        //tu codigo posiblemente aqui
        $producto = new clsProducto();
        //obtener producto retorna un objeto de tipo producto, hacer validaciones
        $producto = $this->ModeloProducto->obtenerProducto($prmId);
    //tu codigo posiblemente aqui
    }

    public function actualizarProducto()
    {
        $id = $this->input->post("idProducto");
        $nombre = $this->input->post("nameProducto");
        $precio = $this->input->post("priceProducto");
        $cantidad = $this->input->post("amountProducto");
        $ruta = "imagen";
        $imagen = $this->validarImag($ruta);
        if ($imagen == null) {
            $imagen = "";
        }
        $prmProducto = new clsProducto();
        $prmProducto->setId($id);
        $prmProducto->setNombre($nombre);
        $prmProducto->setPrecio($precio);
        $prmProducto->setCantidad($cantidad);
        $prmProducto->setImagen($imagen);
        $this->ModeloProducto->actualizarProducto($prmProducto);
        header('Location:' . base_url() . "index.php"); //muesra ventana principal, pero es tu decicion que mostar a continuacion
    }

    public function validarImag($imagen)
    {
        $tamanio = $_FILES[$imagen]['size'];
        $imagenSubida = fopen($_FILES[$imagen]['tmp_name'],'r');
        $binariosImagen = fread($imagenSubida,$tamanio);
        return $binariosImagen;
    }


}

?>