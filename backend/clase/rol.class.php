<?php
//==============================================================================
//===   rol: Roles de Usuarios en el Sistema.
/*
cod_rol int 		(Código del Rol)
nom_rol varchar-25 	(Nombre del Rol)
est_rol char 		(Estatus del Rol)
Estatus del Rol:
A: Activo
I: Inactivo
*/                         
//==============================================================================
//== Columnas de la BD: cod_rol, nom_rol, est_rol

require_once("utilidad.class.php");

class rol extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into rol(
      nom_rol, 
      est_rol)
      values(
      '$this->nom_rol', 
      '$this->est_rol');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update rol set 
         nom_rol='$this->nom_rol', 
         est_rol='$this->est_rol' 
         where cod_rol='$this->cod_rol';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from rol where est_rol='$this->est_rol';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from ______ where ;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_rol,$nom_rol,$est_rol){

        $where="where 1=1";
        
        $filtro1 = ($cod_rol!="") ? "and cod_rol=$cod_rol":"";
        $filtro2 = ($nom_rol!="") ? "and nom_rol like '%$nom_rol%'":"";
        $filtro3 = ($est_rol!="") ? "and est_rol='$est_rol'":"";

        $sql="select * from rol $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase

?>