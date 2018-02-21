<?php
//==============================================================================
//===   certificado: Tabla que guarda los certificados emitidos por Ingeniería Digital CA y por Ingeniería Web F.P.    
/*
cod_cer int 							(Código del Certificado)
fky_inscripcion inscripcion(cod_ins)    (Clave Foránea donde tendremos todos los datos de la inscripción del alumno)
num_cer int 							(Número de Certificado)
lib_cer int 							(Libro del Certificado)
fol_cer int 							(Folio del Certificado)
fec_cer date 							(Fecha de Emisión del Certificado)
md5_cer varchar-32 					    (Código MD5 del certificado)
est_cer char 							(Estatus del Certificado)
Valores del Estatus:
I: Impreso
X: Por imprimir
E: Impreso y Entregado
*/                    
//==============================================================================
//===	Campos B.D: cod_cer, fky_inscripcion, num_cer, lib_cer, fol_cer, fec_cer, md5_cer, est_cer 


class certificado extends utilidad
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
