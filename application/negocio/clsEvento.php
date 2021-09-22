<?php
class clsEvento{
    private $id;
    private $nombre;
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
    public function setUbicacion($prmUbicacion){
        $this->ubicacion=$prmUbicacion;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getUbicacion(){
        return $this->ubicacion;
    }
}
?>