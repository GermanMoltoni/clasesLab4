<?php
class LoginApi{
    static function LoginUserApi($request, $response, $args)
    {
        $datos = $request->getAttribute('user');
        if(($user = Usuario::GetByUsuario($datos['usuario'])) == false)
        {
            if(!($user->password == md5($datos['password']) && $user->habilitado == 1))
                return $response->withJson(array('msg'=>'No se pudo iniciar sesion'),201);
            else{
                $user = Usuario::GetUsuarioPorId($user->id);
                $token = AuthJWT::CrearToken($user);
                return $response->withJson(array('user'=>$user,'token'=>$token),200);
            }   
        }
    }
}


?>