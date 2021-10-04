<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsProducto.php";
class ModeloProducto extends CI_model
{
    /**
     * Retorna un producto de la base de datos, con proId = $prmId
     * @param string $prmId : id de producto a consultar
     * @return clsProducto o null, en caso de no encontrase un producto con dicha especificacion, null en caso de error
     */
    public function obtenerProducto($prmId)
    {
        try {
            echo "par".$prmId;
            $consulta = $this->db->where('proId', $prmId);
            $consulta = $consulta->get('producto');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $producto = new clsProducto();
            foreach ($data['objetos'] as $obj) {
                $producto->setId($obj->proId);
                $producto->setNombre($obj->proNombre);
                $producto->setPrecio($obj->proPrecio);
                $producto->setCantidad($obj->proCantidad);
                $producto->setImagen($obj->proImagen);
                $producto->setDescuento($obj->proDescuento);
                $producto->setMedida($obj->proMedida);
            }
            return $producto;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION OBTENERPRODUCTO DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }
    
    /**
     * Retorna la lista de productos existentes en la base de datos
     * @return array array de tipo clsProducto o null si no se encuentran datos o existe un error
     */
    public function listarProductos()
    {
        try{
            $consulta = $this->db->get('producto');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $productos = array();
            foreach ($data['objetos'] as $obj) {
                $producto = new clsProducto();
                $producto->setId($obj->proId);
                $producto->setNombre($obj->proNombre);
                $producto->setPrecio($obj->proPrecio);
                $producto->setCantidad($obj->proCantidad);
                $producto->setImagen($obj->proImagen);
                $producto->setDescuento($obj->proDescuento);
                $producto->setMedida($obj->proMedida);
                if(($producto->getDescuento()==0) && ($producto->getDescuento()!=null)){
                    array_push($productos, $producto);
                }                
            }
            return $productos;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION LISTAR PRODUCTOS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }

    /**
     * elimina un producto con proId = prmId
     * @param int $prmId : identificador del producto
     * @return int bandera 1= exito, 2=fracaso, -1=error
     */
    public function eliminarProducto($prmId){
        try{
            $this->db->where('proId',$prmId);
            $this->db->delete('producto');
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERROR AL EJECUTAR LA OPERACION ELIMINARPRODUCTO: ".$e->getMessage();
            return -1;
        }
    }

    /**
     * @param clsProducto $prmProducto : producto que sera insertado;
     * @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
     */
    public function agregarProducto(clsProducto $prmProducto){
        try{
            if($prmProducto->getId()!=0){
                if($this->obtenerProducto($prmProducto->getId())){
                    return 3;
                }
            }
            $this->db->insert("producto",["proNombre"=> $prmProducto->getNombre(),"proPrecio" => $prmProducto->getPrecio(), "proCantidad" => $prmProducto->getCantidad(), "proImagen"=>$prmProducto->getImagen(), "proDescuento"=>0, "proMedida"=>$prmProducto->getMedida()]);
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION AGREGAR".$e->getMessage();
            return -1;
        }
    }

    /**
     * el id no debe ser actualizado
     * @param clsProducto $prmProducto : informacion de actualizacion
     * @return int bandera 1 = exito, 2 = no existe usuario, -1 error
     */
    public function actualizarProducto(clsProducto $prmProducto){
        try{
            if($this->obtenerProducto($prmProducto->getId())==null){
                return 2;
            }
            $this->db->where('proId',$prmProducto->getId());
            $this->db->update('producto',["proNombre"=> $prmProducto->getNombre(),"proPrecio" => $prmProducto->getPrecio(), "proCantidad" => $prmProducto->getCantidad(), "proImagen"=> $prmProducto->getImagen(), "proDescuento"=>0, "proMedida"=>$prmProducto->getMedida()]);
            return 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION ACTUALIZAR PRODUCTO".$e->getMessage();
            return -1;
        }
    }
}

?>