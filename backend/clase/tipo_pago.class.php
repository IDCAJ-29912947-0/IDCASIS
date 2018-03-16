<?php
//==============================================================================
//===   tipo_pago: formas de pago
/*
cod_tip_pag int 			(Código del tipo de pago)
nom_tip_pag varchar-25 		(Nombre el tipo de pago)
est_tip_pag char 			(Estatus del tipo de pago)
Estatus de los tipos de Pago:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_tip_pag, nom_tip_pag, est_tip_pag


require_once("utilidad.class.php");

class tipo_pago extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into tipo_pago(
            nom_tip_pag,
            est_tip_pag)
            values(
            '$this->nom_tip_pag',
            '$this->est_tip_pag'
            );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update tipo_pago 
               set 
               nom_tip_pag='$this->nom_tip_pag',
               est_tip_pag='$this->est_tip_pag'
               where 
               cod_tip_pag=$this->cod_tip_pag;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from tipo_pago where est_tip_pag='$this->est_tip_pag';";
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

   public function filtrar($cod_tip_pag,$nom_tip_pag,$est_tip_pag){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_tip_pag!="") ? "and cod_tip_pag=$cod_tip_pag":"";
        $filtro2 = ($nom_tip_pag!="") ? "and nom_tip_pag like '%$nom_tip_pag%'":"";
        $filtro3 = ($est_tip_pag!="") ? "and est_tip_pag='$est_tip_pag'":"";

        $sql="select * from tipo_pago $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>