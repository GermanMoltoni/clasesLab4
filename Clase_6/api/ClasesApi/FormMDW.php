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
static function ParamGet($request, $response, $next){
    if(($data = $request->getParam('id')) != null)
        return $next($request->withAttribute('id',$data), $response);
    return $response->withJson(array('msg'=>"Faltan datos"),201);   
 }

static function VerificarArchivo($request, $response, $next){
    $retorno = Archivo::VerificarArchivo($request);
    if(is_array($retorno))
        return $response->withJson($retorno,201);  
    return $next($request->withAttribute('foto',$retorno),$response);  
}
}
?>