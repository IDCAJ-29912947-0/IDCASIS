<?php
//==============================================================================
//===   universidad: Datos de la Universidad
/*
cod_uni int 			 (Código de la Universidad)
nom_uni varchar-25		 (Nombre de la Universidad)
est_uni char 			 (Estatus de la Universidad)
Valores del Estatus:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//== Columnas de la Base de Datos: cod_uni,nom_uni,est_uni

require_once("utilidad.class.php");

class universidad extends utilidad
{

	public $cod_uni;
	public $nom_uni;
	public $est_uni;

//==============================================================================
   public function agregar(){

    	$sql="insert into universidad
      (nom_uni,
      est_uni)
      values
      ('$this->nom_uni',
       '$this->est_uni');";
       echo $sql;
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update universidad 
         set 
         nom_uni='$this->nom_uni',
         est_uni='$this->est_uni'
         where 
         cod_uni='$this->cod_uni';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from universidad where est_uni='$this->est_uni';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from ______ where ";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_uni,$nom_uni,$est_uni){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_uni!="") ? "and cod_uni=$cod_uni":"";
        $filtro2 = ($nom_uni!="") ? "and nom_uni like '%$nom_uni%'":"";
        $filtro3 = ($est_uni!="") ? "and est_uni='$est_uni'":"";

           $sql="select * from universidad $where $filtro1 $filtro2 $filtro3;";

          return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase

?>