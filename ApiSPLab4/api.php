<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require './vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './MDW/MDWCors.php';
require_once './MDW/formMDW.php';
require_once './MDW/MDWVerificador.php';
require_once './MDW/MDWJwt.php';

require_once './clasesApi/UsuarioApi.php';
require_once './clasesApi/PersonaApi.php';
require_once './clasesApi/LoginApi.php';

require_once './clases/Usuario.php';
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['determineRouteBeforeAppMiddleware'] = true;
$app = new \Slim\App(["settings" => $config]);

$app->post('/login',\LoginApi::class.':Login')->add(\FormMDW::class.':FormLogin');
$app->get('/personasToken',\PersonaApi::class . ':ListarApi')->add(\MDWJwt::class.':VerificarAcceso')->add(\FormMDW::class.':GetParamId');
$app->group('/usuario',function (){
  $this->post('', \UsuarioApi::class .':AltaApi')
        ->add(\MDWVerificador::class.':VerificarUsuarioDup')
  ->add(\FormMDW::class.':FormUsuario');
  $this->get('', \UsuarioApi::class .':ListarApi')->add(\FormMDW::class.':GetParamId');
  
});

 
$app->run();