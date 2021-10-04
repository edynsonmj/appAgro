<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once '/xampp/htdocs/appAgro/application/negocio/clsUsuario.php';
require_once '/xampp/htdocs/appAgro/application/negocio/clsProducto.php';
require_once '/xampp/htdocs/appAgro/application/negocio/clsEvento.php';
require_once '/xampp/htdocs/appAgro/application/negocio/clsOferta.php';
require_once '/xampp/htdocs/appAgro/application/negocio/clsInversionista.php';
require_once '/xampp/htdocs/appAgro/application/negocio/clsOrganizacion.php';
require_once '/xampp/htdocs/appAgro/application/negocio/clsError.php';
require_once '/xampp/htdocs/appAgro/application/controllers/GestionSesion.php';

/**
 * BANDERAS DE RETORNO
 * exito: 1;
 * fracaso: 2;
 * error: -1;
 */
class Prueba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModeloUsuario");
        $this->load->model("ModeloProducto");
        $this->load->model("ModeloEvento");
        $this->load->model("ModeloOferta");
        $this->load->model("ModeloInversionista");
        $this->load->model("ModeloOrganizacion");
        $this->load->model("ModeloCarrito");
    }
    //var_dump($array);
    //el controlador por defecto debe tener una funcion index, pues esta sera buscada por la app
    public function index()
    {
        //prueba de sesion
        //$this->pruebaSesion();
        //$this->pruebaImagenProducto();
        //$this->pruebasModelo();
        //$this->pruebasMapa();
        $this->load->view("welcome_message");
    }
    public function pruebasMapa(){
        $this->load->view("pruebaMaps/mapa");
    }
    public function pruebaImagenProducto(){
        $this->load->view("pruebaImagen");
    }
    public function insertImagenProducto(){
        $nombre = $this->input->post("nombre");
        $cantidad = $this->input->post("cantidad");
        $precio = $this->input->post("precio");
        $imagen = $this->input->post("imagen");
        echo $nombre."<br>";
        echo $cantidad."<br>";
        echo $precio."<br>";
        if($imagen!=null){
            echo "imagen cargada <br>";
        }else{
            echo "imagen nula <br>";
        }
        $producto = new clsProducto();
        $producto->setNombre($nombre);
        $producto->setCantidad($cantidad);
        $producto->setPrecio($precio);
        $producto->setImagen($imagen);
        echo "datos encapsulados <br>";
        if($this->ModeloProducto->agregarProducto($producto)==1){
            echo "exito <br>";
        }else{
            echo "fracaso <br>";
        }
    }
    public function pruebaSesion(){
        //parte 1: fijar una sesion
        $usuario = new clsUsuario();
        $usuario->setUsername("smert");
        $insatanciasesion = new GestionSesion();
        $insatanciasesion->fijarSesion($usuario);
        echo "fijado <br>";
        //mostrarSesiones
        $insatanciasesion->mostrarSesion();
        echo "mostrado <br>";
        if($insatanciasesion->existeSesion()){
            echo "hay sesion";
        }else{
            echo "no hay sesion";
        }
        //retirar sesion
        $insatanciasesion->retirarSesion();
        echo "retirado <br>";
        $insatanciasesion->mostrarSesion();
        echo "muestra <br>";
        if($insatanciasesion->existeSesion()){
            echo "hay sesion";
        }else{
            echo "no hay sesion";
        }
    }
    public function pruebasModelo(){
        //$this->pruebaVistaPrincipal();
        //PRUEBAS USUARIO
        //PRUEBA 1
        //$this->pruebaObtenerUsuario("loco");
        //PRUEBA 2
        //$this->pruebaListarUsuario();
        //PRUEBA 2
        //$this->pruebaEliminarUsuario("");
        //PRUEBA 3
        //$this->preubaAgregarUsuario();
        //PRUEBA 4
        //$this->pruebaActualizarUsuario();

        //PRUEBAS PRODUCTO
        //$this->pruebaObtenerProducto();
        //$this->pruebaListarProductos();
        //$this->pEliminarProducto();
        //$this->pAgregarProducto();
        //$this->pActualizarProducto();

        //PRUEBAS EVENTO
        //$this->pAgregarEvento();
        //$this->pActualizarEvento();
        //$this->pListarEventos();
        //$this->pObtenerEvento();
        //$this->pEliminarEvento();

        //PRUEBAS OFERTA
        //$this->pAgregarOferta();
        //$this->pActualizarOferta();
        //$this->pListarOferta();
        //$this->pObtenerOferta();
        //$this->pEliminarOferta();

        //PRUEBAS INVERSIONISTA
        //$this->pAgregarInversionista();
        //$this->pActualizarInversionista();
        //$this->pListarInversionista();
        //$this->pObtenerInversionista();
        //$this->pEliminarInversionista();

        //PRUEBAS ORGANIZACION
        //$this->pAgregarOrganizacion();
        //$this->pActualizarOrganizacion();
        //$this->pListarOrganizacion();
        //$this->pObtenerOrganizacion();
        //$this->pEliminarOrganizacion();

        //PRUEBAS CARRITO
        //$this->pListarCarrito();
        //$this->pTotal();
        //$this->pRetirarDelCarrito();
        $this->pAgregarCarrito();
    }

    //PRUEBAS USUARIO
    public function pruebaObtenerUsuario($prmUsername)
    {
        $usuario = new clsUsuario();
        $usuario = $this->ModeloUsuario->obtenerUsuario($prmUsername);
        if ($usuario == null) {
            echo "vaccio";
        } else {
            echo "usuario encontrado: ";
            echo "id:".$usuario->getId() . '-';
            echo "nombre:".$usuario->getNombre() . '-';
            echo $usuario->getUsername() . '-';
            echo $usuario->getPassword() . '-';
            echo $usuario->getRole() . '-';
        }
    }
    public function pruebaListarUsuario()
    {
        $usuarios = $this->ModeloUsuario->listarUsuarios();
        //var_dump($usuarios);
        for ($i = 0; $i < sizeof($usuarios); $i++) {
            echo $usuarios[$i]->getUsername();
            echo "-";
        }
    }
    public function pruebaEliminarUsuario($prmUsername)
    {
        //* @return int bandera 1= exito, 2=fracaso, -1=error
        $resultado = $this->ModeloUsuario->EliminarUsuario($prmUsername);
        if ($resultado == 1) {
            echo "eliminacion exitosa";
        } else {
            echo "no se hizo eliminacion";
        }
    }
    public function preubaAgregarUsuario()
    {
        $usuario = new clsUsuario();
        $usuario->setNombre("esteban");
        $usuario->setUsername("loc");
        $usuario->setPassword("234");
        $usuario->setRole("no_admin");
        //* @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
        $resultado = $this->ModeloUsuario->agregarUsuario($usuario);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 3) {
            echo "fracaso ya existe";
        } else {
            echo "error";
        }
    }
    public function pruebaActualizarUsuario()
    {
        $usuario = new clsUsuario();
        $usuario->setNombre("esteban");
        $usuario->setUsername("loo");
        $usuario->setPassword("dgfhdfh");
        $usuario->setRole("no_admin");
        //* @return int bandera 1 = exito, 2 = no existe usuario, -1 error
        $resultado = $this->ModeloUsuario->actualizarUsuario($usuario);
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 2) {
            echo "fracaso: no existe usuario";
        } else {
            echo "error";
        }
    }

    //PRUEBAS PRODUCTO
    public function pruebaObtenerProducto()
    {
        $producto = new clsProducto();
        $producto = $this->ModeloProducto->obtenerProducto(20);
        if ($producto == null) {
            echo "vaccio";
        } else {
            echo "producto encontrado:";
            echo "id:".$producto->getId() . '-';
            echo "nombre:".$producto->getNombre() . '-';
            echo $producto->getPrecio() . '-';
            echo $producto->getCantidad() . '-';
        }
    }
    public function pruebaListarProductos()
    {
        $productos = $this->ModeloProducto->listarProductos();
        for ($i = 0; $i < sizeof($productos); $i++) {
            echo $productos[$i]->getId() . "-";
            echo $productos[$i]->getNombre() . "-";
            echo $productos[$i]->getPrecio() . "-";
            echo $productos[$i]->getcantidad() . "-";
            echo "^^^^";
        }
    }
    public function pEliminarProducto()
    {
        $resultado = $this->ModeloProducto->EliminarProducto(1);
        if ($resultado == 1) {
            echo "eliminacion exitosa";
        } else {
            echo "no se hizo eliminacion";
        }
    }
    public function pAgregarProducto()
    {
        $producto = new clsProducto();
        $producto->setId(1);
        $producto->setNombre("esteban");
        $producto->setPrecio(1000);
        $producto->setCantidad(234);
        //* @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
        $resultado = $this->ModeloProducto->agregarProducto($producto);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 3) {
            echo "fracaso ya existe";
        } else {
            echo "error";
        }
    }
    public function pActualizarProducto()
    {
        $producto = new clsProducto();
        $producto->setId(20);
        $producto->setNombre("esteban");
        $producto->setPrecio(1000);
        $producto->setCantidad(234);
        //* @return int bandera 1 = exito, 2 = no existe usuario, -1 error
        $resultado = $this->ModeloProducto->actualizarProducto($producto);
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 2) {
            echo "fracaso: no existe producto";
        } else {
            echo "error";
        }
    }

    //PRUEBAS EVENTO
    public function pObtenerEvento()
    {
        $evento = new clsEvento();
        $evento = $this->ModeloEvento->obtenerEvento(1);
        if ($evento == null) {
            echo "vaccio";
        } else {
            echo "evento encontrado:";
            echo $evento->getId() . '-';
            echo $evento->getNombre() . '-';
            echo $evento->getUbicacion() . '-';
        }
    }
    public function pListarEventos()
    {
        $eventos = $this->ModeloEvento->listarEventos();
        for ($i = 0; $i < sizeof($eventos); $i++) {
            echo $eventos[$i]->getId() . "-";
            echo $eventos[$i]->getNombre() . "-";
            echo $eventos[$i]->getUbicacion() . "-";
            echo "^^^^";
        }
    }
    public function pEliminarEvento()
    {
        $resultado = $this->ModeloEvento->EliminarEvento(1);
        if ($resultado == 1) {
            echo "eliminacion exitosa";
        } else {
            echo "no se hizo eliminacion";
        }
    }
    public function pAgregarEvento()
    {
        $evento = new clsEvento();
        //$evento->setId(2);
        $evento->setNombre("feria la sierra");
        $evento->setUbicacion("aqui cerca");
        //* @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
        $resultado = $this->ModeloEvento->agregarEvento($evento);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 3) {
            echo "fracaso ya existe";
        } else {
            echo "error";
        }
    }
    public function pActualizarEvento()
    {
        $evento = new clsEvento();
        $evento->setId(3);
        $evento->setNombre("feria rosas");
        $evento->setUbicacion("aqui cerca");
        //* @return int bandera 1 = exito, 2 = no existe usuario, -1 error
        $resultado = $this->ModeloEvento->actualizarEvento($evento);
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 2) {
            echo "fracaso: no existe producto";
        } else {
            echo "error";
        }
    }

    //PRUEBAS OFERTA
    public function pAgregarOferta()
    {
        $oferta = new clsOferta();
        //$oferta->setId(4);
        $oferta->setNombre("oferta 1");
        $oferta->setCantidad(10);
        $oferta->setPrecio(10000);
        $oferta->setImagen(null);
        $oferta->setDescuento(10);
        //* @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
        $resultado = $this->ModeloOferta->agregarOferta($oferta);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 3) {
            echo "fracaso: ya existe oferta";
        } else {
            echo "error";
        }
    }
    public function pActualizarOferta()
    {
        $oferta = new clsOferta();
        $oferta->setId(3);
        $oferta->setNombre("oferta modificada");
        $oferta->setCantidad(4356);
        $oferta->setPrecio(10);
        $oferta->setImagen(null);
        $oferta->setDescuento(106);
        //* @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
        $resultado = $this->ModeloOferta->actualizarOferta($oferta);
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 2) {
            echo "fracaso: no existe producto";
        } else {
            echo "error";
        }
    }
    public function pListarOferta()
    {
        $ofertas = $this->ModeloOferta->listarOfertas();
        for ($i = 0; $i < sizeof($ofertas); $i++) {
            echo $ofertas[$i]->getId() . "-";
            echo $ofertas[$i]->getNombre() . "-";
            echo $ofertas[$i]->getCantidad() . "-";
            echo $ofertas[$i]->getPrecio() . "-";
            echo $ofertas[$i]->getImagen() . "-";
            echo $ofertas[$i]->getDescuento();
            echo "^^^^";
        }
    }
    public function pObtenerOferta()
    {
        $oferta = new clsOferta();
        $oferta = $this->ModeloOferta->obtenerOferta(1);
        if ($oferta == null) {
            echo "vaccio";
        } else {
            echo "evento encontrado:";
            echo $oferta->getId() . "-";
            echo $oferta->getNombre() . "-";
            echo $oferta->getCantidad() . "-";
            echo $oferta->getPrecio() . "-";
            echo $oferta->getImagen() . "-";
            echo $oferta->getDescuento();
        }
    }
    public function pEliminarOferta()
    {
        $resultado = $this->ModeloOferta->eliminarOferta(3);
        if ($resultado == 1) {
            echo "eliminacion exitosa";
        } else {
            echo "no se hizo eliminacion";
        }
    }

    //PRUEBAS INVERSIONISTA
    public function pAgregarInversionista()
    {
        $inversionista = new clsInversionista();
        $inversionista->setId(3);
        $inversionista->setNombre("inversor 2");
        $inversionista->setImagen(null);
        $inversionista->setDescripcion("descripcionanado");
        $inversionista->setTelefono("123456789");
        $resultado = $this->ModeloInversionista->agregarInversionista($inversionista);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 3) {
            echo "fracaso: ya existe inversor";
        } else {
            echo "error";
        }
    }
    public function pActualizarInversionista()
    {
        $inversionista = new clsInversionista();
        $inversionista->setId(6);
        $inversionista->setNombre("inversor modificado2");
        $inversionista->setImagen(null);
        $inversionista->setDescripcion("descripcionanado");
        $inversionista->setTelefono("987654321");
        $resultado = $this->ModeloInversionista->actualizarInversionista($inversionista);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 2) {
            echo "fracaso: no existe inversor";
        } else {
            echo "error";
        }
    }
    public function pListarInversionista()
    {
        $inversionistas = $this->ModeloInversionista->listarInversionistas();
        for ($i = 0; $i < sizeof($inversionistas); $i++) {
            echo $inversionistas[$i]->getId() . "<br>";
            echo $inversionistas[$i]->getNombre() . "<br>";
            echo $inversionistas[$i]->getImagen() . "<br>";
            echo $inversionistas[$i]->getDescripcion(). "<br>";
            echo $inversionistas[$i]->getTelefono(). "<br>";
            echo "^^^^";
        }
    }
    public function pObtenerInversionista()
    {
        $inversionista = new clsInversionista();
        $inversionista = $this->ModeloInversionista->obtenerInversionista(6);
        if ($inversionista == null) {
            echo "vaccio";
        } else {
            echo "evento encontrado:";
            echo $inversionista->getId() . "-";
            echo $inversionista->getNombre() . "-";
            echo $inversionista->getImagen() . "-";
            echo $inversionista->getDescripcion()."<br>";
            echo $inversionista->getTelefono();
        }
    }
    public function pEliminarInversionista()
    {
        $resultado = $this->ModeloInversionista->eliminarInversionista(6);
        if ($resultado == 1) {
            echo "eliminacion exitosa";
        } else {
            echo "no se hizo eliminacion";
        }
    }

    //PRUEBAS ORGANIZACION
    public function pAgregarOrganizacion(){
        $organizacion = new clsOrganizacion();
        //$organizacion->setId(3);
        $organizacion->setNombre("organizacion 1");
        $organizacion->setImagen(null);
        $organizacion->setUbicacion("descripcionanado");
        $organizacion->setTelefono(12345678);
        $resultado = $this->ModeloOrganizacion->agregarOrganizacion($organizacion);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 3) {
            echo "fracaso: ya existe organizacion";
        } else {
            echo "error";
        }
    }
    public function pActualizarOrganizacion(){
        $organizacion = new clsOrganizacion();
        $organizacion->setId(1);
        $organizacion->setNombre("oragnizaicon modificado");
        $organizacion->setImagen(null);
        $organizacion->setUbicacion("descripcionanado");
        $organizacion->setTelefono("00000000");
        $resultado = $this->ModeloOrganizacion->actualizarOrganizacion($organizacion);
        echo $resultado;
        if ($resultado == 1) {
            echo "exito";
        } else if ($resultado == 2) {
            echo "fracaso: no existe organizacion";
        } else {
            echo "error";
        }
    }
    public function pListarOrganizacion(){
        $organizacions = $this->ModeloOrganizacion->listarOrganizaciones();
        for ($i = 0; $i < sizeof($organizacions); $i++) {
            echo $organizacions[$i]->getId() . "-";
            echo $organizacions[$i]->getNombre() . "-";
            echo $organizacions[$i]->getImagen() . "-";
            echo $organizacions[$i]->getUbicacion()."<br>";
            echo $organizacions[$i]->getTelefono();
            echo "^^^^";
        }
    }
    public function pObtenerOrganizacion(){
        $organizacion = new clsOrganizacion();
        $organizacion = $this->ModeloOrganizacion->obtenerOrganizacion(1);
        if ($organizacion == null) {
            echo "vaccio";
        } else {
            echo "organizacion encontrado:";
            echo $organizacion->getId() . "-";
            echo $organizacion->getNombre() . "-";
            echo $organizacion->getImagen() . "-";
            echo $organizacion->getUbicacion();
            echo $organizacion->getTelefono();
        }
    }
    public function pEliminarOrganizacion(){
        $resultado = $this->ModeloOrganizacion->eliminarOrganizacion(4);
        if ($resultado == 1) {
            echo "eliminacion exitosa";
        } else {
            echo "no se hizo eliminacion";
        }
    }

    //PRUEBAS CARRITO
    public function pListarCarrito(){
        $this->ModeloCarrito->listarCarrito(7);
    }
    public function pAgregarCarrito(){
        echo $this->ModeloCarrito->agregarProductoCarrito(7,12);
    }
    public function pRetirarDelCarrito(){
        echo $this->ModeloCarrito->retirarProductoCarrito(5);
    }
    public function pTotal(){
        $this->ModeloCarrito->total(7);
    }
    public function pruebaVistaPrincipal(){
        $data['existeSesion']=false;
        $data['productos']=$this->ModeloProducto->listarProductos();
        //var_dump($data);
        $this->load->view("principal",$data);
    }
}
