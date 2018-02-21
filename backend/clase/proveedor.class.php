<?php
//==============================================================================
//===   proveedor: Proveedor de Productos o Servicios. (No incluye Instructores)
/*
cod_pro int Código del Proveedor
rif_pro varchar-15 Rif del proveedor
nom_pro varchar-80 Nombre del Proveedor
te1_pro varchar-15 Teléfono 1 del Proveedor
te2_pro varchar-15 Teléfono 2 del proveedor
dir_pro varchar-80 Dirección del Proveedor
est_pro char Estatus del proveddor

*/                       
//==============================================================================
//===	Campos B.D: cod_pro, rif_pro, nom_pro, te1_pro, te2_pro, dir_pro, est_pro

class proveedor extends utilidad
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