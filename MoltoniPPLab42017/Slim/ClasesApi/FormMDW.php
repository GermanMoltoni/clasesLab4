<?php
require_once './Clases/Persona.php';
class FormMDW{
    public static function FormPizza($request, $response, $next){
        echo json_encode($request->getParsedBody());
            $data = $request->getParsedBody();
            if(!isset($data['sabor'],$data['tipo'],$data['cantidad'],$data['pathFoto']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $pizza_data=array();
            $pizza_data['sabor'] = filter_var($data['sabor'], FILTER_SANITIZE_STRING);
            $pizza_data['tipo'] = filter_var($data['tipo'], FILTER_SANITIZE_STRING);
            $pizza_data['cantidad'] = filter_var($data['cantidad'], FILTER_SANITIZE_STRING);
            $pizza_data['pathFoto'] = filter_var($data['pathFoto'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('pizza',$pizza_data), $response);
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