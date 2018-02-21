<?php
//==============================================================================
//===   iva: Iva asociado al momento de facturar.
/*
cod_iva int 				(Código del IVA)
val_iva float 				(Valor del IVA: 8%,12%)
ini_iva date 				(Fecha de Inicio de Vigencia del Iva)
fin_iva date 				(Fecha de finalización del iva)
est_iva char 				(Estatus del IVA)
A: Activo
I: Inactivo
*/
//==============================================================================
//===	Campos B.D: cod_iva, val_iva, ini_iva, fin_iva, est_iva

class iva extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into ______()values();";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update _______ set where _______;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from _________ where ;";
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

   public function filtrar(){

   		$sql="select * from __________ where ;";
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>