<?php
require_once './Clases/Usuario.php';
require './vendor/autoload.php';
class UsuarioApi extends Usuario{
    public static function ListarApi($request, $response, $args){
        if(($lista = parent::ListarUsuarios()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay usuarios Cargados'),201);
    }
    public static function HabilitarApi($request, $response, $args) {
            $id = $request->getAttribute('id'); 
            $id = filter_var($id, FILTER_SANITIZE_STRING);
            if(parent::BajaLogica($id))
                return $response->withJson(array('msg'=>'Usuario Habilitado'),200);
            else
                return $response->withJson(array('error'=>'No se pudo Habilitar el usuario'),201);
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
    
}
?>