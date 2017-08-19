<?php
require_once './Clases/Usuario.php';
class FormMDW{
public static function FormUser($request, $response, $next){
        $data = $request->getParsedBody();
        if(!isset($data['mail'],$data['nombre'],$data['apellido'],$data['usuario'],$data['password']))
            return $response->withJson(array('msg'=>'Faltan Datos'),201);
        $user_data=array();
        $user_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
        $user_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
        $user_data['apellido'] = filter_var($data['apellido'], FILTER_SANITIZE_STRING);
        $user_data['usuario'] = filter_var($data['usuario'], FILTER_SANITIZE_STRING);
        $user_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
        return $next($request->withAttribute('user',$user_data), $response);
}
public static function ModifFormUser($request, $response, $next){
        $data = $request->getParsedBody();
        if(!isset($data['id'],$data['mail'],$data['nombre'],$data['apellido'],$data['usuario'],$data['password']))
            return $response->withJson(array('msg'=>'Faltan Datos'),201);
        $user_data=array();
        $user_data['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
        $user_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
        $user_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
        $user_data['apellido'] = filter_var($data['apellido'], FILTER_SANITIZE_STRING);
        $user_data['usuario'] = filter_var($data['usuario'], FILTER_SANITIZE_STRING);
        $user_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
        return $next($request->withAttribute('user',$user_data), $response);
}

public static function FormLogin($request, $response, $next){
        $data = $request->getParsedBody();
        if(!isset($data['usuario'],$data['password']))
            return $response->withJson(array('msg'=>'Faltan Datos'),201);
        $user_data=array();
        $user_data['usuario'] = filter_var($data['usuario'], FILTER_SANITIZE_STRING);
        $user_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
        return $next($request->withAttribute('user',$user_data), $response);
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
public static function FormRol($request, $response, $next){
    $data = $request->getParsedBody();
    if(!isset($data['descripcion']))
        return $response->withJson(array('msg'=>'Faltan Datos'),201);
    $rol=array();
    $rol['descripcion'] = filter_var($data['descripcion'], FILTER_SANITIZE_STRING);
    return $next($request->withAttribute('rol',$rol), $response);
}
public static function ModifFormRol($request, $response, $next){
    $data = $request->getParsedBody();
    if(!isset($data['descripcion'],$data['id']))
        return $response->withJson(array('msg'=>'Faltan Datos'),201);
    $rol=array();
    $rol['descripcion'] = filter_var($data['descripcion'], FILTER_SANITIZE_STRING);
    $rol['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
    return $next($request->withAttribute('rol',$rol), $response);
}
}
?>