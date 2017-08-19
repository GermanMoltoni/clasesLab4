<?php
require_once './Clases/Rol.php';
require './vendor/autoload.php';
class RolApi extends Rol{
    public static function ListarApi($request, $response, $args){
        if(($id = $request->getAttribute('id')) != null){
            if(($user = parent::GetRolById($id)) != false)
                return $response->withJson($user,200);
            else
                return $response->withJson(array('msg'=>'No existe el rol'),201);
        }
        if(($lista = parent::Listar()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay roles cargados'),201);
    }
 
    public static function AltaApi($request, $response, $args) {
        $rol = $request->getAttribute('rol');
        $rol = new Rol($rol['descripcion']);
        if($rol->Alta())
            return $response->withJson(array('msg'=>'Creado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo crear el rol'),201);
        
    }
    public static function ModificarApi($request, $response, $args){
        $rol = $request->getAttribute('rol');
        $rol = new Rol($rol['descripcion'],$rol['id']);
        if($rol->Modificar())
            return $response->withJson(array('msg'=>'Modificado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo modificar el Rol'),201);
        
    }
    public static function BajaApi($request, $response, $args){
        $id = $request->getAttribute('id'); 
        if(parent::Baja($id))
            return $response->withJson(array('msg'=>'Borrado Correctamente'),200);
        return $response->withJson(array('msg'=>'No existe el Rol'),201);
        
    }
    
}
?>