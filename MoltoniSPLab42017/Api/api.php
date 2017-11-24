<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require './vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './MDW/MDWCors.php';
require_once './MDW/formMDW.php';
require_once './MDW/MDWVerificador.php';
require_once './MDW/MDWJwt.php';

require_once './clasesApi/EmpleadoApi.php';
require_once './clasesApi/LoginApi.php';

require_once './clases/Empleado.php';
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['determineRouteBeforeAppMiddleware'] = true;
$app = new \Slim\App(["settings" => $config]);
$app->add(\MWCORS::class . ':HabilitarCORS4200');
$app->post('/login',\LoginApi::class.':Login')->add(\FormMDW::class.':FormLogin');
$app->group('/empleado',function (){
    $this->post('', \EmpleadoApi::class .':AltaApi')
        ->add(\MDWVerificador::class.':VerificarEmpleadoDup')
        ->add(\FormMDW::class.':FormEmpleado');
    $this->get('/baja', \EmpleadoApi::class .':BajaApi')->add(\FormMDW::class.':GetId');
        
    $this->get('', \EmpleadoApi::class .':ListarApi')->add(\FormMDW::class.':GetParamId');//->add(\MDWJwt::class.':VerificarAcceso');;
    $this->post('/modificar', \EmpleadoApi::class .':ModificarApi')
        ->add(\FormMDW::class.':ModifFormUser');  
});

 
$app->run();