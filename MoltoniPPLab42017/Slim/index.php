<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require "./ClasesApi/PizzaApi.php";
require "./ClasesApi/FormMDW.php";
 $config['displayErrorDetails'] = true;
require "./MDWCORS.php";
require './vendor/autoload.php';
    
$app = new \Slim\App(["settings" => $config]); 
$app->add(\MWparaCORS::class.':HabilitarCORS4200');
$app->group('/pizza', function () {
    $this->get('/alta', \PizzaApi::class .':AltaApi')
        ->add(\FormMDW::class.':FormPizza');
    $this->delete('', \PizzaApi::class .':BajaApi')->add(\FormMDW::class.':GetId');
    $this->get('',\PizzaApi::class . ':ListarApi')->add(\FormMDW::class.':GetParamId');
     
});

$app->run();
?>