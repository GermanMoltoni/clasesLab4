<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require "./ClasesApi/UsuarioApi.php";
require "./ClasesApi/FormMDW.php";
$config['displayErrorDetails'] = true;
 
require './vendor/autoload.php';
    
$app = new \Slim\App(["settings" => $config]);
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
$app->group('/usuario', function () {
    $this->post('', \UsuarioApi::class .':AltaApi')
                ->add(\FowmMDW::class.':FormUser');
    $this->post('/', \UsuarioApi::class .':ModificarApi')
                ->add(\FowmMDW::class.':ModifFormUser');
    $this->get('',\UsuarioApi::class . ':ListarApi')->add(\FowmMDW::class.':GetParamIdUsuario');
    $this->delete('', \UsuarioApi::class .':BajaApi')->add(\FowmMDW::class.':GetIdUsuario');
}); 
$app->run();
?>