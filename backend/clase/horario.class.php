<?php
//==============================================================================
//== Horario: tabla que guarda los horarios de los cursos: Ej: Martes y Jueves
/*
cod_hor int Código del Horario, Auto Incremental
nom_hor varchar-50
Nombre del Horario. Ejemplos:
                    Lunes, Miércoles, Viernes
                    Martes y Jueves
                    Sábados
                    Domingos
est_hor char
Estatus. 
Valores:
A: Activo
I: Inactivo
*/
//==============================================================================
//===	Campos B.D: cod_hor, nom_hor, est_hor
require_once("utilidad.class.php");

class horario extends utilidad
{

  public $cod_hor;
  public $nom_hor; 
  public $est_hor;
	
//==============================================================================
   public function agregar(){

    	$sql="insert into horario(nom_hor,est_hor)values('$this->nom_hor','$this->est_hor');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update horario set nom_hor='$this->nom_hor',est_hor='$this->est_hor' where cod_hor='$this->cod_hor';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from horario where est_hor='$this->est_hor';";
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

   public function filtrar($cod_hor,$nom_hor,$est_hor){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_hor!="") ? "and cod_hor=$cod_hor":"";
        $filtro2 = ($nom_hor!="") ? "and nom_hor like '%$nom_hor%'":"";
        $filtro3 = ($est_hor!="") ? "and est_hor='$est_hor'":"";

   		  $sql="select * from horario $where $filtro1 $filtro2 $filtro3;";
       

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>