<?php
require_once './Clases/Pizza.php';
require './vendor/autoload.php';
class PizzaApi extends Pizza{
    public static function ListarApi($request, $response, $args){
        if(($id = $request->getAttribute('id')) != null){
            if(($pizza = parent::GetById($id)) != false)
                return $response->withJson($pizza,200);
            else
                return $response->withJson(array('msg'=>'No existe la Pizza'),201);
        }
        if(($lista = parent::Listar()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay Pizzas Cargadas'),201);
    }
 
    public static function AltaApi($request, $response, $args) {
        $pizza_data = $request->getAttribute('pizza');
        $pizza = new Pizza($pizza_data['sabor'],$pizza_data['tipo'],$pizza_data['cantidad'],$pizza_data['pathFoto']);
        if($pizza->Alta())
            return $response->withJson(array('msg'=>'Creado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo crear la pizza'),201);
        
    }
    public static function BajaApi($request, $response, $args){
        $id = $request->getAttribute('id'); 
        if(parent::Baja($id))
            return $response->withJson(array('msg'=>'Borrado Correctamente'),200);
        return $response->withJson(array('msg'=>'No existe la pizza'),201);
        
    }
    
}
?>