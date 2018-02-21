<?php
//==============================================================================
//===   quiz: Tabla que guarda los datos generales del quiz/examen
/*
cod_qui int 			(Código del quiz)
nom_qui varchar-255 	(Nombre del Exámen)
tie_qui int 			(Tiempo para resolver cada pregunta del quiz)
tip_qui char 			Tipo de Quiz:
						1) Aprendizaje Recreacional
						2) Evaluativo
min_qui int 			(Puntuación mínima para aprobar el quiz)
ini_qui date 			(Fecha de Inicio para aperturar el quiz)
fin_qui date 			(Fecha Final para llenar el Quiz)
hor_ini time 			(Hora de inicio para llenar el quiz)
hor_fin time 			(Hora final para llenar el quiz)
est_qui char 			(Estatus del Quiz)

*/                         
//==============================================================================
//===	Campos B.D: cod_qui, nom_qui, tie_qui, tip_qui, min_qui, ini_qui, fin_qui, hor_ini, hor_fin, est_qui

class quiz extends utilidad
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