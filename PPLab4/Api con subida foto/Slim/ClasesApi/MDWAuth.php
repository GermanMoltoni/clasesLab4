<?php
require_once './Clases/Persona.php';
require_once './Clases/AuthJWT.php';
class AuthMDW{
    public static function VerificarAcceso($request, $response, $next){
        try{ 
            if(($token = $request->getHeader('token')) != null)
            {
                $token = $token[0];
                    AuthJWT::CheckToken($token);
                    $data = AuthJWT::GetData($token);
                    if(($persona = Persona::GetByMail($data->usuario)) != false && $persona->habilitado == 1) 
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
    public function VerificarPersona($request, $response, $next){
        $data = $request->getParsedBody();
        if(isset($data['id']))
            $id = filter_var($data['id'], FILTER_SANITIZE_STRING);
        elseif($request->getParam('id') != null){
            $id = filter_var($request->getParam('id'), FILTER_SANITIZE_STRING);
        }
        else
            return $response->withJson(array('error'=>'Dato incorrecto'),201);
        if(($persona = Persona::GetById($id)) == false)
            return $response->withJson(array('error'=>'Persona no existe'),201); 
        return $next($request->withAttribute('id',$persona->id),$response);
   }

    public function VerificarPersonaDup($request, $response, $next) {
        $data = $request->getParsedBody();
        $mail = filter_var($data['mail'], FILTER_SANITIZE_STRING);
        if(Persona::GetByMail($mail) != false)
            return $response->withJson(array('error'=>'Persona existente'),201);   
        return $next($request,$response);
   }

   public static function VerificarModifPersona($request, $response, $next){
        if(($persona = Persona::GetByMail($request->getAttribute('persona')['mail'])) != false)
        {
            if($persona->id != $request->getAttribute('id'))
                return $response->withJson(array('error'=>'Otra Persona tiene el mismo mail'),201);
        }
        return $next($request,$response);
    }   

    static function VerificarArchivo($request, $response, $next){
        $retorno = Archivo::VerificarArchivo($request);
        if(is_array($retorno))
            return $response->withJson($retorno,201);  
        return $next($request->withAttribute('foto',$retorno),$response);  
    }
    

}

?>