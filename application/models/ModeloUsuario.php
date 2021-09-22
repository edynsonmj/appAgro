<?php
require_once '/xampp/htdocs/appAgro/application/negocio/clsUsuario.php';

class ModeloUsuario extends CI_model
{
    /**
     * Retorna un usuario de la base de datos, con username = $username
     * @param int $prmId: id del usuario a consultar
     * @return clsUsuario o null, en caso de no encontrase un usuario con dicha especificacion, null en caso de error
     */
    public function obtenerUsuarioPorId($prmId)
    {
        try {
            $consulta = $this->db->where('usuId', $prmId);
            $consulta = $consulta->get('usuario');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $usuario = new clsUsuario();
            foreach ($data['objetos'] as $obj) {
                $usuario->setId($obj->usuId);
                $usuario->setNombre($obj->usuNombre);
                $usuario->setUsername($obj->usuUsername);
                $usuario->setPassword($obj->usuPassword);
                $usuario->setRole($obj->usuRole);
            }
            return $usuario;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION OBTENERUSUARIOS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }
    /**
     * Retorna un usuario de la base de datos, con username = $username
     * @param string $username : username de usuario a consultar
     * @return clsUsuario o null, en caso de no encontrase un usuario con dicha especificacion, null en caso de error
     */
    public function obtenerUsuario($username)
    {
        try {
            $consulta = $this->db->where('usuUsername', $username);
            $consulta = $consulta->get('usuario');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $usuario = new clsUsuario();
            foreach ($data['objetos'] as $obj) {
                $usuario->setId($obj->usuId);
                $usuario->setNombre($obj->usuNombre);
                $usuario->setUsername($obj->usuUsername);
                $usuario->setPassword($obj->usuPassword);
                $usuario->setRole($obj->usuRole);
            }
            return $usuario;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION OBTENERUSUARIOS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }
    /**
     * Retorna la lista de usuarios existentes en la base de datos
     * @return array array de tipo clsUsuario o null si no se encuentran datos o existe un error
     */
    public function listarUsuarios()
    {
        try{
            $consulta = $this->db->get('usuario');
            $data['objetos'] = $consulta->result();
            if ($data['objetos'] == null) {
                return null;
            }
            $usuarios = array();
            foreach ($data['objetos'] as $obj) {
                $usuario = new clsUsuario();
                $usuario->setId($obj->usuId);
                $usuario->setNombre($obj->usuNombre);
                $usuario->setUsername($obj->usuUsername);
                $usuario->setPassword($obj->usuPassword);
                $usuario->setRole($obj->usuRole);
                array_push($usuarios, $usuario);
            }
            return $usuarios;
        }catch(Exception $e){
            echo "ERROR AL EJECUTAR LA OPERACION LISTAR USUARIOS DEFINIDO COMO:".$e->getMessage();
            return null;
        }
    }

    /**
     * elimina un usuarios con username $prmUsername
     * @param string $prmUsername : identificador del usuario
     * @return int bandera 1= exito, 2=fracaso, -1=error
     */
    public function eliminarUsuario($prmUsername){
        try{
            $this->db->where('usuUsername',$prmUsername);
            $this->db->delete('usuario');
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERROR AL EJECUTAR LA OPERACION ELIMINARUSUARIO: ".$e->getMessage();
            return -1;
        }
    }
    /**
     * @param clsUsuario $prmUsuario : usuario que sera insertado;
     * @return int bandera 1= exito, 2=fracaso, 3=ya existe, -1=error
     */
    public function agregarUsuario(clsUsuario $prmUsuario){
        try{
            if($this->obtenerUsuario($prmUsuario->getUsername())){
                return 3;
            }
            $this->db->insert("usuario",["usuUsername"=> $prmUsuario->getUsername(),"usuNombre" => $prmUsuario->getNombre(), "usuPassword" => $prmUsuario->getNombre(), "usuRole" => $prmUsuario->getRole()]);
            return ($this->db->affected_rows() != 1)? 2: 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION AGRAGARUSURIO";
            return -1;
        }
    }
    /**
     * @param clsUsuario $prmUsuario : informacion de actualizacion
     * @return int bandera 1 = exito, 2 = no existe usuario, -1 error
     */
    public function actualizarUsuario(clsUsuario $prmUsuario){
        try{
            if($this->obtenerUsuario($prmUsuario->getUsername())==null){
                return 2;
            }
            $this->db->where('usuUsername',$prmUsuario->getUsername());
            $this->db->update('usuario',["usuUsername"=> $prmUsuario->getUsername(),"usuNombre" => $prmUsuario->getNombre(), "usuPassword" => $prmUsuario->getNombre(), "usuRole" => $prmUsuario->getRole()]);
            return 1;
        }catch(Exception $e){
            echo "SE HA PRODUCIDO UN ERRO AL EJECUTAR LA OPERACION ACTUALIZARUSUARIO".$e->getMessage();
            return -1;
        }
    }
}
