<?php
class clsProducto{
    private $id;
    private $nombre;
    private $cantidad;
    private $precio;
    private $imagen;
    private $descuento;
    private $medida;
    private $total;
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
    public function setDescuento($prmDescuento){
        $this->descuento=$prmDescuento;
    }
    public function setMedida($prmMedida){
        $this->medida = $prmMedida;
    }
    public function setTotal(){
        if(($this->descuento!=0) && ($this->descuento!='0')){
            $this->total = $this->precio*$this->descuento;
        }
        else{
            $this->total = $this->precio;
        }
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
    public function getDescuento(){
        return $this->descuento;
    }
    public function getMedida(){
        return $this->medida;
    }
    public function getTotal(){
        return $this->total;
    }
}
?>