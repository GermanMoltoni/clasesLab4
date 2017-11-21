<?php
    require_once "./Clases/AccesoDatos.php";
    class Persona
    {
        public $id;
        public $mail;
        public $nombre;
        public $sexo;
        public $password;
        public $habilitado;
        public $pathFoto;
        public function __construct($mail=NULL,$nombre=NULL,$sexo=NULL,$password=NULL,$id=NULL,$habilitado=NULL,$pathFoto=NULL){
            if($mail !== NULL && $nombre !==NULL && $sexo !==NULL && $password !==NULL){
                $this->nombre = $nombre;
                $this->sexo = $sexo;
                $this->password = $password;
                $this->id = $id;
                $this->mail = $mail;
                $this->habilitado = $habilitado;
                $this->pathFoto = $pathFoto;
             }
        }
        function Alta(){
            if (self::GetByMail($this->mail) == false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
		        $consulta = $objDB->RetornarConsulta("INSERT INTO `Persona`(`mail`,`nombre`, `sexo`,`password`, `habilitado`,`pathFoto`) VALUES (:mail, :nombre, :sexo, :password, :habilitado,:pathFoto)");
		        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':sexo',$this->sexo, PDO::PARAM_STR);
                $consulta->bindValue(':password',md5($this->password), PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':habilitado',true, PDO::PARAM_STR);
                $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR);
                
                return $consulta->execute();  
            }
            return false;
        }
        static function CambiarEstado($id)
        {
            if (($persona = self::GetById($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                $consulta = $objDB->RetornarConsulta("UPDATE `Persona` SET `habilitado` = :habilitado WHERE `id` = :id");
		        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
                $consulta->bindValue(':habilitado',!$persona->habilitado, PDO::PARAM_STR);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Baja($id)
        {
            if (($persona = self::GetById($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                $consulta = $objDB->RetornarConsulta("UPDATE `Persona` SET `habilitado` = :habilitado WHERE `id` = :Id");
		        $consulta->bindValue(':Id',$id, PDO::PARAM_INT);
                $consulta->bindValue(':habilitado',false, PDO::PARAM_STR);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Listar(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,sexo,null as password ,id,habilitado,pathFoto FROM Persona");
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno;
        }
        static function GetById($id)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,sexo,null as password, id,habilitado,pathFoto FROM Persona WHERE id = :id ");
		    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        static function GetByMail($mail){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT mail,nombre,sexo,null as password ,id,habilitado,pathFoto FROM Persona WHERE mail=:mail");
		    $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"Persona");
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
         function Modificar(){
            if (($persona = self::GetById($this->id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
                $consulta = $objDB->RetornarConsulta("UPDATE `persona` SET `mail`=:mail,`nombre`=:nombre, `sexo`=:sexo,`password`=:password, `pathFoto`=:pathFoto WHERE id=:id");
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':sexo',$this->sexo, PDO::PARAM_STR);
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
                $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR);
                return $consulta->execute();
            }
            return false;
        }
    }
?>