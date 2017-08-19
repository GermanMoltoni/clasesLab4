<?php


interface IABM{ 
   	public function Alta(); 
    public function Baja(); 
    public function Modificar(); 
    public function Listar();
}
interface IABMApi{ 
    public function AltaApi(); 
 public function BajaApi(); 
 public function ModificarApi(); 
 public function ListarApi();
}

?>