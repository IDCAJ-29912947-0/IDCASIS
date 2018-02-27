<?php
//==============================================================================
//===   instructor: Datos de los Proveedores, no incluye instructores.
/*
cod_pro int Código del Proveedor
rif_pro varchar-15 Rif del proveedor
nom_pro varchar-80 Nombre del Proveedor
ema_pro varchar-80 Email del Proveedor
te1_pro varchar-15 Teléfono 1 del Proveedor
te2_pro varchar-15 Teléfono 2 del proveedor
dir_pro varchar-80 Dirección del Proveedor
est_pro char(1)    Estatus del Proveedor
*/                        
//==============================================================================
//===	Campos B.D: cod_pro, rif_pro, nom_pro, ema_pro, te1_pro, te2_pro, dir_pro

require_once("utilidad.class.php");

class proveedor extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into proveedor(
            rif_pro, 
            nom_pro, 
            ema_pro,
            dir_pro, 
            te1_pro, 
            te2_pro, 
            est_pro)
         values(
            '$this->rif_pro', 
            '$this->nom_pro', 
            '$this->ema_pro', 
            '$this->dir_pro',
            '$this->te1_pro', 
            '$this->te2_pro', 
            '$this->est_pro'
         );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update proveedor 
         set 
               rif_pro='$this->rif_pro', 
               nom_pro='$this->nom_pro', 
               ema_pro='$this->ema_pro',
               dir_pro='$this->dir_pro',               
               te1_pro='$this->te1_pro',
               te2_pro='$this->te2_pro',
               est_pro='$this->est_pro'           
         where 
               cod_pro=$this->cod_pro;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from proveedor where est_pro='$this->est_pro';";
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

   public function filtrar($cod_pro,$dat_pro,$est_pro){

        $where="where 1=1";
        $filtro1 = ($cod_pro!="") ? "and cod_pro=$cod_pro":"";
        $filtro2 = ($dat_pro!="") ? "and nom_pro like '%$dat_pro%'":"";
        $filtro3 = ($est_pro!="") ? "and est_pro='$est_pro'":"";

   	  $sql="select * from proveedor $where $filtro1 $filtro2 $filtro3;";
   	  return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>