<?php
//==============================================================================
//===   empresa: Nombre de la empresa organizadora del curso.
/*
cod_emp int 				(Código de la empresa)
rif_emp varchar-15 		    (Rif de la empresa)
nom_emp varchar-50 		    (Nombre de la Empresa)
dom_emp varchar-255 		(Domicilio Fiscal)
est_emp char 				(Estatus de la empresa)
A: Activa
I: Inactiva
*/

//==============================================================================
//===	Campos B.D: cod_emp, rif_emp, nom_emp, dom_emp, est_emp

require_once("utilidad.class.php");

class empresa extends utilidad
{
   public $cod_emp; 
   public $rif_emp; 
   public $nom_emp; 
   public $dom_emp; 
   public $est_emp;

//==============================================================================
   public function agregar(){

    	$sql="insert into empresa
           (rif_emp, 
            nom_emp, 
            dom_emp, 
            est_emp)
            values
            ('$this->rif_emp', 
             '$this->nom_emp', 
             '$this->dom_emp', 
             '$this->est_emp');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){

   		$sql="update empresa 
               set 
               rif_emp='$this->rif_emp', 
               nom_emp='$this->nom_emp', 
               dom_emp='$this->dom_emp', 
               est_emp='$this->est_emp'
               where 
               cod_emp='$this->cod_emp';";

   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from empresa where est_emp='$this->est_emp';";
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

   public function filtrar($cod_emp,$nom_emp,$est_emp){

        $where="where 1=1";
        
        $filtro1 = ($cod_emp!="") ? "and cod_emp=$cod_emp":"";
        $filtro2 = ($nom_emp!="") ? "and nom_emp like '%$nom_emp%'":"";
        $filtro3 = ($est_emp!="") ? "and est_emp='$est_emp'":"";

        $sql="select * from empresa $where $filtro1 $filtro2 $filtro3;";

          return $this->ejecutar($sql);  
   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>