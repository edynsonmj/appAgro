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
        //tu codigo posiblemente aqui
        $idPro = $this->input->post("id");
        $nombreProducto = $this->input->post("nombrePro");
        $cantidaProducto = $this->input->post("cantidadPro");
        $precioProducto = $this->input->post("precioPro");
        $newproducto = new clsProducto();
        $newproducto->setNombre($nombreProducto);
        $newproducto->setCantidad($cantidaProducto);
        $newproducto->setPrecio($precioProducto);
        //$producto = $this->ModeloProducto->obtenerProducto($idPro);
        //if($producto == null){
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
        return $resultado;
    //tu codigo posiblemente aqui
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
        $imagen = $this->input->post("imagen");
        $this->validarImag($imagen);
        echo $nombre . "-" . $precio . "-" . $cantidad . "-" . $imagen;
        $prmProducto = new clsProducto();
        $prmProducto->setId($id);
        $prmProducto->setNombre($nombre);
        $prmProducto->setPrecio($precio);
        $prmProducto->setCantidad($cantidad);
        $prmProducto->setImagen($imagen);
        $this->ModeloProducto->actualizarProducto($prmProducto);
        header('Location:'.base_url()."index.php"); //muesra ventana principal, pero es tu decicion que mostar a continuacion
    }
    public function validarImag($imagen){
    $archivo = $_FILES[$imagen]['name'];
            if (isset($archivo) && $archivo != "") {
               $tipo = $_FILES[$imagen]['type'];
               $tamano = $_FILES[$imagen]['size'];
               $temp = $_FILES[$imagen]['tmp_name'];
                 if (move_uploaded_file($temp, 'images/'.$archivo)) {
                    echo '<p><img src="images/'.$archivo.'"></p>';
                 }
                 else {
                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                 }
              // }
           // }
         }
         
         
    }
}
?>