<?php
class clsProducto{
    private $id;
    private $nombre;
    private $cantidad;
    private $precio;
    private $imagen;
    public function __construct()
    {
    }
    public function setId($prmId){
        $this->id=$prmId;
    }
    public function setNombre($prmNombre){
        $this->nombre=$prmNombre;
    }
    public function setCantidad($prmCantidad){
        $this->cantidad=$prmCantidad;
    }
    public function setPrecio($prmPrecio){
        $this->precio=$prmPrecio;
    }
    public function setImagen($prmImagen){
        $this->imagen=$prmImagen;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getImagen(){
        return $this->imagen;
    }
}
?>