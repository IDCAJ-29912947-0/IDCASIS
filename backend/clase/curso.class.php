<?php
//==============================================================================
//===   curso: Datos del curso impartido por Ingeniería Digital o Ingeniería Web F.P.
/*
cod_cur int 							  	    (Código del Curso)
dia_cur varchar-80 								(Dia del Curso. Ejemplo: Lunes, Miércoles, Viernes de 8:00 a 12:00)
hor_cur time 									(Hora de Inicio del Curso)
								                (Horario del Curso: Ejemplo: 8:00am a 12:00pm)
fec_ini date 								    (Fecha de Inicio del Curso)
fec_fin date 								    (Fecha de Finalización del Curso)
bas_cur float 									(Base Imponible del Curso)
iva_cur float 									(IVA del Curso en Bs)
pre_cur float 									(Precio del Curso con IVA Incluido)
obs_cur varchar-255								(Observación del Curso, por ejemplo, si es en la semana de feria o semana santa la 													gente debe saber que el curso igual se dictará)
fky_tipo_curso tipo_curso(cod_tip_cur) 			(Tipo de Curso: Photoshop, Autocad, Community Manager)
fky_instructor instructor(cod_ins)              (Instructor) 
fky_modalidad modalidad(cod_mod)                (Modalidad del Curso: Presencial, Online, Semi- Presencial)
est_cur char                                    (Estatus del Curso)
Valores del Estatus:
A: Activo, en inscripciones abiertas
I: Inactivo
C: Por empezar, pero ya se encuentra lleno
*/                       
//==============================================================================
//===	Campos B.D:  cod_cur, dia_cur, hor_cur, fec_ini, fec_fin, bas_cur, iva_cur, pre_cur, obs_cur, fky_tipo_curso, fky_instructor, fky_modalidad, est_cur



class curso extends utilidad
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
