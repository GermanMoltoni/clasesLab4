<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require "./ClasesApi/UsuarioApi.php";
require "./ClasesApi/MDWAuth.php";

require "./ClasesApi/LoginApi.php";

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
                ->add(\FormMDW::class.':FormUser');
    $this->post('/', \UsuarioApi::class .':ModificarApi')
                ->add(\FormMDW::class.':ModifFormUser');
    $this->get('',\UsuarioApi::class . ':ListarApi')->add(\FormMDW::class.':GetParamIdUsuario');
    $this->delete('', \UsuarioApi::class .':BajaApi')->add(\FormMDW::class.':GetIdUsuario');
})->add(\AuthMDW::class.':VerificarUsuario'); 


$app->post('/login',\LoginApi::class.':LoginUserApi')->add(\FormMDW::class.':FormLogin');

$app->run();
?>