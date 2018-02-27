<?php
//==============================================================================
//===   area: Área del Curso: Diseño Gráfico, Informática, Electrónica, Comunicación Social, Etc 
/*
	cod_are int (Código del Área)
	nom_are varchar-35 (Nombre del Area)
	est_are char (Estatus del Area)
	A: Activa
	I: Inactiva    
*/  

//==============================================================================
//===	Campos B.D: cod_tur, nom_tur, ini_tur, fin_tur, mer_tur, est_tur
require_once("utilidad.class.php");

class turno extends utilidad
{

  public $cod_tur;
  public $nom_tur; 
  public $est_tur;
	
//==============================================================================
   public function agregar(){

    	$sql="insert into turno(
            nom_tur,
            ini_tur, 
            fin_tur, 
            mer_tur,
            est_tur)
      values(
            '$this->nom_tur',
            '$this->ini_tur',
            '$this->fin_tur',
            '$this->mer_tur',
            '$this->est_tur');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update turno
      set 
            nom_tur='$this->nom_tur',
            ini_tur='$this->ini_tur',
            fin_tur='$this->fin_tur',
            est_tur='$this->est_tur'
      where 
            cod_tur='$this->cod_tur';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from turno where est_tur='$this->est_tur';";
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

   public function filtrar($cod_tur,$nom_tur,$est_tur){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_tur!="") ? "and cod_tur=$cod_tur":"";
        $filtro2 = ($nom_tur!="") ? "and nom_tur like '%$nom_tur%'":"";
        $filtro3 = ($est_tur!="") ? "and est_tur='$est_tur'":"";

   		  $sql="select * from turno $where $filtro1 $filtro2 $filtro3;";

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>