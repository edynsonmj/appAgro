<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsOferta.php";
require_once "/xampp/htdocs/appAgro/application/controllers/GestionSesion.php";
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
            $sesion = new GestionSesion();
            $data['existeSesion']=$sesion->existeSesion();
            $data['ofertas']=$this->ModeloOferta->listarOfertas();
            if($data['existeSesion']){
                $datosGuardados = $sesion->datosSesion();
                $data['nombre'] = $datosGuardados['nombre'];
                $data['usuario'] = $datosGuardados['username'];
                $data['role'] = $datosGuardados['role'];
                if ($data['role'] == 'admin') {
                    $this->load->view("estructura/Vista_editar_ofertas",$data);
                }else {
                    $this->load->view("estructura/Vista_oferta",$data);
                }
            }else{
                $this->load->view("estructura/Vista_oferta",$data);
            }   
        }
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