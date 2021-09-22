<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsOferta.php";
class ModeloOferta extends CI_model
{
    /**
     * Retorna una oferta de la base de datos, con eveId = $prmId
     * @param int $prmId : id de la oferta a consultar
     * @return clsOferta o null, en caso de no encontrase una oferta con dicha especificacion, null en caso de error
     */
    public function obtenerOferta($prmId)
    {
        try {
            $consulta = $this->db->where('ofeId', $prmId);
            $consulta = $consulta->get('oferta');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $oferta = new clsOferta();
            foreach ($data['objetos'] as $obj) {
                $oferta->setId($obj->ofeId);
                $oferta->setNombre($obj->ofeNombre);
                $oferta->setCantidad($obj->ofeCantidad);
                $oferta->setPrecio($obj->ofePrecio);
                $oferta->setImagen($obj->ofeImagen);
                $oferta->setDescuento($obj->ofeDescuento);
            }
            return $oferta;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION OBTENEROFERTA DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }
    
    /**
     * Retorna la lista de ofertas existentes en la base de datos
     * @return array array de tipo clsOferta o null si no se encuentran datos o existe un error
     */
    public function listarOfertas()
    {
        try{
            $consulta = $this->db->get('oferta');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $ofertas = array();
            foreach ($data['objetos'] as $obj) {
                $oferta = new clsOferta();
                $oferta->setId($obj->ofeId);
                $oferta->setNombre($obj->ofeNombre);
                $oferta->setCantidad($obj->ofeCantidad);
                $oferta->setPrecio($obj->ofePrecio);
                $oferta->setImagen($obj->ofeImagen);
                $oferta->setDescuento($obj->ofeDescuento);
                array_push($ofertas, $oferta);
            }
            return $ofertas;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION LISTAR OFERTAS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }

    /**
     * elimina una oferta con ofeId = prmId
     * @param int $prmId : identificador de la oferta
     * @return int bandera 1= exito, 2=fracaso, -1=error
     */
    public function eliminarOferta($prmId){
        try{
            $this->db->where('ofeId',$prmId);
            $this->db->delete('oferta');
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERROR AL EJECUTAR LA OPERACION ELIMINAROFERTA: ".$e->getMessage();
            return -1;
        }
    }

    /**
     * @param clsOferta $prmOferta : oferta que sera insertada;
     * @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
     */
    public function agregarOferta(clsOferta $prmOferta){
        try{
            if($prmOferta->getId()!=0){
                if($this->obtenerOferta($prmOferta->getId())){
                    return 3;
                }
            }
            $this->db->insert("oferta",["ofeNombre"=> $prmOferta->getNombre(),"ofeCantidad"=>$prmOferta->getCantidad(),"ofePrecio"=>$prmOferta->getPrecio(),"ofeImagen"=>$prmOferta->getImagen(),"ofeDescuento"=>$prmOferta->getDescuento()]);
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION AGREGAR".$e->getMessage();
            return -1;
        }
    }

    /**
     * el id no debe ser actualizado
     * @param clsOferta $prmOferta : informacion de actualizacion
     * @return int bandera 1 = exito, 2 = no existe oferta, -1 error
     */
    public function actualizarOferta(clsOferta $prmOferta){
        try{
            if($this->obtenerOferta($prmOferta->getId())==null){
                return 2;
            }
            $this->db->where('ofeId',$prmOferta->getId());
            $this->db->update('oferta',["ofeNombre"=> $prmOferta->getNombre(),"ofeCantidad"=>$prmOferta->getCantidad(),"ofePrecio"=>$prmOferta->getPrecio(),"ofeImagen"=>$prmOferta->getImagen(),"ofeDescuento"=>$prmOferta->getDescuento()]);
            return 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION ACTUALIZAR OFERTA".$e->getMessage();
            return -1;
        }
    }
}

?>