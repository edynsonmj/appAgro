<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsOferta.php";
class GestionOferta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModeloOferta');
    }

    /**
     * para obtener una oferta
     */
    public function getOferta($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //crear objeto clsOferta
        $auxOferta = new clsOferta();
        //llamado al modelo
        $auxOferta = $this->ModeloOferta->obtenerOferta($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para obtener todas las ofertas
     */
    public function allOfertas(){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //recupera las ofertas en un rray para ello, ejemplo
        $ofertas = array();
        //llamado al modelo
        $ofertas = $this->ModeloOferta->listarOfertas();
        //posiblemente tu codigo aqui
    }
    /**
     * para eliminar una oferta
     */
    public function deleteOferta($prmId){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloOferta->eliminarOferta($prmId);
        //posiblemente tu codigo aqui
    }
    /**
     * para agregar una oferta
     */
    public function addOferta(clsOferta $prmOferta){
        //posiblemente tu codigo aqui
        $nombreOfer = $this->input->post("nombre");
        $cantidadOfer = $this->input->post("");
        $precioOfer =  $this->input->post("");
        $imagenOfer =  $this->input->post("");
        $descuentoOfer =  $this->input->post("");
        $newOfer = new clsOferta();
        $newOfer->setNombre($nombreOfer);
        $newOfer->setCantidad($cantidadOfer);
        $newOfer->setPrecio($precioOfer);
        $newOfer->setImagen($imagenOfer);
        $newOfer->setDescuento($descuento);
        $this->ModeloOferta->obtenerOferta->getId();
         if()
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo

    public function updateOferta(clsOferta $prmOferta){
        //posiblemente tu codigo aqui
        //EJEMPLO DE USO DEL MODELO
        //llamado al modelo
        $this->ModeloOferta->actualizarOferta($prmOferta);
        //posiblemente tu codigo aqui
    }
}