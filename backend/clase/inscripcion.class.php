<?php
//==============================================================================
//===   inscripcion: Tabla que guarda los datos de las inscripciones a los cursos. Si el estatus de la inscripción es 'P' se considera que solo esta pre-inscrito.  
/*
cod_ins int  						(Código de la Inscripción.)
fec_ins date 						(Fecha de Inscripción.)
hor_ins time 						(Hora de Inscripción)
fky_alu alumno(ide_alu) 			(Clave Foránea hacia la tabla alumno.)
fky_cur curso(cod_cur) 				(Clave Foránea hacia la tabla Curso.)
fky_factura factura(num_fac) 		(Clave Foránea hacia la tabla Factura.)
est_ins char 						(Estatus)
Valores del Estatus:
P -> Pre Inscrito
I -> Inscrito Correctamente.
X -> Inscrito pero luego de que el curso estaba lleno
C -> Inscrito pero el pago no pudo ser comprobado.
A -> Cupo apartado a familiares y amigos
*/                      
//==============================================================================
//===	Campos B.D: cod_ins, fec_ins, hor_ins, fky_alu, fky_cur,fky_factura, est_ins

class inscripcion extends utilidad
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
