<?php
class FormMDW{

    public static function ModifFormEmpleado($request, $response, $next){
        $data = $request->getParsedBody();
        if(!isset($data['id'],$data['nombre'],$data['password'],$data['legajo'],$data['tipo'],$data['edad'],$data['pathFoto']))
            return $response->withJson(array('msg'=>'Faltan Datos'),201);
        $empleado_data=array();
        $empleado_data['id'] = filter_var($data['id'], FILTER_SANITIZE_STRING);
        $empleado_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
        $empleado_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
        
        $empleado_data['legajo'] = filter_var($data['legajo'], FILTER_SANITIZE_STRING);
        $empleado_data['tipo'] = filter_var($data['tipo'], FILTER_SANITIZE_STRING);
        $empleado_data['edad'] = filter_var($data['edad'], FILTER_SANITIZE_STRING);
        $empleado_data['pathFoto'] = filter_var($data['pathFoto'], FILTER_SANITIZE_STRING);
        
        return $next($request->withAttribute('empleado',$empleado_data), $response);
}
    public static function FormLogin($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['nombre'],$data['tipo'],$data['password']))
                return $response->withJson(array('msg'=>'Faltan Datos'),411);
            $empleado_data=array();
            $empleado_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
            $empleado_data['tipo'] = filter_var($data['tipo'], FILTER_SANITIZE_STRING);
            $empleado_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            
            return $next($request->withAttribute('empleado',$empleado_data), $response);
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
    public static function FormEmpleado($request, $response, $next){
            $data = $request->getParsedBody();
            if(!isset($data['nombre'],$data['password'],$data['legajo'],$data['edad'],$data['tipo'],$data['pathFoto']))
                return $response->withJson(array('msg'=>'Faltan Datos'),201);
            $empleado_data=array();
            $empleado_data['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
            $empleado_data['legajo'] = filter_var($data['legajo'], FILTER_SANITIZE_STRING);
            $empleado_data['tipo'] = filter_var($data['tipo'], FILTER_SANITIZE_STRING);
            $empleado_data['edad'] = filter_var($data['edad'], FILTER_SANITIZE_STRING);
            $empleado_data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
            $empleado_data['pathFoto'] = filter_var($data['pathFoto'], FILTER_SANITIZE_STRING);
            return $next($request->withAttribute('empleado',$empleado_data), $response);
    }
}
?>