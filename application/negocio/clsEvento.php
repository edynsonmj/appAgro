<?php
class clsEvento{
    private $id;
    private $nombre;
    private $longitud;
    private $latitud;
    public function __construct()
    {
    }
    public function setId($prmId){
        $this->id=$prmId;
    }
    public function setNombre($prmNombre){
        $this->nombre=$prmNombre;
    }
    public function setLongitud($prmlongitud){
        $this->longitud=$prmlongitud;
    }
    public function setLatitud($prmLatitud){
        $this->latitud=$prmLatitud;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getLongitud(){
        return $this->longitud;
    }
    public function getLatitud(){
        return $this->latitud;
    }
}
?>