<?php
class clsInversionista{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $nombre
     */
    private $nombre;
    /**
     * @var file
     */
    private $imagen;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @var array;
     */
    private $telefono;
    public function __construct()
    {
    }
    public function setId($prmId){
        $this->id=$prmId;
    }
    public function setNombre($prmNombre){
        $this->nombre=$prmNombre;
    }
    public function setImagen($prmImagen){
        $this->imagen = $prmImagen;
    }
    public function setDescripcion($prmDescripcion){
        $this->descripcion = $prmDescripcion;
    }
    public function setTelefono($prmTelefono){
        $this->telefono=$prmTelefono;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getImagen(){
        return $this->imagen;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getTelefono(){
        return $this->telefono;
    }
}
?>