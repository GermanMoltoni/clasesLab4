<?php
    require_once "./Clases/AccesoDatos.php";
    class Usuario
    {
        public $id;
        public $mail;
        public $nombre;
        public $apellido;
        public $password;
        public $usuario;
        public $habilitado;
        public $path;
        public function __construct($mail=NULL,$nombre=NULL,$apellido=NULL,$password=NULL,$usuario=NULL,$path=NULL,$id=NULL,$habilitado=NULL){
            if($mail !== NULL && $nombre !==NULL && $apellido !==NULL && $password !==NULL  && $usuario !==NULL){
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->password = $password;
                $this->id = $id;
                $this->mail = $mail;
                $this->usuario = $usuario;
                $this->habilitado = $habilitado;
                $this->path = $path;
                
             }
        }
        function Alta(){
            if (self::GetByUsuario($this->usuario) == false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
		        $consulta = $objDB->RetornarConsulta("INSERT INTO `usuarios`(`mail`,`nombre`, `apellido`,`password`, `habilitado`,`usuario`,`path`) VALUES (:mail, :nombre, :apellido, :password, :habilitado,:usuario,:path_file)");
		        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':password',md5($this->password), PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':habilitado',true, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                $consulta->bindValue(':path_file',$this->path, PDO::PARAM_STR);
                return $consulta->execute();  
            }
            return false;
        }
        static function CambiarEstado($id)
        {
            if (($user = self::GetUsuarioPorId($id)) != false)
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
            if (($user = self::GetUsuarioPorId($id)) != false)
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
		    $consulta = $objDB->RetornarConsulta("SELECT` mail`,`nombre`,`apellido`,`usuario`,`path`,`id`,`habilitado` FROM usuarios");
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno;
        }
        static function GetUsuarioPorId($id)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT `mail`,`nombre`,`apellido`,`usuario`,`path`,`id`,`habilitado` FROM usuarios WHERE id = :id ");
		    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        static function GetByUsuario($usuario){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT `mail`,`nombre`,`apellido`,`password`,`usuario`,`path`,`id`,`habilitado` FROM usuarios WHERE usuario=:usuario");
		    $consulta->bindValue(':usuario',$usuario, PDO::PARAM_STR);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"usuario");
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
         function Modificar(){
            if (($user = self::GetByUsuario($this->usuario)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
                $consulta = $objDB->RetornarConsulta("UPDATE `usuarios` SET `mail`=:mail,`nombre`=:nombre, `apellido`=:apellido,`password`=:password,`usuario`=:usuario,`path`=:path_file WHERE id=:id");
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
                $consulta->bindValue(':path_file',$this->path, PDO::PARAM_STR);
                
                return $consulta->execute();
            }
            return false;
        }
    }
?>