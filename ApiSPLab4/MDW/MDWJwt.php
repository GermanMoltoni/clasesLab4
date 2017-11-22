<?php
require_once './clases/Usuario.php';
require_once './clases/AuthJWT.php';
class MDWJwt{
    public static function VerificarAcceso($request, $response, $next){
        $token = $request->getHeader('Authorization');
        $token = $token[0];        
        try{ 
            AuthJWT::CheckToken($token);
            $data = AuthJWT::GetData($token);
            if(Usuario::VerificarEstado($data->id))
                return $next($request->withAttribute('persona',$data),$response);
            return  $response->withJson(array('msg'=>"Persona No habilitada"),201);   
        }
        catch(Exception $e)
        {   
            return  $response->withJson(array('error'=>"Se requiere iniciar Sesion"));   
        }
    }
}
?>