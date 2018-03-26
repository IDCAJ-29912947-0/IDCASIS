<?php
//==============================================================================
//===   titular_factura: Titular de la Factura    
/*
cod_tit int 					(Código del Titular)
rif_tit varchar-15 				(Rif del titular)
nom_tit varchar-80 				(Nombre del Titular)
dir_tit varchar-80         (Dirección del Titukar)
iva_tit char 					(¿Retiene IVA?)
								N - No retiene IVA
								S - SI, retiene IVA
isl_tit char 					(¿Retiene ISLR?)
								N - No, no retiene ISLR
								S - Si, Retiene ISLR
tip_tit char  				   (Tipo de Titular:)
								N: Natural
								J: Jurídico
								G: Gubernamental
est_tit char 					(Estatus del Titular de la Factura)
								A: Activo
								I: Inactivo
*/                    
//==============================================================================
//===	Campos B.D: cod_tit, rif_tit, nom_tit, dir_tit, iva_tit, isl_tit, tip_tit, est_tit	

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