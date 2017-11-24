<?php
    require_once "./clases/AccesoDatos.php";
    class Empleado
    {
        public $id;
        public $nombre;
        public $legajo;
        public $tipo;
        public $edad;
        public $pathFoto;
        public $password;
        
        public function __construct($nombre=NULL,$password=NULL,$legajo=NULL,$tipo=NULL,$edad=NULL,$pathFoto=NULL,$id=NULL){
            if($nombre !== NULL && $legajo !==NULL  && $password !==NULL  && $tipo !==NULL && $edad!== NULL && $pathFoto!=NULL){
                $this->legajo = $legajo;
                $this->id = $id;
                $this->nombre = $nombre;
                $this->tipo = $tipo;
                $this->password = $password;
                $this->edad = $edad;
                $this->pathFoto=$pathFoto;
             }
        }
        function Alta(){
            if (self::GetByNombreTipo($this->nombre,$this->tipo) == false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
		        $consulta = $objDB->RetornarConsulta("INSERT INTO `empleado`(`nombre`,`password`, `legajo`, `tipo`,`edad`,`pathFoto`) VALUES (:nombre,:password, :legajo, :tipo,:edad,:pathFoto)");
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':password',$this->password, PDO::PARAM_STR);
                $consulta->bindValue(':legajo',$this->legajo, PDO::PARAM_STR);
                $consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
                $consulta->bindValue(':edad',$this->edad, PDO::PARAM_STR);
                $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR);
                
                return $consulta->execute();  
            }
            return false;
        }
        static function Listar(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT nombre,legajo,tipo,edad,pathFoto,id FROM empleado");
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno;
        }
        static function GetById($id)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT nombre,legajo,tipo,edad,pathFoto,id FROM empleado WHERE id = :id ");
		    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        static function GetByNombreTipo($nombre,$tipo){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT nombre,password,legajo,tipo,edad,pathFoto,id FROM empleado WHERE nombre=:nombre AND tipo=:tipo");
            $consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
            $consulta->bindValue(':tipo',$tipo, PDO::PARAM_STR);
            
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"empleado");
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
        function Modificar(){
            if (($user = self::GetById($this->id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso();
                $consulta = $objDB->RetornarConsulta("UPDATE `empleado` SET `password`=:password,`nombre`=:nombre,`legajo`=:legajo,`tipo`=:tipo,`edad`=:edad,`pathFoto`=:pathFoto WHERE id=:id");
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
                $consulta->bindValue(':legajo',$this->legajo, PDO::PARAM_STR);
                $consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
                $consulta->bindValue(':edad',$this->edad, PDO::PARAM_STR);
                $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
                $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR); 
                $consulta->bindValue(':password',$this->nombre, PDO::PARAM_STR);
                
                return $consulta->execute();

            }
            return false;
        }
        static function Baja($id)
        {
            if (($user = self::GetById($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                $consulta = $objDB->RetornarConsulta("DELETE FROM `empleado`  WHERE `id` = :Id");
		        $consulta->bindValue(':Id',$id, PDO::PARAM_INT);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Validar($nombre,$tipo,$password){
            $empleado = self::GetByNombreTipo($nombre,$tipo);
 
            if($empleado != false){
                if($empleado->password == $password)
                    return self::GetById($empleado->id);
            }
            return false;
        }
    }
?>