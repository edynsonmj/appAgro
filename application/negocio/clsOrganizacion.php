<?php
class clsOrganizacion{
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
    private $ubicacion;
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
    public function setUbicacion($prmUbicacion){
        $this->ubicacion = $prmUbicacion;
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
    public function getUbicacion(){
        return $this->ubicacion;
    }
}
?>