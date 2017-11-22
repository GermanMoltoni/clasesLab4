<?php
require_once './clases/Usuario.php';
require './vendor/autoload.php';
class UsuarioApi extends Usuario{
    public static function ListarApi($request, $response, $args){
        if(($id = $request->getAttribute('id')) != null){
            if(($usuario = parent::GetById($id)) != false)
                return $response->withJson($usuario,200);
            else
                return $response->withJson(array('msg'=>'No existe el usuario'),201);
        }
        if(($lista = parent::Listar()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay usuarios Cargados'),201);
    }
 
    public static function AltaApi($request, $response, $args) {
        $usuario_data = $request->getAttribute('usuario');
        $usuario = new Usuario($usuario_data['mail'],$usuario_data['password'],$usuario_data['usuario']);
        if($usuario->Alta())
            return $response->withJson(array('msg'=>'Creado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo crear el usuario'),201);
        
    }
    public static function ModificarApi($request, $response, $args){
        $usuario_data = $request->getAttribute('usuario');
        $usuario = new Usuario($usuario_data['mail'],$usuario_data['password'],$usuario_data['usuario'],$usuario_data['id']);
        if($usuario->Modificar())
            return $response->withJson(array('msg'=>'Modificado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo modificar el usuario'),201);
        
    }    
}
?>