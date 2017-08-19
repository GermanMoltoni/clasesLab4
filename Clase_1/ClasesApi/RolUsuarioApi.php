<?php
require_once './Clases/RolUsuario.php';
require_once './Clases/Usuario.php';
require_once './Clases/Rol.php';
require './vendor/autoload.php';
class RolUsuarioApi extends RolUsuario{




    public static function ListarApi($request, $response, $args){
        if(($id = $request->getAttribute('id')) != null){
            if(($roles = parent::GetRolUsuarioByIdUsuario($id)) != false)
                return $response->withJson($roles,200);
            else
                return $response->withJson(array('msg'=>'No hay roles Cargados'),201);
        }
        if(($lista = parent::Listar()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay roles Cargados'),201);
    }
 
    public static function AltaApi($request, $response, $args) {
        $data = $request->getAttribute('rol');
        if(Usuario::GetUsuarioPorId($data['id_usuario']) != false && Rol::GetRolById($data['id_rol']) !=false){
            $rol = new RolUsuario($data['id_usuario'],$data['id_rol']);
            if($rol->Alta())
                return $response->withJson(array('msg'=>'Creado Correctamente'),200);
            return $response->withJson(array('msg'=>'Rol Existente para el Usuario'),201);
        }
        return $response->withJson(array('msg'=>'No se cargar el rol para el usuario'),201);
        
    }
    public static function ModificarApi($request, $response, $args){
        $data = $request->getAttribute('rol');
        if(Usuario::GetUsuarioPorId($data['id_usuario']) != false && Rol::GetRolById($data['id_rol']) !=false){
            $rol = new RolUsuario($data['id_usuario'],$data['id_rol'],$data['id']);
            if($rol->Modificar())
                return $response->withJson(array('msg'=>'Modificado Correctamente'),200);
            return $response->withJson(array('msg'=>'El rol para el usuario no existe'),201);
                
        }
        return $response->withJson(array('msg'=>'No se Modifico el rol para el usuario'),201);
        
    }
    public static function BajaApi($request, $response, $args){
        $id = $request->getAttribute('id'); 
        if(parent::Baja($id))
            return $response->withJson(array('msg'=>'Borrado Correctamente'),200);
        return $response->withJson(array('msg'=>'No existe el rol del usuario'),201);
        
    }
    
}
?>