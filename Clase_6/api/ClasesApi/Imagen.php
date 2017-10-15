<?php
use Imagecow\Image;
require './vendor/autoload.php';
require_once './ClasesApi/UsuarioApi.php';
require_once './Clases/Archivo.php';
class Imagen extends Archivo{
    function SubirImagenUsuario($request, $response, $next){
        if(!$request->getAttribute('foto'))
            return $next($request,$response);
        $datos = $request->getParsedBody('user');
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $imagen = new Imagen($mail,'./Archivos','./Archivos/BackUp');
        $pathFoto = $imagen->CargarArchivo($request);
        return $next($request->withAttribute('path',$pathFoto),$response);
    }
    function ModificarImagenUsuario($request, $response, $next){
        $datos = $request->getParsedBody('user');
        $mail= filter_var($datos['mail'], FILTER_SANITIZE_STRING);
        $id= filter_var($datos['id'], FILTER_SANITIZE_STRING);
        $user = UsuarioApi::GetUsuarioPorId($id);
        if($user->mail != $mail && $user->path != null)
        {
            $imagen = new Imagen($mail,'./Archivos','./Archivos/BackUp',$user->path);
            $pathFoto = $imagen->ModificarArchivo();
            return $next($request->withAttribute('path',$pathFoto),$response);
        }
        if(!$request->getAttribute('foto'))
            return $next($request,$response);
        $imagen = new Imagen($mail,'./Archivos','./Archivos/BackUp');
        $pathFoto = $imagen->CargarArchivo($request);
        return $next($request->withAttribute('path',$pathFoto),$response);
    }
    function GetImagenUsuario($request, $response, $next){
        $data = $request->getAttribute('dataUser');
        $name = $data->path;
        if($name != null)
        {
                    $name = './Archivos/'.$data->path;

            $imagen = Image::fromFile($name)
          
	->format('png');
            return $response->withJson(array('imagen'=>$imagen->base64()));
        }
        return $response->withJson(array('imagen'=>'https://image.freepik.com/free-icon/male-user-shadow_318-34042.jpg'));
    }
}
?>