<?php
require_once './Clases/Persona.php';
require_once './Clases/AuthJWT.php';

class LoginApi{
    static function LoginPersonaApi($request, $response, $args)
    {
        $datos = $request->getAttribute('persona');
        if(($persona = Persona::GetByMail($datos['persona'])) != false)
        {
            if($persona->password == $datos['password'] && $persona->habilitado == 1){
                $persona = Usuario::GetUsuarioPorId($persona->id);
                $token = AuthJWT::CrearToken($persona);
                return $response->withJson(array('persona'=>$persona,'token'=>$token),200);
            }   
        }
        return $response->withJson(array('msg'=>'No se pudo iniciar sesion'),201);
    }
}


?>