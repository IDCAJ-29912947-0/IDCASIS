<?php
//==============================================================================
//===   requisito: Guarda los datos de los requisitos que se solicitarán en general.
/*
cod_req int 		(Código del requisito).
nom_req varchar-80 	(Nombre del requisito).
fky_tipo_requisito  (Tipo de Requisito)
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
    public $fky_tipo_requisito;   
    public $est_req;

//==============================================================================
   public function agregar(){

    	$sql="insert into requisito(
            nom_req,
            fky_tipo_requisito,
            est_req)
            values(
            '$this->nom_req',
             $this->fky_tipo_requisito,            
            '$this->est_req');";
            echo $sql;
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update requisito 
               set 
               nom_req='$this->nom_req',
               fky_tipo_requisito=$this->fky_tipo_requisito,
               est_req='$this->est_req' 
               where
               cod_req='$this->cod_req';";

             
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select r.*,tr.nom_tip_req from requisito r,tipo_requisito tr where r.fky_tipo_requisito=tr.cod_tip_req and est_req='$this->est_req';";
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
      
        $filtro1 = ($cod_req!="") ? "and cod_req=$cod_req":"";
        $filtro2 = ($nom_req!="") ? "and nom_req like '%$nom_req%'":"";
        $filtro3 = ($est_req!="") ? "and est_req='$est_req'":"";

        $sql="select r.*,tr.nom_tip_req 
              from 
              requisito r,tipo_requisito tr 
              where 
              r.fky_tipo_requisito=tr.cod_tip_req 
              $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql); 

   }// Fin Filtrar
//==============================================================================         

}//Fin de la Clase
?>