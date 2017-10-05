<?php
    require_once "./Clases/AccesoDatos.php";
    class Pizza
    {
        public $id;
        public $sabor;
        public $tipo;
        public $cantidad;
        public $pathFoto;
        public function __construct($sabor=NULL,$tipo=NULL,$cantidad=NULL,$pathFoto=NULL,$id=NULL){
            if($sabor !== NULL && $tipo !==NULL && $cantidad !==NULL && $pathFoto !==NULL){
                $this->tipo = $tipo;
                $this->cantidad = $cantidad;
                $this->sabor = $sabor;
                $this->id = $id;
                $this->pathFoto = $pathFoto;
             }
        }
        function Alta(){
                $objDB = AccesoDatos::DameUnObjetoAcceso();
		        $consulta = $objDB->RetornarConsulta("INSERT INTO `Pizza`(`sabor`,`tipo`, `cantidad`,`pathFoto`) VALUES (:sabor, :tipo, :cantidad, :pathFoto, :id)");
		        $consulta->bindValue(':sabor',$this->sabor, PDO::PARAM_STR);
                $consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
                $consulta->bindValue(':cantidad',$this->cantidad, PDO::PARAM_STR);
                $consulta->bindValue(':pathFoto',$this->pathFoto, PDO::PARAM_STR);
                return $consulta->execute();  
        }
        static function Baja($id)
        {
            if (($persona = self::GetById($id)) != false)
            {
                $objDB = AccesoDatos::DameUnObjetoAcceso(); 
                               $consulta = $objDB->RetornarConsulta("DELETE FROM `Pizza`  WHERE `id` = :Id");
               $consulta->bindValue(':Id',$id, PDO::PARAM_INT);
                $consulta->execute();
                return true;
            }
            return false;
        }
        static function Listar(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT sabor,tipo,cantidad,pathFoto,id FROM Pizza ");
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno;
        }
        static function GetById($id)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
		    $consulta = $objDB->RetornarConsulta("SELECT sabor,tipo,cantidad,pathFoto,id FROM Pizza WHERE id = :id ");
		    $consulta->bindValue(':id',$id, PDO::PARAM_INT);
            $consulta->execute();
            $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
            if(count($retorno) == 0)
                return false;
            return $retorno[0];
        }
    }
?>