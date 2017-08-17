<?php
    require_once "./Entidades/AccesoDatos.php";
    require_once './Entidades/AuthJWT.php';
    class Usuario
    {
        public $id;
        public $mail;
        public $nombre;
        public $apellido;
        public $password;
        public $usuario;
        public $habilitado;
        public function __construct($mail=NULL,$nombre=NULL,$apellido=NULL,$password=NULL,$habilitado=NULL,$usuario=NULL,$id=NULL){
            if($mail !== NULL && $nombre !==NULL && $apellido !==NULL && $password !==NULL && $habilitado !==NULL && $usuario !==NULL){
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->password = $password;
                $this->id = $id;
                $this->mail = $mail;
                $this->usuario = $usuario;
                $this->habilitado = $habilitado;
             }
        }
        /*
        *   Guarda los datos del usuario en la base de datos.
        *
        *
        */
        function Alta(){
            if (self::GetUsuarioByMail($this->mail) == false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
		        $consulta = $objDB->RetornarConsulta("INSERT INTO `usuarios`(`mail`,`nombre`, `apellido`,`password`, `habilitado`,`usuario`) VALUES (:mail, :nombre, :apellido, :password, :habilitado,:usuario)");
		        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':habilitado',$this->habilitado, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                return $consulta->execute();  
            }
            return false;
        }
        /*
        *   modifica el estado del usuario, habilitado o suspendido.
        *   return true si lo logra. false si no lo  encuentra o no se realiza la accion
        *
        */
        static function Baja($id)
        {
            if (($user = self::GetUsuarioPorId($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                $consulta = $objDB->RetornarConsulta("UPDATE `usuarios` SET `habilitado` = :habilitado WHERE `id` = :Id");
		        $consulta->bindValue(':Id',$id, PDO::PARAM_INT);
                $consulta->bindValue(':habilitado',!$user->habilitado, PDO::PARAM_STR);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Listar(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,apellido,password,habilitado,usuario,id FROM usuarios");
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"usuario");
            if(count($retorno) == 0)
                return false;
            return $retorno;
        }
        static function GetUsuarioPorId($id)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,apellido,password,habilitado,usuario,id FROM usuarios WHERE id = :id ");
		    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"usuario");
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        static function GetUsuarioByMail($mail){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,apellido,password,habilitado,usuario,id FROM usuarios WHERE mail=:Mail");
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
                $consulta = $objDB->RetornarConsulta("UPDATE `usuarios` SET `mail`=:mail,`nombre`=:nombre, `apellido`=:apellido,`password`=:password,`usuario`=:usuario WHERE id=:Id");
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
                return $consulta->execute();
            }
            return false;
        }
    }
?>