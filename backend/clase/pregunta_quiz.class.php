<?php
//==============================================================================
//===   pregunta_quiz: Esta tabla guardará todos las preguntas que tienen asociadas las evaluaciones/prácticas de los cursos
/*
cod_pre_qui int 				 (Código de la pregunta)
enu_pre_qui text 				 (Enunciado de la pregunta)
res_pre_qui varchar-255 		 (Respuesta Acertada de la pregunta)
re1_pre_qui varchar-255 		 (Respuesta 1)
re2_pre_qui varchar-255 		 (Respuesta 2)
re3_pre_qui varchar-255 		 (Respuesta 3)
re4_pre_qui varchar-255 		 (Respuesta 4)
tip_pre_qui char                 (Tipo de Pregunta: A: Abierta, C: Cerrada)
fky_quiz quiz(cod_qui) 			 (Quiz asociado a la pregunta que se está haciendo)
fky_contenido contenido(cod_con) (Contenido del Curso)
fky_tipo_curso tipo_curso(cod_tip_cur)  Tipo de Curso (Photoshop, Autocad, Community Manager,SketchUP)
est_pre_qui char 				 (Estatus de la pregunta.)
Valores del Estatus:
A: Activa
I: Inactiva

*/                       
//==============================================================================
//===	Campos B.D: cod_pre_qui, enu_pre_qui, res_pre_qui, re1_pre_qui, re2_pre_qui, re3_pre_qui, re4_pre_qui, tip_pre_qui,fky_quiz, fky_contenido, fky_tipo_curso, est_pre_qui

class pregunta_quiz extends utilidad
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