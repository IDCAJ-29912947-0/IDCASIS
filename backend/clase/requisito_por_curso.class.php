<?php
//==============================================================================
//===   requisito_por_curso: Enlaza los los cursos con los requisitos necesarios para hacer el curso.
/*
cod_req_cur int 				 		(Código del requisito). 
fky_requisito requisito(cod_req) 		(Requisito del Curso).
fky_tipo_curso tipo_curso(cod_tip_cur)  (Tipo de Curso: Photoshop, Autocad, Community Manager, etc)
ini_req varchar-15						(valor inicial para cumplir con el requisito.)
fin_req: 								(valor fin para cumplir con el requisito)
obl_req char 							(Indica si el requisito es obligatorio).
										Valores:
										O: Obligatorio
										N: Opcional
est_req char 							Estatus del requisito.
Valores del Estatus:
A: Activo
I: Inactivo   
*/                      
//==============================================================================
//===	Campos B.D:  cod_req_cur, fky_requisito, fky_tipo_curso, ini_req, fin_req obl_req, est_req

class requisito_por_curso extends utilidad
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