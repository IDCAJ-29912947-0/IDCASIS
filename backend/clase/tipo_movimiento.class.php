<?php
//==============================================================================
//===   tipo_movimiento: Los tipos de Movimientos para controlar los ingresos y egresos del sistema.                       
//==============================================================================
/*
cod_tip_mov int 			(Código del tipo de movimiento)
nom_tip_mov varchar-25 	(Nombre del tipo de movimiento)
acc_tip_mov char        (Acción del  Tipo de Movimiento. I: Ingreso, E: Egreso)
est_tip_mov char 			(Estatus del tipo de movimiento)
*/
//==============================================================================

//===	Campos B.D: cod_tip_mov, nom_tip_mov, est_tip_mov

require_once("utilidad.class.php");

class tipo_movimiento extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into tipo_movimiento
           (nom_tip_mov,
            tip_tip_mov, 
            est_tip_mov)
            values(
            '$this->nom_tip_mov', 
            '$this->tip_tip_mov', 
            '$this->est_tip_mov');";



    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){

   		$sql="update tipo_movimiento 
               set 
               nom_tip_mov='$this->nom_tip_mov',
               tip_tip_mov='$this->tip_tip_mov', 
               est_tip_mov='$this->est_tip_mov'
               where 
               cod_tip_mov='$this->cod_tip_mov';";
echo $sql;
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from tipo_movimiento where est_tip_mov='$this->est_tip_mov';";
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

   public function filtrar($cod_tip_mov,$nom_tip_mov,$est_tip_mov){

        $where="where 1=1";
        
        $filtro1 = ($cod_tip_mov!="") ? "and cod_tip_mov=$cod_tip_mov":"";
        $filtro2 = ($nom_tip_mov!="") ? "and nom_tip_mov like '%$nom_tip_mov%'":"";
        $filtro3 = ($est_tip_mov!="") ? "and est_tip_mov='$est_tip_mov'":"";

        $sql="select * from tipo_movimiento $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);  
   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>