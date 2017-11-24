<?php
require_once './clases/Empleado.php';
require_once './clases/AuthJWT.php';
class LoginApi{
    static function Login($request, $response, $args)
    {
        $datos = $request->getAttribute('empleado');
        if(($empleado = Empleado::Validar($datos['nombre'],$datos['tipo'],$datos['password'])) != false)
        {
                $token = AuthJWT::CrearToken($empleado);
                $newResponse = $response->withJson(array('empleado'=>$empleado,'token'=>$token),200);
                $newResponse->withHeader('Access-Control-Allow-Origin', 'http://localhost')
                            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                            ->withHeader('Access-Control-Allow-Methods',  'POST');
                return $newResponse;
        }   
        return $response->withJson(array('msg'=>'No se pudo iniciar sesion'),201);
    }
}
?>