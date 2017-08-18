<?php
require_once './Clases/Usuario.php';
require './vendor/autoload.php';
class UsuarioApi extends Usuario{
    public static function ListarApi($request, $response, $args){
        if(($id = $request->getAttribute('id')) != null){
            if(($user = parent::GetUsuarioPorId($id)) != false)
                return $response->withJson($user,200);
            else
                return $response->withJson(array('msg'=>'No existe el usuario'),201);
        }
        if(($lista = parent::Listar()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay usuarios Cargados'),201);
    }
 
    public static function AltaApi($request, $response, $args) {
        $user_data = $request->getAttribute('user');
        $user = new Usuario($user_data['mail'],$user_data['nombre'],$user_data['apellido'],$user_data['password'],$user_data['usuario']);
        if($user->Alta())
            return $response->withJson(array('msg'=>'Creado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo crear el usuario'),201);
        
    }
    public static function ModificarApi($request, $response, $args){
        $user_data = $request->getAttribute('user');
        $user = new Usuario($user_data['mail'],$user_data['nombre'],$user_data['apellido'],$user_data['password'],$user_data['usuario'],$user_data['id']);
        if($user->Modificar())
            return $response->withJson(array('msg'=>'Modificado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo crear el usuario'),201);
        
    }
    public static function BajaApi($request, $response, $args){
        $id = $request->getAttribute('id'); 
        if(parent::Baja($id))
            return $response->withJson(array('msg'=>'Borrado Correctamente'),200);
        return $response->withJson(array('msg'=>'No existe el usuario'),201);
        
    }
    
}
?>