<?php
    require_once "./clases/AccesoDatos.php";
    class Usuario
    {
        public $id;
        public $mail;
        public $password;
        public $usuario;
        public $habilitado;
        public function __construct($mail=NULL,$password=NULL,$usuario=NULL,$id=NULL,$habilitado=NULL){
            if($mail !== NULL && $password !==NULL  && $usuario !==NULL){
                 $this->password = $password;
                $this->id = $id;
                $this->mail = $mail;
                $this->usuario = $usuario;
                $this->habilitado = $habilitado;
             }
        }
        function Alta(){
            if (self::GetByUsuario($this->usuario) == false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
		        $consulta = $objDB->RetornarConsulta("INSERT INTO `usuarios`(`mail`,`password`, `habilitado`,`usuario`) VALUES (:mail, :password, :habilitado,:usuario)");
                $consulta->bindValue(':password',md5($this->password), PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':habilitado',true, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                return $consulta->execute();  
            }
            return false;
        }
        static function CambiarEstado($id)
        {
            if (($user = self::GetById($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                $consulta = $objDB->RetornarConsulta("UPDATE `usuarios` SET `habilitado` = :habilitado WHERE `id` = :id");
		        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
                $consulta->bindValue(':habilitado',!$user->habilitado, PDO::PARAM_STR);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Baja($id)
        {
            if (($user = self::GetById($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                $consulta = $objDB->RetornarConsulta("UPDATE `usuarios` SET `habilitado` = :habilitado WHERE `id` = :Id");
		        $consulta->bindValue(':Id',$id, PDO::PARAM_INT);
                $consulta->bindValue(':habilitado',false, PDO::PARAM_STR);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Listar(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,usuario,id,habilitado FROM usuarios");
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno;
        }
        static function GetById($id)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,usuario,id,habilitado FROM usuarios WHERE id = :id ");
		    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        static function GetByUsuario($usuario){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,password,usuario,id,habilitado FROM usuarios WHERE usuario=:usuario");
		    $consulta->bindValue(':usuario',$usuario, PDO::PARAM_STR);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"usuario");
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        static function GetByMail($mail){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,password,usuario,id,habilitado FROM usuarios WHERE mail=:mail");
		    $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"usuario");
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
         function Modificar(){
            if (($user = self::GetById($this->id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
                $consulta = $objDB->RetornarConsulta("UPDATE `usuarios` SET `mail`=:mail,`password`=:password,`usuario`=:usuario WHERE id=:id");
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
                return $consulta->execute();
            }
            return false;
        }
        static function Validar($mail,$password){
            $usuario = self::GetByMail($mail);
            if($usuario != false){
                if($usuario->password == $password && $usuario->habilitado)
                    return self::GetById($usuario->id);
            }
            return false;
        }
        static function VerificarEstado($id){
            return (self::GetById($id))->habilitado == 1;     
        }
    }
?>