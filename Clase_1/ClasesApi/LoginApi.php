<?php
require_once './Clases/Usuario.php';
require_once './Clases/AuthJWT.php';

class LoginApi{
    static function LoginUserApi($request, $response, $args)
    {
        $datos = $request->getAttribute('user');
        if(($user = Usuario::GetByUsuario($datos['usuario'])) != false)
        {
            if($user->password == $datos['password'] && $user->habilitado == 1){
                $user = Usuario::GetUsuarioPorId($user->id);
                $token = AuthJWT::CrearToken($user);
                return $response->withJson(array('user'=>$user,'token'=>$token),200);
            }   
        }
        return $response->withJson(array('msg'=>'No se pudo iniciar sesion'),201);
    }
}


?>