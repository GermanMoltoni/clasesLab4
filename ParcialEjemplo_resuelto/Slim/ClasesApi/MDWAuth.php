<?php
require_once './Clases/Persona.php';
require_once './Clases/AuthJWT.php';
class AuthMDW{
    public static function VerificarPersona($request, $response, $next){
        try{ 
            if(($token = $request->getHeader('token')) != null)
            {
                $token = $token[0];
                    AuthJWT::CheckToken($token);
                    $data = AuthJWT::GetData($token);
                    if(($persona = Usuario::GetByMail($data->usuario)) != false && $persona->habilitado == 1) 
                        return $next($request->withAttribute('persona',$data),$response);
                    return  $response->withJson(array('msg'=>"Persona No habilitada"),201);   
            }
            throw new Exception();
        }
        catch(Exception $e)
        {   
            return  $response->withJson(array('error'=>"Se requiere iniciar Sesion"));   
        }
    }
    

}

?>