<?php
require_once './clases/AccesoDatos.php';
class Persona{
    public $id;
    public $nombre;
    public $apellido;
    public $direccion;
    public $sexo;
    public $latitud;
    public $longitud;
    public function __construct($nombre=NULL,$apellido=NULL,$sexo=NULL,$direccion=NULL,$latitud=NULL,$longitud=NULL,$id=NULL){
        if($nombre !== NULL && $apellido !==NULL  && $direccion !==NULL && $sexo !==NULL && $latitud !==NULL && $longitud !==NULL){
        $this->nombre = $nombre;
        $this->id = $id;
        $this->apellido = $apellido;
        $this->sexo = $sexo;
        $this->direccion = $direccion;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        }
    }
    function Alta(){
        if (self::GetByCoordenadas($this->latitud,$this->longitud) == false)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("INSERT INTO `personas`(`nombre`, `apellido`,`sexo`, `direccion`,`latitud`,`longitud`) VALUES (:nombre, :apellido, :sexo, :direccion,:latitud,:longitud)");
            $consulta->bindValue(':sexo',$this->sexo, PDO::PARAM_STR);
            $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
            $consulta->bindValue(':latitud',$this->latitud, PDO::PARAM_STR);
            $consulta->bindValue(':longitud',$this->longitud, PDO::PARAM_STR);
            return $consulta->execute();  
        }
        return false;
    }
    static function Listar(){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT nombre,apellido,sexo,direccion,latitud,longitud,id FROM personas");
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
        if(count($retorno) == 0)
            return false;
        return $retorno;
    }
    static function GetById($id)
    {
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT nombre,apellido,sexo,direccion,latitud,longitud,id FROM personas WHERE id = :id ");
        $consulta->bindValue(':id',$id, PDO::PARAM_INT);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_OBJ);
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }
    static function GetByCoordenadas($latitud,$longitud){
        $objDB = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objDB->RetornarConsulta("SELECT * FROM personas WHERE latitud=:latitud AND longitud=:longitud");
        $consulta->bindValue(':latitud',$latitud, PDO::PARAM_STR);
        $consulta->bindValue(':longitud',$longitud, PDO::PARAM_STR);
        $consulta->execute();
        $retorno = $consulta->fetchAll(PDO::FETCH_CLASS,"Persona");
        if(count($retorno) == 0)
            return false;
        return $retorno[0];
    }
     function Modificar(){
        if (($user = self::GetUsuarioPorCoordnadas($this->latitud,$this->longitud)) != false)
        {
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("UPDATE `jugadores` SET `mail`=:mail,`sexo`=:sexo,`password`=:password,`usuario`=:usuario WHERE id=:id");
            $consulta->bindValue(':sexo',$this->sexo, PDO::PARAM_STR);
            $consulta->bindValue(':longitud',$this->longitud, PDO::PARAM_STR);
            $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':latitud',$this->latitud, PDO::PARAM_STR);
            $consulta->bindValue(':direccion',$this->direccion, PDO::PARAM_STR);
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            return $consulta->execute();
        }
        return false;
    }
}
?>