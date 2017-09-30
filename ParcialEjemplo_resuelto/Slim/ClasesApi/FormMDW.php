<?php
require_once './Clases/Persona.php';
class FormMDW{
    public static function FormPersona($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['mail'],$data['nombre'],$data['sexo'],$data['password']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $persona_data=array();
            $persona_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
            $persona_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
            $persona_data['sexo'] = filter_var($data['sexo'], FILTER_SANITIZE_STRING);
            $persona_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('persona',$persona_data), $response);
    }
    public static function ModifFormPersona($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['id'],$data['mail'],$data['nombre'],$data['sexo'],$data['password']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $persona_data=array();
            $persona_data['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
            $persona_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
            $persona_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
            $persona_data['sexo'] = filter_var($data['sexo'], FILTER_SANITIZE_STRING);
            $persona_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('persona',$persona_data), $response);
    }

    public static function FormLogin($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['mail'],$data['password']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $persona_data=array();
            $persona_data['mail'] = filter_var($data['mail'], FILTER_SANITIZE_STRING);
            $persona_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('persona',$persona_data), $response);
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
}
?>