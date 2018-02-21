<?php
//==============================================================================
//===   instructor: Datos de los Instructores de los Cursos.
/*
cod_ins int 						(Código del Instructor).
ide_ins varchar-15 					(Cédula del Instructor).
nom_ins varchar-25 					(Nombre del Instructor).
ape_ins varchar-25 					(Apellido del Instructor).
ema_ins varchar-80 					(Correo del Instructor).
te1_ins varchar-15 					(Teléfono 1 del Instructor).
te2_ins varchar-15 					(Teléfono 2 del Instructor).
est_ins char 						(Estatus del Instructor).
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_ins, ide_ins, nom_ins, ape_ins, ema_ins, te1_ins, te2_ins, est_ins

class instructor extends utilidad
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