<?php
//==============================================================================
//===   modulo: Modulos que utilizará el sistema, estas tablas son del módulo de seguridad
/*
cod_mod int 					(Código del Módulo)
nom_mod varchar-25 				(Nombre del Módulo)
url_mod text 					(URL del Módulo.Ej: frontend/vista/curso)
est_mod char 					(Estatus del Módulo.)
Estatus del Módulo:
A: Activo
I: Inactivo     
*/                 
//==============================================================================
//===	Campos B.D: cod_mod, nom_mod, url_mod, est_mod
require_once("utilidad.class.php");

class modulo extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into modulo(
      nom_mod, 
      url_mod, 
      est_mod)
      values(
      '$this->nom_mod',
      '$this->url_mod',
      '$this->est_mod'
      );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update modulo 
         set 
         nom_mod='$this->nom_mod', 
         url_mod='$this->url_mod', 
         est_mod='$this->est_mod' 
         where 
         cod_mod=$this->cod_mod;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from modulo where est_mod='$this->est_mod';";
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

   public function filtrar($cod_mod,$nom_mod,$est_mod){

        $where="where 1=1";
        
        $filtro1 = ($cod_mod!="") ? "and cod_mod=$cod_mod":"";
        $filtro2 = ($nom_mod!="") ? "and nom_mod like '%$nom_mod%'":"";
        $filtro3 = ($est_mod!="") ? "and est_mod='$est_mod'":"";

        $sql="select * from modulo $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);   

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
