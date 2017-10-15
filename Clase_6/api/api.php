<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$config['displayErrorDetails'] = true;
use Imagecow\Image;
require_once './ClasesApi/UsuarioApi.php';
require_once './ClasesApi/FormMDW.php';
require "./ClasesApi/Imagen.php";

require './vendor/autoload.php';
$app = new \Slim\App(["settings" => $config]);
$app->group('/usuario', function () {
    $this->post('', \UsuarioApi::class .':AltaApi')
            ->add(\Imagen::class.':SubirImagenUsuario')
            ->add(\FormMDW::class.':VerificarArchivo')
            ->add(\FormMDW::class.':FormUser');
    $this->delete('', \UsuarioApi::class .':BajaApi')->add(\FormMDW::class.':ParamGet');
    $this->post('/modify', \UsuarioApi::class .':ModificarApi')
            ->add(\Imagen::class.':ModificarImagenUsuario')
            ->add(\FormMDW::class.':VerificarArchivo')
            ->add(\FormMDW::class.':ModifFormUser');          
});
$app->post('/imagen',function ($request, $response, $args) {
         $file = $request->getUploadedFiles()['file']; 
        $ext =pathinfo($file->getClientFilename(),PATHINFO_EXTENSION);
        $file->moveTo('Archivos/'.$file->getClientFilename());
        $imagen = Image::fromFile('Archivos/'.$file->getClientFilename())
        
  ->format('png');
          return $response->withJson(array('imagen'=>$imagen->base64()));
        
    });
$app->run();











?>