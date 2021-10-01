<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsEvento.php";
class ModeloEvento extends CI_model
{
    /**
     * Retorna un evento de la base de datos, con eveId = $prmId
     * @param int $prmId : id de evento a consultar
     * @return clsProducto o null, en caso de no encontrase un evento con dicha especificacion, null en caso de error
     */
    public function obtenerEvento($prmId)
    {
        try {
            $consulta = $this->db->where('eveId', $prmId);
            $consulta = $consulta->get('evento');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $evento = new clsEvento();
            foreach ($data['objetos'] as $obj) {
                $evento->setId($obj->eveId);
                $evento->setNombre($obj->eveNombre);
                $evento->setLongitud($obj->eveLongitud);
                $evento->setLatitud($obj->eveLatitud);
            }
            return $evento;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION OBTENEREVENTO DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }
    
    /**
     * Retorna la lista de eventos existentes en la base de datos
     * @return array array de tipo clsEvento o null si no se encuentran datos o existe un error
     */
    public function listarEventos()
    {
        try{
            $consulta = $this->db->get('evento');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $eventos = array();
            foreach ($data['objetos'] as $obj) {
                $evento = new clsEvento();
                $evento->setId($obj->eveId);
                $evento->setNombre($obj->eveNombre);
                $evento->setLongitud($obj->eveLongitud);
                $evento->setLatitud($obj->eveLatitud);
                array_push($eventos, $evento);
            }
            return $eventos;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION LISTAR EVENTOS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }

    /**
     * elimina un evento con eveId = prmId
     * @param int $prmId : identificador del evento
     * @return int bandera 1= exito, 2=fracaso, -1=error
     */
    public function eliminarEvento($prmId){
        try{
            $this->db->where('eveId',$prmId);
            $this->db->delete('evento');
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERROR AL EJECUTAR LA OPERACION ELIMINAREVENTO: ".$e->getMessage();
            return -1;
        }
    }

    /**
     * @param clsEvento $prmEvento : evetento que sera insertado;
     * @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
     */
    public function agregarEvento(clsEvento $prmEvento){
        try{
            if($prmEvento->getId()!=0){
                if($this->obtenerEvento($prmEvento->getId())){
                    return 3;
                }
            }
            $this->db->insert("evento",["eveNombre"=> $prmEvento->getNombre(),"eveLongitud" => $prmEvento->getLongitud(), "eveLatitud"=>$prmEvento->getLatitud()]);
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION AGREGAR".$e->getMessage();
            return -1;
        }
    }

    /**
     * el id no debe ser actualizado
     * @param clsEvento $prmEvento : informacion de actualizacion
     * @return int bandera 1 = exito, 2 = no existe usuario, -1 error
     */
    public function actualizarEvento(clsEvento $prmEvento){
        try{
            if($this->obtenerEvento($prmEvento->getId())==null){
                return 2;
            }
            $this->db->where('eveId',$prmEvento->getId());
            $this->db->update('evento',["eveNombre"=> $prmEvento->getNombre(),"eveLongitud" => $prmEvento->getLongitud(), "eveLatitud"=>$prmEvento->getLatitud()]);
            return 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION ACTUALIZAR EVENTO".$e->getMessage();
            return -1;
        }
    }
}

?>