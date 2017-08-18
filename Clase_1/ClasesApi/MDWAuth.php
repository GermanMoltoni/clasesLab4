<?php
require_once './Clases/Usuario.php';
require_once './Clases/AuthJWT.php';
class AuthMDW{
    public static function VerificarUsuario($request, $response, $next){
        try{ 
            if(($token = $request->getHeader('token')) != null)
            {
                $token = $token[0];
                    AuthJWT::CheckToken($token);
                    $data = AuthJWT::GetData($token);
                    if(($user = Usuario::GetByUsuario($data->usuario)) != false && $user->habilitado == 1) 
                        return $next($request->withAttribute('user',$data),$response);
                    return  $response->withJson(array('msg'=>"Usuario No habilitado"),201);   
                        
            }
        }
        catch(Exception $e)
        {   
            return  $response->withJson(array('error'=>"Se requiere iniciar Sesion"));   
        }
    }
}

?>