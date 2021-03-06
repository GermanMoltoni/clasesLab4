<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require "./ClasesApi/PersonaApi.php";
require "./ClasesApi/MDWAuth.php";
require "./ClasesApi/LoginApi.php";
require "./ClasesApi/FormMDW.php";
 $config['displayErrorDetails'] = true;
require "./MDWCORS.php";
require './vendor/autoload.php';
    
$app = new \Slim\App(["settings" => $config]);
$app->add(\MWparaCORS::class.':HabilitarCORS4200');
$app->group('/persona', function () {
    $this->post('', \PersonaApi::class .':AltaApi')
        ->add(\AuthMDW::class.':VerificarPersonaDup')
        ->add(\FormMDW::class.':FormPersona');
    $this->post('/', \PersonaApi::class .':ModificarApi')
        ->add(\AuthMDW::class.':VerificarModifPersona')
        ->add(\AuthMDW::class.':VerificarPersona')
        ->add(\FormMDW::class.':ModifFormPersona');
    $this->delete('', \PersonaApi::class .':BajaApi')->add(\AuthMDW::class.':VerificarPersona')->add(\FormMDW::class.':GetId');
    $this->get('',\PersonaApi::class . ':ListarApi')->add(\FormMDW::class.':GetParamId');
     
});//->add(\AuthMDW::class.':VerificarAcceso'); 
$app->post('/login',\LoginApi::class.':LoginPersonaApi')->add(\FormMDW::class.':FormLogin');

$app->run();
?>