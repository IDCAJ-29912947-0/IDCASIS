<?php
//==============================================================================
//===   respuesta_quiz_alumno: Respuesta del Quiz por parte del alumno.
/*
cod_quiz_alu int 								(Código del Quiz)
fec_qui_alu datetime 							(Fecha cuando fue tomado el quiz)
res_qui_alu char 								(Respuesta del Alumno Cerrada)
obs_quiz_alu text 								(Respuesta abierta a la pregunta formulada)
fky_pregunta_quiz pregunta_quiz(cod_pre_qui) 	(Pregunta realizada)
fky_inscripcion inscripcion(cod_ins) 			(Inscripción del Alumno)
fky_alumno alumno(ide_alu) 						(Alumno)
est_qui_alu char 								(Estatus)
Valores del Estatus:
C: Respuesta Correcta
I: Respuesta Incorrecta
*/                         
//==============================================================================
//===	Campos B.D: cod_quiz_alu, fec_qui_alu, res_qui_alu, obs_quiz_alu, fky_pregunta_quiz, fky_inscripcion, fky_alumno, est_qui_alu

class respuesta_quiz_alumno extends utilidad
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
