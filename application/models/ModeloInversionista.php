<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsInversionista.php";
class Modeloinversionista extends CI_model
{
    /**
     * Retorna un inversionista de la base de datos, con invId = $prmId
     * @param int $prmId : id del inversionista a consultar
     * @return clsInversionista o null, en caso de no encontrase un inversionista con dicha especificacion, null en caso de error
     */
    public function obtenerInversionista($prmId)
    {
        try {
            $consulta = $this->db->where('invId', $prmId);
            $consulta = $consulta->get('inversionista');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $inversionista = new clsInversionista();
            foreach ($data['objetos'] as $obj) {
                $inversionista->setId($obj->invId);
                $inversionista->setNombre($obj->invNombre);
                $inversionista->setImagen($obj->invImagen);
                $inversionista->setDescripcion($obj->invDescripcion);
            }
            return $inversionista;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION OBTENERinversionista DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }
    
    /**
     * Retorna la lista de inversionistas existentes en la base de datos
     * @return array array de tipo clsinversionista o null si no se encuentran datos o existe un error
     */
    public function listarInversionistas()
    {
        try{
            $consulta = $this->db->get('inversionista');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $inversionistas = array();
            foreach ($data['objetos'] as $obj) {
                $inversionista = new clsInversionista();
                $inversionista->setId($obj->invId);
                $inversionista->setNombre($obj->invNombre);
                $inversionista->setImagen($obj->invImagen);
                $inversionista->setDescripcion($obj->invDescripcion);
                array_push($inversionistas, $inversionista);
            }
            return $inversionistas;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION LISTAR inversionistaS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }

    /**
     * elimina un inversionista con invId = prmId
     * @param int $prmId : identificador de la inversionista
     * @return int bandera 1= exito, 2=fracaso, -1=error
     */
    public function eliminarInversionista($prmId){
        try{
            $this->db->where('invId',$prmId);
            $this->db->delete('inversionista');
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERROR AL EJECUTAR LA OPERACION ELIMINARinversionista: ".$e->getMessage();
            return -1;
        }
    }

    /**
     * @param clsinversionista $prminversionista : inversionista que sera insertada;
     * @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
     */
    public function agregarInversionista(clsInversionista $prminversionista){
        try{
            if($prminversionista->getId()!=0){
                if($this->obtenerInversionista($prminversionista->getId())){
                    return 3;
                }
            }
            $this->db->insert("inversionista",["invNombre"=> $prminversionista->getNombre(),"invImagen"=>$prminversionista->getImagen(),"invDescripcion"=>$prminversionista->getDescripcion()]);
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION AGREGAR".$e->getMessage();
            return -1;
        }
    }

    /**
     * el id no debe ser actualizado
     * @param clsInversionista $prminversionista : informacion de actualizacion
     * @return int bandera 1 = exito, 2 = no existe inversionista, -1 error
     */
    public function actualizarInversionista(clsInversionista $prminversionista){
        try{
            if($this->obtenerInversionista($prminversionista->getId())==null){
                return 2;
            }
            $this->db->where('invId',$prminversionista->getId());
            $this->db->update('inversionista',["invNombre"=> $prminversionista->getNombre(),"invImagen"=>$prminversionista->getImagen(),"invDescripcion"=>$prminversionista->getDescripcion()]);
            return 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION ACTUALIZAR inversionista".$e->getMessage();
            return -1;
        }
    }
}

?>