<?php
//==============================================================================
//===   opcion_rol: Tabla que enlaza los opciones que tienen los roles del sistema
/*
fky_opcion (cod_opc)    (opcione Asociado)
fky_rol rol(cod_rol) 	(Rol Asociado)
est_opc_rol char 			(Estatus)
Valores del Estatus:
A: Activo
I: Inactivo
*/                         
//==============================================================================
//===	Campos B.D: fky_opcione,fky_rol,est_opc_rol

class opcion_rol extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into opcion_rol(fky_opcion,fky_rol,est_opc_rol)values('$this->fky_opcion','$this->fky_rol','$this->est_opc_rol');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update _______ set where _______;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from _________ where ;";
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

   public function filtrar($fky_opcion,$fky_rol,$est_opc_rol){

        $where="where 1=1";
        
        $filtro1 = ($fky_opcion!="") ? "and fky_opcion=$fky_opcion":"";
        $filtro2 = ($fky_rol!="") ? "and fky_rol='$fky_rol'":"";
        $filtro3 = ($est_opc_rol!="") ? "and est_opc_rol='$est_opc_rol'":"";

         $sql="select * from opcion_rol $where $filtro1 $filtro2 $filtro3;";

         return $this->ejecutar($sql); 

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase

?>