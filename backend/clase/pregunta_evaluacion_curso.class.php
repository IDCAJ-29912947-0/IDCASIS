<?php
//==============================================================================
//===   pregunta_evaluacion_curso: Estas son las preguntas con las cuales se evaluará la calidad de los cursos.
/*
cod_pre_eva int 					    (Código de la pregunta)
enu_pre_eva text 					    (Enunciado de la pregunta)
re1_pre_eva varchar-80 					(Respuesta 1)
re2_pre_eva varchar-80 					(Respuesta 2)
re3_pre_eva varchar-80 					(Respuesta 3)
re4_pre_eva varchar-80 					(Respuesta 4)
re5_pre_eva varchar-80 					(Respuesta 5)
fky_tipo_curso tipo_curso(cod_tip_cur)  (Tipo de Curso(Autocad, Photoshop, Sketchup)
tip_pre_eva char 						Tipo de Pregunta:
										1) Al alumno que abandonó el curso
										2) Al alumno que terminó exitisamente el curso
										3) A la clase del día
est_pre_eva char 						(Estatus de la evaluación de la pregunta).
Valores de los Estatus:
A: Activo
I: Inactivo

*/                         
//==============================================================================
//===	Campos B.D: cod_pre_eva, enu_pre_eva, re1_pre_eva, re2_pre_eva,re3_pre_eva,re4_pre_eva,re5_pre_eva,fky_tipo_curso,tip_pre_eva,est_pre_eva

class pregunta_evaluacion_curso extends utilidad
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