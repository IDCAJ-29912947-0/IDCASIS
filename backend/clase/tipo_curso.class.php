<?php
//==============================================================================
//===   tipo_curso: Guarda los datos generales de los diferentes cursos que impartimos.
/*
cod_tip_cur int 							(Código del Tipo de Curso. Autoincremental)
nom_tip_cur varchar-50 						(Nombre del tipo de curso)
hor_tip_cur int 							(Numero de Horas Académicas)
cer_tip_cur varchar-50 						(Nombre que aparecerá en el certificado)
obj_tip_cur varchar-255 					(Objetivo del Curso)
min_tip_cur int 							(Número mínimo de cupos)
max_tip_cur int 							(Numero maximo de cupos)
ava_tip_cur char 							Valores:
											A: Certificado Avalado por el Ministerio de Educación
											N: Certificado No Avalado por el Ministerio de Educación
url_tip_cur text 						    (URL del contenido del curso comprimido en un .zip)
fky_area area(cod_are)						(Area a la que pertenece el curso)
fky_empresa empresa(cod_emp) 				(Empresa que organiza el curso)
est_tip_cur char
Valores del Estatus:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_tip_cur, nom_tip_cur, hor_tip_cur, cer_tip_cur, obj_tip_cur, min_tip_cur, max_tip_cur, ava_tip_cur,url_tip_cur, fky_area, fky_empresa, est_tip_cur

class tipo_curso extends utilidad
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