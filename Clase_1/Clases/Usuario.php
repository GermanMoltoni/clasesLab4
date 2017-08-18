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
        public function __construct($mail=NULL,$nombre=NULL,$apellido=NULL,$password=NULL,$usuario=NULL,$id=NULL,$habilitado=NULL){
            if($mail !== NULL && $nombre !==NULL && $apellido !==NULL && $password !==NULL  && $usuario !==NULL){
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->password = $password;
                $this->id = $id;
                $this->mail = $mail;
                $this->usuario = $usuario;
                $this->habilitado = $habilitado;
             }
        }
        function Alta(){
            if (self::GetUsuarioByMail($this->mail) == false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
		        $consulta = $objDB->RetornarConsulta("INSERT INTO `usuario`(`mail`,`nombre`, `apellido`,`password`, `habilitado`,`usuario`) VALUES (:mail, :nombre, :apellido, :password, :habilitado,:usuario)");
		        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':habilitado',true, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                return $consulta->execute();  
            }
            return false;
        }
        static function Baja($id)
        {
            if (($user = self::GetUsuarioPorId($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                $consulta = $objDB->RetornarConsulta("UPDATE `usuario` SET `habilitado` = :habilitado WHERE `id` = :Id");
		        $consulta->bindValue(':Id',$id, PDO::PARAM_INT);
                $consulta->bindValue(':habilitado',!$user->habilitado, PDO::PARAM_STR);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Listar(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,apellido,usuario,id,habilitado FROM usuario");
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno;
        }
        static function GetUsuarioPorId($id)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,apellido,usuario,id,habilitado FROM usuario WHERE id = :id ");
		    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        static function GetUsuarioByMail($mail){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,apellido,password,usuario,id,habilitado FROM usuario WHERE mail=:Mail");
		    $consulta->bindValue(':Mail',$mail, PDO::PARAM_STR);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"usuario");
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
         function Modificar(){
            if (($user = self::GetUsuarioPorId($this->id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
                $consulta = $objDB->RetornarConsulta("UPDATE `usuario` SET `mail`=:mail,`nombre`=:nombre, `apellido`=:apellido,`password`=:password,`usuario`=:usuario WHERE id=:id");
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);

                return $consulta->execute();
            }
            return false;
        }
    }
?>