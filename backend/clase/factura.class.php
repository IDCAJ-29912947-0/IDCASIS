<?php
//==============================================================================
//===   factura: Factura que se emite por cada curso.
/*
num_fac int   				 (Número de Factura, se espera que el usuario cargue el número de factura luego de imprimirlas).
fec_fac date 				 (Fecha de Emisión de la Factura).
bas_fac float 				 (Base imponible de la factura).
iva_fac float 				 (Iva de la factura en Bs).
tot_fac float 				 (Monto Total de la Factura).
gen_fac char 				 (Factura Generada o No. Valores  G: Generada, N: No generada).
fky_iva iva(cod_iva)		 IVA utilizado para calcular la factura
fky_titular_factura titular_factura(cod_tit) (A nombre de quien se genera la factura).
est_fac char 				 (Estatus de la factura).
Valores del Estatus de la Factura:
A: Activa
I: Anulada

*/
//==============================================================================
//===	Campos B.D: num_fac, fec_fac,bas_fac,iva_fac, tot_fac, gen_fac, fky_iva, fky_titular_factura, est_fac


class factura extends utilidad
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
