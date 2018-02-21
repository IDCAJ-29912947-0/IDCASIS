<?php
//==============================================================================
//===   requisito: Guarda los datos de los requisitos que se solicitarán en general.
/*
cod_req int 		(Código del requisito).
nom_req varchar-80 	(Nombre del requisito).
est_req char
Estatus del Requisito:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_req, nom_req, est_req
require_once("utilidad.class.php");
class requisito extends utilidad
{
    public $cod_req;
    public $nom_req;
    public $est_req;

//==============================================================================
   public function agregar(){

    	$sql="insert into requisito(
            nom_req,
            est_req)
            values(
            '$this->nom_req', 
            '$this->est_req');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update requisito 
               set 
               nom_req='$this->nom_req',
               est_req='$this->est_req' 
               where
               cod_req='$this->cod_req';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from requisito where est_req='$this->est_req';";
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

   public function filtrar($cod_req,$nom_req,$est_req){

        $where="where 1=1";
        
        $filtro1 = ($cod_req!="") ? "and cod_req=$cod_req":"";
        $filtro2 = ($nom_req!="") ? "and nom_req like '%$nom_req%'":"";
        $filtro3 = ($est_req!="") ? "and est_req='$est_req'":"";

        $sql="select * from requisito $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql); 

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>