<?php
//==============================================================================
//===   Medio: Medio Publicitario por el cual el alumno se enteró del curso. 
/*
	cod_med int (Código del Medio Publicitario)
	nom_med varchar-35 (Nombre del Medio Publicitario)
	est_med char (Estatus del Medio Publicitario)
	A: Activa
	I: Inactiva    
*/  

//==============================================================================
//===	Campos B.D: cod_med, nom_med, est_med
require_once("utilidad.class.php");

class medio_publicidad extends utilidad
{

  public $cod_med;
  public $nom_med; 
  public $est_med;
	
//==============================================================================
   public function agregar(){

    	$sql="insert into medio_publicidad(nom_med,est_med)values('$this->nom_med','$this->est_med');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update medio_publicidad set nom_med='$this->nom_med',est_med='$this->est_med' where cod_med='$this->cod_med';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from medio_publicidad where est_med='$this->est_med' order by nom_med;";
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

   public function filtrar($cod_med,$nom_med,$est_med){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_med!="") ? "and cod_med=$cod_med":"";
        $filtro2 = ($nom_med!="") ? "and nom_med like '%$nom_med%'":"";
        $filtro3 = ($est_med!="") ? "and est_med='$est_med'":"";

   		  $sql="select * from medio_publicidad $where $filtro1 $filtro2 $filtro3;";

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>