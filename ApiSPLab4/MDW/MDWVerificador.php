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
}


?>