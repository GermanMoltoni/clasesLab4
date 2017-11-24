<?php
require_once './clases/Empleado.php';

class MDWVerificador{
    public function VerificarEmpleadoDup($request, $response, $next) {
        $data = $request->getParsedBody();
        $tipo = filter_var($data['tipo'], FILTER_SANITIZE_STRING);
        
        $nombre = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
        if(Empleado::GetByNombreTipo($nombre,$tipo) != false)
            return $response->withJson(array('error'=>'Empleado existente'),201);   
        return $next($request,$response);
   }

}

?>