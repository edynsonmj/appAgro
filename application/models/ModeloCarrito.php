<?php
require_once "/xampp/htdocs/appAgro/application/negocio/clsProducto.php";
require_once "/xampp/htdocs/appAgro/application/models/ModeloProducto.php";
class ModeloCarrito extends CI_model
{

    /**
     * Retorna la lista de PRODUCTOS existentes en EL CARRITO
     * @return array $productos: de tipo pareja, donde cada posicion del array es una pareja conformada por el id del carrito y un producto clsProducto
     */
    public function listarCarrito($prmUsuarioId)
    {
        try {
            $this->db->select('carId, producto.proId, producto.proNombre, producto.proPrecio, producto.proCantidad');
            $this->db->from('carrito');
            $this->db->join('producto', 'producto.proId = carrito.proId');
            $this->db->join('usuario', 'usuario.usuId = carrito.usuId');
            $this->db->where('usuario.usuId', $prmUsuarioId);
            $consulta = $this->db->get();
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
                //se forma una pareja [carId: int, producto: clsProducto]
                $pareja = [$obj->carId, $producto];
                /*echo ' CARID: '.$obj->carId."<br>";
                echo ' USUID: '.$obj->usuId."<br>";*/
                /*echo ' PROID: '.$obj->proId."<br>";
                echo ' PRONOMBRE: '.$obj->proNombre."<br>";
                echo ' PROCANTIDAD: '.$obj->proCantidad."<br>";
                echo ' PROPRECIO: '.$obj->proPrecio."<br>";*/
                /*echo ' USUNOMBRE: '.$obj->usuNombre."<br>";
                echo ' USUUSERNAME: '.$obj->usuUsername."<br>";
                echo ' USUROLE: '.$obj->usuRole."<br>";
                echo ' USUPASSWORD: '.$obj->usuPassword."<br>";*/
                //echo "______________________________________"."<br>";
                //se agrega la pareja a productos
                array_push($productos, $pareja);
            }
            //var_dump($productos);
            return $productos;
        } catch (Exception $e) {
            echo "ERROR AL EJECUTAR LA OPERACION LISTAR CARRITO DEFINIDO COMO:" . $e->getMessage();
            return null;
        }
    }
    
    /**
     * @param int prmUsuarioId : id del propietario del carrito.
     * @param int prmProductoId : id del producto a agregar.
     * @return int bandera 1= exito, 2=fracaso, 3=datos erroneos para insercion, -1=error
     */
    public function agregarProductoCarrito($prmUsuarioId, $prmProductoId){
        try{
            echo "agregar producto carrito ".$prmProductoId."dos".$prmUsuarioId;
            if(($this->ModeloProducto->obtenerProducto($prmProductoId))==null){
                return 3;
            }
            if(($this->ModeloUsuario->obtenerUsuarioPorId($prmUsuarioId))==null){
                return 3;
            }
            $this->db->insert("carrito",["usuId" => $prmUsuarioId, "proId" => $prmProductoId]);
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "se ha producido un error al agregar producto definido como: ".$e->getMessage();
            return -1;
        }
    }

    /**
     * @param int $prmCarId: id que representa un item del carrito.
     * @return int bandera 1= exito, 2=fracaso, -1=error
     */
    public function retirarProductoCarrito($prmCarId){
        try{
            $this->db->where('carId',$prmCarId);
            $this->db->delete('carrito');
            return ($this->db->affected_rows() !=1)? 2: 1;
        }catch(Exception $e){
            echo "se ha producido un error al retirar el item del carrito: ".$e->getMessage();
            return -1;
        }
    }

    public function total($prmUserId){
        try{
            $valor = 0;
            $this->db->select_sum("producto.proPrecio");
            $this->db->from("carrito");
            $this->db->join('producto', 'producto.proId = carrito.proId');
            $this->db->where('carrito.usuId', $prmUserId);
            $valor = $this->db->get()->result();
            foreach($valor as $objValor){
                $valor = $objValor->proPrecio;
            }
            return $valor;
        }catch(Exception $e){
            echo "error al obtener el total: ".$e->getMessage();
            return -1;
        }
    }
}
