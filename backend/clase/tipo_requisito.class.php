<?php
//==============================================================================
/* tipo_requisito: Los tipos de requisitos pueden ser Requisito de Edad, Requisito de Conocimientos Previos,
 Materiales o equipos a traer al curso, Estudiante o Profesional de algún Área.

cod_tip_req int         (Código del Requisito), 
nom_tip_req varchar-50  (Nombre del Tipo de Requisito), 
est_tip_req char        (Estatus del Tipo de Requisito)

*/                        
//==============================================================================
//===	Campos B.D: cod_tip_req, nom_tip_req, est_tip_req


require_once("utilidad.class.php");

class tipo_requisito extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into tipo_requisito(
            nom_tip_req,
            est_tip_req)
            values(
            '$this->nom_tip_req',
            '$this->est_tip_req'
            );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update tipo_requisito 
               set 
               nom_tip_req='$this->nom_tip_req',
               est_tip_req='$this->est_tip_req'
               where 
               cod_tip_req=$this->cod_tip_req;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from tipo_requisito where est_tip_req='$this->est_tip_req';";
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

   public function filtrar($cod_tip_req,$nom_tip_req,$est_tip_req){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_tip_req!="") ? "and cod_tip_req=$cod_tip_req":"";
        $filtro2 = ($nom_tip_req!="") ? "and nom_tip_req like '%$nom_tip_req%'":"";
        $filtro3 = ($est_tip_req!="") ? "and est_tip_req='$est_tip_req'":"";

        $sql="select * from tipo_requisito $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>