<?php
//==============================================================================
//===   instructor: Datos de los Instructores de los Cursos.
/*
cod_ins int 						(Código del Instructor).
ide_ins varchar-15 					(Cédula del Instructor).
nom_ins varchar-25 					(Nombre del Instructor).
ape_ins varchar-25 					(Apellido del Instructor).
ema_ins varchar-80 					(Correo del Instructor).
te1_ins varchar-15 					(Teléfono 1 del Instructor).
te2_ins varchar-15 					(Teléfono 2 del Instructor).
est_ins char 						(Estatus del Instructor).
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_ins, ide_ins, nom_ins, ape_ins, ema_ins, te1_ins, te2_ins, est_ins

require_once("utilidad.class.php");

class instructor extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into instructor(
            ide_ins, 
            nom_ins, 
            ape_ins, 
            ema_ins, 
            te1_ins, 
            te2_ins, 
            est_ins)
         values(
            '$this->ide_ins', 
            '$this->nom_ins', 
            '$this->ape_ins', 
            '$this->ema_ins', 
            '$this->te1_ins', 
            '$this->te2_ins', 
            '$this->est_ins'
         );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update instructor 
         set 
               ide_ins='$this->ide_ins', 
               nom_ins='$this->nom_ins', 
               ape_ins='$this->ape_ins', 
               ema_ins='$this->ema_ins',
               te1_ins='$this->te1_ins',
               te2_ins='$this->te2_ins',
               est_ins='$this->est_ins'           
         where 
               cod_ins=$this->cod_ins;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from instructor where est_ins='$this->est_ins';";
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

   public function filtrar($cod_ins,$dat_ins,$est_ins){

        $where="where 1=1";
        $filtro1 = ($cod_ins!="") ? "and cod_ins=$cod_ins":"";
        $filtro2 = ($dat_ins!="") ? "and nom_ins like '%$dat_ins%' or ape_ins like '%$dat_ins%'":"";
        $filtro3 = ($est_ins!="") ? "and est_ins='$est_ins'":"";

   	  $sql="select * from instructor $where $filtro1 $filtro2 $filtro3;";
   	  return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>