<?php
require_once './clases/Empleado.php';
require_once './clases/AuthJWT.php';
class MDWJwt{
    public static function VerificarAcceso($request, $response, $next){
        $token = $request->getHeader('Authorization');
        $token = $token!= null?$token[0]:null;        
        try{ 
            $token =trim(trim($token,'Bearer'));
            AuthJWT::CheckToken($token);
            $data = AuthJWT::GetData($token);
            return $next($request->withAttribute('empleado',$data),$response);
        }
        catch(Exception $e)
        {   
            return  $response->withJson(array('error'=>$e),201);   
        }
    }
}
?>