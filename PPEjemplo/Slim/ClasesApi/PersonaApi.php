<?php
require_once './Clases/Persona.php';
require './vendor/autoload.php';
class PersonaApi extends Persona{
    public static function ListarApi($request, $response, $args){
        if(($id = $request->getAttribute('id')) != null){
            if(($persona = parent::GetById($id)) != false)
                return $response->withJson($persona,200);
            else
                return $response->withJson(array('msg'=>'No existe la Persona'),201);
        }
        if(($lista = parent::Listar()) != false)   
            return $response->withJson($lista,200);
        return $response->withJson(array('msg'=>'No hay Personas Cargadas'),201);
    }
 
    public static function AltaApi($request, $response, $args) {
        $persona_data = $request->getAttribute('persona');
        $persona = new Persona($persona_data['mail'],$persona_data['nombre'],$persona_data['sexo'],$persona_data['password']);
        $persona->pathFoto = $persona_data['pathFoto'];
        if($persona->Alta())
            return $response->withJson(array('msg'=>'Creado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo crear la persona'),201);
        
    }
    public static function ModificarApi($request, $response, $args){
        $persona_data = $request->getAttribute('persona');
        $persona = new Persona($persona_data['mail'],$persona_data['nombre'],$persona_data['sexo'],$persona_data['password'],$persona_data['id']);
        if($persona_data['pathFoto']!= null)
            $persona->pathFoto = $persona_data['pathFoto'];
        if($persona->Modificar())
            return $response->withJson(array('msg'=>'Modificado Correctamente'),200);
        return $response->withJson(array('msg'=>'No se pudo modificar la persona'),201);
        
    }
    public static function BajaApi($request, $response, $args){
        $id = $request->getAttribute('id'); 
        if(parent::Baja($id))
            return $response->withJson(array('msg'=>'Borrado Correctamente'),200);
        return $response->withJson(array('msg'=>'No existe la persona'),201);
        
    }
    
}
?>