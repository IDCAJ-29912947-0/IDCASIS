<?php
//==============================================================================
//===   titular_factura: Titular de la Factura    
/*
cod_tit int 					(Código del Titular)
rif_tit varchar-15 				(Rif del titular)
nom_tit varchar-80 				(Nombre del Titular)
ret_iva char 					(¿Retiene IVA?)
								0 - No retiene IVA
								8 - Retiene el 8% de IVA
ret_isl char 					(¿Retiene ISLR?)
								0 - No retiene ISLR
								8 - Retiene el 8% de ISLR
tip_tit char  				   (Tipo de Titular:)
								N: Natural
								J: Jurídico
								G: Gubernamental
est_tit char 					(Estatus del Titular de la Factura)
								A: Activo
								I: Inactivo
*/                    
//==============================================================================
//===	Campos B.D: cod_tit, rif_tit, nom_tit, ret_iva, ret_isl, tip_tit, est_tit	

class titular_factura extends utilidad
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