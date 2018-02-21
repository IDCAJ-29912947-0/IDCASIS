<?php
//==============================================================================
//===   factura_detalle: Detalle de la factura de Venta.
/*
fky_factura factura(num_fac) 		(Factura Asociada)
fky_curso curso(cod_cur) 		    (Curso que se está facturando)
can_fac_det int 					(Cantidad de Cupos)
pre_fac_det float 					(Precio Unitario)
iva_fac_det float					(Iva del detalle en Bs)
sub_fac_det float 					(Subtotal del detalle en Bs)
*/


//==============================================================================
//===	Campos B.D: fky_factura, fky_curso, can_fac_det, pre_fac_det, iva_fac_det, sub_fac_det

class factura_detalle extends utilidad
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