<?php
class clsOferta{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $nombre
     */
    private $nombre;
    /**
     * @var int $cantidad
     */
    private $cantidad;
    /**
     * @var int $precio;
     */
    private $precio;
    /**
     * @var file
     */
    private $imagen;
    /**
     * @var int 
     */
    private $descuento;
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
        $this->imagen = $prmImagen;
    }
    public function setDescuento($prmDescuento){
        $this->descuento = $prmDescuento;
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
}
?>