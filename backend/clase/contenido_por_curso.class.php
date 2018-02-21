<?php
//==============================================================================
//===   contenido_por_curso: Esta tabla enlaza el contenido que se ve en cada curso. Muchas filas se esperan por cada curso.
/*
cod_con_cur int 							(Código del contenido del curso)
fky_tipo_curso tipo_curso(cod_tip_cur)      (Con ese dato sabemos ese contenido a qué curso pertenece. (Photoshop, Autocad)
fky_contenido contenido(cod_con) 			(Clave Foránea a la tabla contenido)
url_con_cur text                            (En esta url se guardará el archivo .zip con el material del tema)
est_con_cur char 							(Estatus del contenido del curso:)
A: Activo
I: Inactivo
*/                         
//==============================================================================
//===	Campos B.D: cod_con_cur, fky_tipo_curso, fky_contenido, url_con_cur, est_con_cur

class contenido_por_curso extends utilidad
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