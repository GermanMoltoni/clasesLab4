<?php
require_once './clases/Usuario.php';
require_once './clases/AuthJWT.php';
class LoginApi{
    static function Login($request, $response, $args)
    {
        $datos = $request->getAttribute('usuario');
        if(($usuario = Usuario::Validar($datos['mail'],md5($datos['password']))) != false)
        {
                $token = AuthJWT::CrearToken($usuario);
                $newResponse = $response->withJson(array('usuario'=>$usuario,'token'=>$token),200);
                $newResponse->withHeader('Access-Control-Allow-Origin', 'http://localhost')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods',  'POST');
                return $newResponse;
        }   
        return $response->withJson(array('msg'=>'No se pudo iniciar sesion'),201);
    }
}
?>