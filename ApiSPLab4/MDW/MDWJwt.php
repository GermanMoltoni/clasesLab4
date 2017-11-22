<?php
require_once './clases/Usuario.php';
require_once './clases/AuthJWT.php';
class MDWJwt{
    public static function VerificarAcceso($request, $response, $next){
        $token = $request->getHeader('Authorization');
        $token = $token!= null?$token[0]:null;        
        try{ 
            AuthJWT::CheckToken($token);
            $data = AuthJWT::GetData($token);
            if(Usuario::VerificarEstado($data->id))
                return $next($request->withAttribute('usuario',$data),$response);
            return  $response->withJson(array('msg'=>"Usuario No habilitado"),201);   
        }
        catch(Exception $e)
        {   
            return  $response->withJson(array('error'=>"Se requiere iniciar Sesion"),201);   
        }
    }
}
?>