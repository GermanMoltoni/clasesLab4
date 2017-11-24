<?php
require_once './clases/Empleado.php';
require './vendor/autoload.php';
class EmpleadoApi extends Empleado{
    public static function ListarApi($request, $response, $args){
        if(($id = $request->getAttribute('id')) != null){
            if(($empleado = parent::GetById($id)) != false)
                return $response->withJson($empleado,200);
            else
                return $response->withJson(array('msg'=>'No existe el empleado'),201);
        }
        if(($lista = parent::Listar()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay empleados Cargados'),201);
    }
 
    public static function AltaApi($request, $response, $args) {
        $empleado_data = $request->getAttribute('empleado');
        $empleado = new Empleado($empleado_data['nombre'],$empleado_data['password'],$empleado_data['legajo'],$empleado_data['tipo'],$empleado_data['edad'],$empleado_data['pathFoto']);
        if($empleado->Alta())
            return $response->withJson(array('msg'=>'Creado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo crear el empleado'),201);
        
    }
    public static function ModificarApi($request, $response, $args){
        $empleado_data = $request->getAttribute('usuario');
        $empleado = new Empleado($empleado_data['nombre'],$empleado_data['password'],$empleado_data['legajo'],$empleado_data['tipo'],$empleado_data['edad'],$empleado_data['pathFoto'],$empleado_data['id']);
        if($usuario->Modificar())
            return $response->withJson(array('msg'=>'Modificado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo modificar el empleado'),201);
        
    }    
    public static function BajaApi($request, $response, $args){
        $id = $request->getAttribute('id'); 
        if(($empleado = parent::GetById($id)) != false && parent::Baja($id))
            return $response->withJson(array('msg'=>'Borrado Correctamente'),200);
        return $response->withJson(array('msg'=>'No existe el empleado'),201);
        
    }
}
?>