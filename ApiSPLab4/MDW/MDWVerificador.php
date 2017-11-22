<?php
require_once './clases/Usuario.php';

class MDWVerificador{
    public function VerificarUsuarioDup($request, $response, $next) {
        $data = $request->getParsedBody();
        $mail = filter_var($data['mail'], FILTER_SANITIZE_STRING);
        if(Usuario::GetByMail($mail) != false)
            return $response->withJson(array('error'=>'Usuario existente'),201);   
        return $next($request,$response);
   }

public function VerificarPersonaDup($request, $response, $next) {
    $data = $request->getParsedBody();
    $latitud = filter_var($data['latitud'], FILTER_SANITIZE_STRING);
    $longitud = filter_var($data['longitud'], FILTER_SANITIZE_STRING);
    if(Persona::GetByCoordenadas($latitud,$longitud) != false)
        return $response->withJson(array('error'=>'Persona existente'),201);   
    return $next($request,$response);
}
}

?>