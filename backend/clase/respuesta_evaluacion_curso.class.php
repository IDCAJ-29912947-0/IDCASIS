<?php
//==============================================================================
//===   respuesta_evaluacion_curso: Evaluacion del Curso por Parte de los Alumnos
/*
cod_eva_cur int						             (Código de Respuesta) 
fec_eva_cur date 						         (Fecha de la respuesta)
fky_alumno alumno(ide_alu)						 (Alumno)
fky_tipo_curso tipo_curso(cod_tip_cur)			 (Tipo de Curso. Photoshop, Autocad, etc)
fky_curso curso(cod_cur)						 (Curso exacto que esta cursando el alumno)
fky_pregunta_evaluacion							 (Pregunta)
res_eva_cur char 								 (Respuesta cerrada a la pregunra)
obs_eva_cur text 								 (Respuesta Abierta a la Pregunta)
est_eva_cur char 								 (Estatus)
Valores del Estatus:
A: Activa
I: Inactiva
*/                       
//==============================================================================
//===	Campos B.D: cod_eva_cur, fec_eva_cur, fky_alumno, fky_tipo_curso, fky_curso, fky_pregunta_evaluacion, res_eva_cur, obs_eva_cur, est_eva_cur

class respuesta_evaluacion_curso extends utilidad
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