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
        if(($rol = self::GetRolUsuarioByIdUserRol($this->id_rol,$this->id_usuario)) ==false){
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
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"RolUsuario");
        if(count($retorno) == 0)
            return false;
        return $retorno;
    }
    function Modificar(){
        if (($rol = self::GetRolUsuarioById($this->id)) != false)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("UPDATE `roles` SET `id_usuario`=:id_usuario,`id_rol`=:id_rol WHERE id=:id");
            $consulta->bindValue(':id_usuario',$this->id_usuario, PDO::PARAM_STR);
            $consulta->bindValue(':id_rol',$this->id_rol, PDO::PARAM_STR);
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            return $consulta->execute();
        }
        return false;
    }
    static function Baja($id){
        if (($rol = self::GetRolUsuarioById($id)) != false)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("DELETE FROM roles WHERE id=:id");
            $consulta->bindValue(':id',$rol->id, PDO::PARAM_INT);
            return $consulta->execute();
        }
        return false;
    }
    static function GetRolUsuarioById($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id_usuario,id_rol,id FROM roles WHERE  id=:id");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"RolUsuario");
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }
    static function GetRolUsuarioByIdUsuario($id){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id_usuario,id_rol,id FROM roles WHERE  id_usuario=:id_usuario");
        $consulta->bindValue(':id_usuario',$id, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"RolUsuario");
        if(count($retorno) == 0)
            return false;
        return $retorno;
    }
    static function GetRolUsuarioByIdUserRol($id_rol,$id_usuario){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT id_usuario,id_rol,id FROM roles WHERE  id_usuario=:id_usuario AND id_rol=:id_rol");
        $consulta->bindValue(':id_rol',$id_rol, PDO::PARAM_INT);
        $consulta->bindValue(':id_usuario',$id_usuario, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"RolUsuario");
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }


}


?>