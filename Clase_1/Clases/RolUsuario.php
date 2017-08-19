<?
require_once "./Clases/AccesoDatos.php";
class RolUsuario{
    public $id;
    public $id_usuario;
    public $id_rol;
    function __construct($id_usuario=NULL,$id_rol=NULL,$id=NULL){
        if($id_usuario !=NULL && $id_rol !=NULL){
            $this->id=$id;
            $this->id_rol=$id_rol;
            $this->id_usuario=$id_usuario;
        }
    }
    function Alta(){
        if(($rol = self::GetRolByDescripcion($this->descripcion)) ==false){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("INSERT INTO `roles`(`id_rol`,`id_usuario`) VALUES (:id_rol,:id_usuario)");
            $consulta->bindValue(':id_rol',$this->id_rol, PDO::PARAM_STR);
            $consulta->bindValue(':id_usuario',$this->id_usuario, PDO::PARAM_STR);
            return $consulta->execute();
        }
        return false;
    }
    static function Listar(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id_usuario,id_rol,id FROM roles");
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"roluser");
        if(count($retorno) == 0)
            return false;
        return $retorno;
    }
    function Modificar(){
        if (($rol = self::GetRolById($this->id)) != false)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("UPDATE `tipo_roles` SET `descripcion`=:descripcion WHERE id=:id");
            $consulta->bindValue(':descripcion',$this->descripcion, PDO::PARAM_STR);
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            return $consulta->execute();
        }
        return false;
    }
    static function Baja($id){
        if (($rol = self::GetRolById($id)) != false)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("DELETE FROM tipo_roles WHERE id=:id");
            $consulta->bindValue(':id',$rol->id, PDO::PARAM_INT);
            return $consulta->execute();
        }
        return false;
    }
    static function GetRolById($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id,descripcion FROM tipo_roles WHERE id = :id ");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"rol");
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }
    static function GetRolByDescripcion($descripcion){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id,descripcion FROM tipo_roles WHERE descripcion=:descripcion ");
        $consulta->bindValue(':descripcion',$descripcion, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"rol");
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }


}


?>