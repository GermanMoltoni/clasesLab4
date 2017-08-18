<?
class Rol{
    public $id;
    public $descripcion;
    function __construct($descripcion=NULL,$id=NULL){
        if($descripcion !=NULL){
            $this->id=$id;
            $this->descripcion=$descripcion;
        }
    }
    function Alta(){
        if(($rol = self::GetByDescripcion($this->descripcion)) !=false){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("INSERT INTO `tipo_roles`(`descripcion`) VALUES (:descripcion)");
            $consulta->bindValue(':descripcion',$this->descripcion, PDO::PARAM_STR);
            return $consulta->execute();
        }
        return false;
    }
    static function Listar(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT descripcion,id FROM tipo_roles");
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
        if(count($retorno) == 0)
            return false;
        return $retorno;
    }
    function Modificar(){
        if (($user = self::GetRolById($this->id)) != false)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("UPDATE `tipo_roles` SET `descripcion`=:descripcion WHERE id=:id");
            $consulta->bindValue(':descripcion',$this->descripcion, PDO::PARAM_STR);
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            return $consulta->execute();
        }
        return false;
    }
    static function GetRolById($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id,descripcion FROM tipo_roles WHERE id = :id ");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }
    static function GetRolByDescripcion($descripcion){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id,descripcion FROM tipo_roles WHERE descripcion=:descripcion ");
        $consulta->bindValue(':descripcion',$descripcion, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }


}


?>