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
  /*  $this->get('/listar',\UserApi::class . ':ListaUserApi');
    $this->get('/listarLogs', \UserApi::class .':ListaLogUserApi')
                ->add(\AuthUser::class.':verificarFormTiempo');
    $this->delete('/baja', \UserApi::class .':BajaUserApi')
                ->add(\AuthUser::class.':verificarUsuario');
    $this->put('/suspender', \UserApi::class .':SuspenderUserApi')
                ->add(\AuthUser::class.':verificarUsuario');
    $this->put('/habilitar', \UserApi::class .':HabilitarUserApi')
                ->add(\AuthUser::class.':verificarUsuario');*/
    $this->post('', \UsuarioApi::class .':AltaApi')
                ->add(\FowmMDW::class.':FormUser');
   /* $this->post('/modificar', \UserApi::class .':ModificarUsuarioApi')
                ->add(\Imagen::class.':ModificarImagenUsuario')
                ->add(\AuthUser::class.':ModifFormUser');*/
});//->add(\AuthUser::class.':admin');
/*$app->post('/login',\UserApi::class . ':LoginUserApi')
                ->add(\AuthUser::class.':VerificarFormLogin')
                ->add(\AuthUser::class.':login');
$app->get('/logout',\UserApi::class  .':LogoutUserApi')
                ->add(\AuthUser::class.':users');
*/
$app->run();
?>