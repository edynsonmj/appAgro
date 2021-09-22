<?php
class clsError{
    /**
     * @var int $error 0 = no hay error, 1 = hay error
     */
    private $error;
    /**
     * @var string $mensaje almacena el mensaje que produce el error
     */
    private $mensaje;
    /**
     * @var int $parametro variable para hacer validaciones
     */
    private $parametro;
    /**
     * @param int $prmError bandera que define si hay o no error, 0 = no existe, 1 = existe
     * @param string $prmMensaje contenedor para el mensaje de error
     * @param int $prmParametro OPCIONAL variable para hacer validaciones
     */
    public function __construct($prmError, $prmMensaje, $prmParametro){
        $this->error = $prmError;
        $this->mensaje = $prmMensaje;
        $this->parametro= $prmParametro;
    }
    /**
     * @param int $prmError Existe error = 1, no existe = 0
     * @return void
     */
    public function setError($prmError){
        $this->error = $prmError;
    }
    /**
     * @param string $prmMensaje mensaje de error
     * @return void
     */
    public function setMensaje($prmMensaje){
        $this->mensaje = $prmMensaje;
    }
    /**
     * @param int prmParametro : valor entero para hacer validaciones
     * @return void
     */
    public function setParametro($prmParametro){
        $this->parametro= $prmParametro;
    }
    /**
     * Retorna la bandera de error
     * @return int 0 = No existe error, 1 = existe error
     */
    public function getError(){
        return $this->error;
    }
    /**
     * Retorna el mensaje de error
     * @return string mensaje
     */
    public function getMensaje(){
        return $this->mensaje;
    }
    /**
     * Retornma el parametro para validaciones
     * @return int
     */
    public function getParametro(){
        return $this->parametro;
    }
}
?>