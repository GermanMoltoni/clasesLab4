<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require "./ClasesApi/PersonaApi.php";
require "./ClasesApi/MDWAuth.php";
require "./ClasesApi/LoginApi.php";
require "./ClasesApi/FormMDW.php";
require "./ClasesApi/Imagen.php";
$config['displayErrorDetails'] = true;
require "./MDWCORS.php";
require './vendor/autoload.php';
    
$app = new \Slim\App(["settings" => $config]);
$app->add(\MWparaCORS::class.':HabilitarCORS4200');
$app->group('/persona', function () {
    $this->post('', \PersonaApi::class .':AltaApi')
        ->add(\Imagen::class.':SubirImagen')
        ->add(\AuthMDW::class.':VerificarArchivo')
        ->add(\AuthMDW::class.':VerificarPersonaDup')
        ->add(\FormMDW::class.':FormPersona');
    $this->post('/', \PersonaApi::class .':ModificarApi')
        ->add(\Imagen::class.':Modificar')
        ->add(\AuthMDW::class.':VerificarArchivo')
        ->add(\AuthMDW::class.':VerificarModifPersona')
        ->add(\AuthMDW::class.':VerificarPersona')
        ->add(\FormMDW::class.':ModifFormPersona');
    $this->delete('', \PersonaApi::class .':BajaApi')->add(\AuthMDW::class.':VerificarPersona')->add(\FormMDW::class.':GetId');
    $this->get('',\PersonaApi::class . ':ListarApi')->add(\FormMDW::class.':GetParamId');
    $this->get('/{mail}',\Imagen::class.':GetByMail');
    
});//->add(\AuthMDW::class.':VerificarAcceso'); 
$app->post('/login',\LoginApi::class.':LoginPersonaApi')->add(\FormMDW::class.':FormLogin');

$app->run();
?>