<?php
//==============================================================================
//===   iva: Iva asociado al momento de facturar.
/*
cod_iva int 				(Código del IVA)
val_iva float 				(Valor del IVA: 8%,12%)
ini_iva date 				(Fecha de Inicio de Vigencia del Iva)
fin_iva date 				(Fecha de finalización del iva)
est_iva char 				(Estatus del IVA)
A: Activo
I: Inactivo
*/
//==============================================================================
//===	Campos B.D: cod_iva, val_iva, ini_iva, fin_iva, est_iva

require_once("utilidad.class.php");

class iva extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into iva(
               val_iva, 
               ini_iva, 
               fin_iva, 
               est_iva)
            values(
               '$this->val_iva', 
               '$this->ini_iva', 
               '$this->fin_iva', 
               '$this->est_iva'
            );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update iva 
         set 
            val_iva='$this->val_iva', 
            ini_iva='$this->ini_iva', 
            fin_iva='$this->fin_iva', 
            est_iva='$this->est_iva'
         where 
            cod_iva=$this->cod_iva;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from iva where est_iva='$this->est_iva' and (curdate()>=ini_iva and curdate()<=fin_iva);";
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

   public function filtrar($cod_iva,$est_iva){

        $filtro1 = ($cod_iva!="") ? "and cod_iva=$cod_iva":"";
        $filtro2 = ($est_iva!="") ? "and est_iva='$est_iva'":"";

        $where="where 1=1";
   	  $sql="select * from iva $where  $filtro1 $filtro2;";
 
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>