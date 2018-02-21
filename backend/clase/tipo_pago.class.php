<?php
//==============================================================================
//===   tipo_pago: formas de pago
/*
cod_tip_pag int 			(Código del tipo de pago)
nom_tip_pag varchar-25 		(Nombre el tipo de pago)
est_tip_pag char 			(Estatus del tipo de pago)
Estatus de los tipos de Pago:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_tip_pag, nom_tip_pag, est_tip_pag

class tipo_pago extends utilidad
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