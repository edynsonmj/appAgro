<?php
class clsUsuario{
    private $id;
    private $nombre;
    private $username;
    private $password;
    private $role;
    public function __construct()
    {
    }
    public function setId($prmId){
        $this->id=$prmId;
    }
    public function setNombre($prmNombre){
        $this->nombre=$prmNombre;
    }
    public function setUsername($prmUsername){
        $this->username=$prmUsername;
    }
    public function setPassword($prmPassword){
        $this->password=$prmPassword;
    }
    public function setRole($prmRole){
        $this->role=$prmRole;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
}
?>