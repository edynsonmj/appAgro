<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsOrganizacion.php";
class ModeloOrganizacion extends CI_model
{
    /**
     * Retorna un Organizacion de la base de datos, con orgId = $prmId
     * @param int $prmId : id del Organizacion a consultar
     * @return clsOrganizacion o null, en caso de no encontrase un Organizacion con dicha especificacion, null en caso de error
     */
    public function obtenerOrganizacion($prmId)
    {
        try {
            $consulta = $this->db->where('orgId', $prmId);
            $consulta = $consulta->get('organizacion');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $Organizacion = new clsOrganizacion();
            foreach ($data['objetos'] as $obj) {
                $Organizacion->setId($obj->orgId);
                $Organizacion->setNombre($obj->orgNombre);
                $Organizacion->setImagen($obj->orgImagen);
                $Organizacion->setUbicacion($obj->orgUbicacion);
            }
            return $Organizacion;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION OBTENEROrganizacion DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }
    
    /**
     * Retorna la lista de Organizacions existentes en la base de datos
     * @return array array de tipo clsOrganizacion o null si no se encuentran datos o existe un error
     */
    public function listarOrganizaciones()
    {
        try{
            $consulta = $this->db->get('organizacion');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $Organizacions = array();
            foreach ($data['objetos'] as $obj) {
                $Organizacion = new clsOrganizacion();
                $Organizacion->setId($obj->orgId);
                $Organizacion->setNombre($obj->orgNombre);
                $Organizacion->setImagen($obj->orgImagen);
                $Organizacion->setUbicacion($obj->orgUbicacion);
                array_push($Organizacions, $Organizacion);
            }
            return $Organizacions;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION LISTAR OrganizacionS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }

    /**
     * elimina un Organizacion con orgId = prmId
     * @param int $prmId : identificador de la Organizacion
     * @return int bandera 1= exito, 2=fracaso, -1=error
     */
    public function eliminarOrganizacion($prmId){
        try{
            $this->db->where('orgId',$prmId);
            $this->db->delete('organizacion');
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERROR AL EJECUTAR LA OPERACION ELIMINAROrganizacion: ".$e->getMessage();
            return -1;
        }
    }

    /**
     * @param clsOrganizacion $prmOrganizacion : Organizacion que sera insertada;
     * @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
     */
    public function agregarOrganizacion(clsOrganizacion $prmOrganizacion){
        try{
            if($prmOrganizacion->getId()!=0){
                if($this->obtenerOrganizacion($prmOrganizacion->getId())){
                    return 3;
                }
            }
            $this->db->insert("organizacion",["orgNombre"=> $prmOrganizacion->getNombre(),"orgImagen"=>$prmOrganizacion->getImagen(),"orgUbicacion"=>$prmOrganizacion->getUbicacion()]);
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION AGREGAR".$e->getMessage();
            return -1;
        }
    }

    /**
     * el id no debe ser actualizado
     * @param clsOrganizacion $prmOrganizacion : informacion de actualizacion
     * @return int bandera 1 = exito, 2 = no existe Organizacion, -1 error
     */
    public function actualizarOrganizacion(clsOrganizacion $prmOrganizacion){
        try{
            if($this->obtenerOrganizacion($prmOrganizacion->getId())==null){
                return 2;
            }
            $this->db->where('orgId',$prmOrganizacion->getId());
            $this->db->update('organizacion',["orgNombre"=> $prmOrganizacion->getNombre(),"orgImagen"=>$prmOrganizacion->getImagen(),"orgUbicacion"=>$prmOrganizacion->getUbicacion()]);
            return 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION ACTUALIZAR Organizacion".$e->getMessage();
            return -1;
        }
    }
}

?>