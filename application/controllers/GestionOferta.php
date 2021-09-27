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
    public function deleteOferta(){
        $idOfer = $this->input->post("idOferta");
        $this->ModeloOferta->eliminarOferta($idOfer);
        header('Location:'.base_url()."index.php/Frontal/Ofertas");
    }
    /**
     * para agregar una oferta
     */
    public function addOferta(){
        //posiblemente tu codigo aqui
        $nombreOfer = $this->input->post("nameOfer");
        $cantidadOfer = $this->input->post("amountOfer");
        $precioOfer =  $this->input->post("priceOfer");
        $imagenOfer =  $this->input->post("imgOfer");
        $descuentoOfer =  $this->input->post("discountOfer");
        $newOfer = new clsOferta();
        $newOfer->setNombre($nombreOfer);
        $newOfer->setCantidad($cantidadOfer);
        $newOfer->setPrecio($precioOfer);
        $newOfer->setImagen($imagenOfer);
        $newOfer->setDescuento($descuentoOfer);
        $this->ModeloOferta->agregarOferta($newOfer);
        header('Location:'.base_url()."index.php/Frontal/Ofertas");
    }

    public function updateOferta(){
        $idOfer = $this->input->post("idOferta");
        $nombreOfer = $this->input->post("nameOferta");
        $cantidadOfer = $this->input->post("amountOferta");
        $precioOfer =  $this->input->post("priceOferta");
        $imagenOfer =  $this->input->post("imgOfer");
        $descuentoOfer =  $this->input->post("DescuentoOferta");
        $newOfer = new clsOferta();
        $newOfer->setId($idOfer);
        $newOfer->setNombre($nombreOfer);
        $newOfer->setCantidad($cantidadOfer);
        $newOfer->setPrecio($precioOfer);
        $newOfer->setImagen($imagenOfer);
        $newOfer->setDescuento($descuentoOfer);
        $this->ModeloOferta->actualizarOferta($newOfer);
        header('Location:'.base_url()."index.php/Frontal/Ofertas");
    }
}