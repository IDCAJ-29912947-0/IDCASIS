<?php
//==============================================================================
//===   asistencia: Tabla donde se guardará la lista de asistencia a los cursos presenciales.
/*
cod_asi int 			 	(Código de la asistencia autoincremental)
fec_asi date 			 	(Fecha del dia donde se pasa asistencia)
hor_asi time 			 	(Hora a la que esta llegando el alumno a clase)
fky_curso curso(cod_cur) 	(Clave foránea hacia el curso que el alumno está cursando.
fky_alumno alumno(ide_alu) 	(Clave foránea hacia la tabla alumno).
est_asi char 				(Estatus de la asistencia).
A: Asistió a clase
R: Asistió a clase con retardo mayor a 30 minutos
I: No asistió a clase
*/                       
//==============================================================================
//===	Campos B.D:  cod_asi, fec_asi, hor_asi, fky_curso, fky_alumno, est_asi

class asistencia extends utilidad
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