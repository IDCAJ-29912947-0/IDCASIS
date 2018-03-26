<?php
require_once("utilidad.class.php");

class ingreso extends utilidad
{

  public $cod_are;
  public $nom_are; 
  public $est_are;
	
//==============================================================================
   public function agregar(){

    	$sql="insert into ingreso(nom_are,est_are)values('$this->nom_are','$this->est_are');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update ingreso set nom_are='$this->nom_are',est_are='$this->est_are' where cod_are='$this->cod_are';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from ingreso where est_are='$this->est_are';";
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

   public function filtrar($cod_are,$nom_are,$est_are){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_are!="") ? "and cod_are=$cod_are":"";
        $filtro2 = ($nom_are!="") ? "and nom_are like '%$nom_are%'":"";
        $filtro3 = ($est_are!="") ? "and est_are='$est_are'":"";

   		  $sql="select * from ingreso $where $filtro1 $filtro2 $filtro3;";

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>