<?php
require './vendor/autoload.php';
require_once './ClasesApi/PersonaApi.php';
require_once './Clases/Archivo.php';
class Imagen extends Archivo{
    function SubirImagen($request, $response, $next){
        if(!$request->getAttribute('foto'))
            return $next($request,$response);
        $datos = $request->getParsedBody('persona');
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $imagen = new Imagen($mail,'./Fotos','./Fotos/BackUp');
        $pathFoto = $imagen->CargarArchivo($request);
        return $next($request->withAttribute('pathFoto',$pathFoto),$response);
    }
    function Modificar($request, $response, $next){
        $datos = $request->getParsedBody('persona');
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $persona = PersonaApi::GetById($request->getAttribute('id'));
        if($persona != false && $persona->mail != $mail && $persona->pathFoto != null)
        {
            $imagen = new Imagen($mail,'./Fotos','./Fotos/BackUp',$persona->pathFoto);
            $pathFoto = $imagen->ModificarArchivo(); 
            if(!$request->getAttribute('foto'))
                return $next($request->withAttribute('pathFoto',$pathFoto),$response);
        }
        if(!$request->getAttribute('foto'))
            return $next($request,$response);
        $imagen = new Imagen($mail,'./Fotos','./Fotos/BackUp');
        $pathFoto = $imagen->CargarArchivo($request);
        return $next($request->withAttribute('pathFoto',$pathFoto),$response);
    }
    function GetByMail($request, $response, $args){
        $mail = filter_var($args['mail'], FILTER_SANITIZE_STRING);
        if($mail != null || $mail != ''){
            ;
            if(($persona = PersonaApi::GetByMail($mail)) != false )
            {
                if($persona->pathFoto != null)
                     self::GetArchivo('./Fotos/'.$persona->pathFoto);
                else
                    return $response->withJson(array('msg'=>'No se encontro ninguna foto'));
            }
            return $response->withJson(array('msg'=>'No se encontro usuario'));
        }    
    }
    
}
?>