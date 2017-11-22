<?php
class FormMDW{
    public static function FormPersona($request, $response, $next){
             $data = $request->getParsedBody();
            if(!isset($data['nombre'],$data['apellido'],$data['sexo'],$data['direccion'],$data['latitud'],$data['longitud']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $persona_data=array();
            $persona_data['apellido'] = filter_var($data['apellido'], FILTER_SANITIZE_STRING);
            $persona_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
            $persona_data['sexo'] = filter_var($data['sexo'], FILTER_SANITIZE_STRING);
            $persona_data['latitud'] = filter_var($data['latitud'], FILTER_SANITIZE_STRING);
            $persona_data['longitud'] = filter_var($data['longitud'], FILTER_SANITIZE_STRING);
            $persona_data['direccion'] = filter_var($data['direccion'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('persona',$persona_data), $response);
    }
    public static function ModifFormPersona($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['id'],$data['nombre'],$data['apellido'],$data['sexo'],$data['direccion'],$data['latitud'],$data['longitud']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $persona_data=array();
            $persona_data['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
            $persona_data['apellido'] = filter_var($data['apellido'], FILTER_SANITIZE_STRING);
            $persona_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
            $persona_data['sexo'] = filter_var($data['sexo'], FILTER_SANITIZE_STRING);
            $persona_data['latitud'] = filter_var($data['latitud'], FILTER_SANITIZE_STRING);
            $persona_data['longitud'] = filter_var($data['longitud'], FILTER_SANITIZE_STRING);
            $persona_data['direccion'] = filter_var($data['direccion'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('persona',$persona_data), $response);
    }
    public static function ModifFormUsuario($request, $response, $next){
        $data = $request->getParsedBody();
        if(!isset($data['id'],$data['mail'],$data['usuario'],$data['password']))
            return $response->withJson(array('msg'=>'Faltan Datos'),201);
        $user_data=array();
        $user_data['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
        $user_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
        $user_data['usuario'] = filter_var($data['usuario'], FILTER_SANITIZE_STRING);
        $user_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
        return $next($request->withAttribute('usuario',$user_data), $response);
}
    public static function FormLogin($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['mail'],$data['password']))
                return $response->withJson(array('msg'=>'Faltan Datos'),411);
            $usuario_data=array();
            $usuario_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
            $usuario_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('usuario',$usuario_data), $response);
    }
    public static function GetParamId($request, $response, $next){
            if(($id = $request->getParam('id')) != null)
                return $next($request->withAttribute('id',filter_var($id, FILTER_SANITIZE_STRING)), $response);
            return $next($request, $response);
    }
    public static function GetId($request, $response, $next){
            if(($id = $request->getParam('id')) != null)
                return $next($request->withAttribute('id',$id), $response);
            return $response->withJson(array('msg'=>'Faltan Datos'),201);
    }
    public static function FormUsuario($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['usuario'],$data['mail'],$data['password']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $usuario_data=array();
            $usuario_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
            $usuario_data['usuario'] = filter_var($data['usuario'], FILTER_SANITIZE_STRING);
            $usuario_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
           
            return $next($request->withAttribute('usuario',$usuario_data), $response);
    }
}
?>