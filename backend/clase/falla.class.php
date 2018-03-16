<?php
//== Falla: tabla que guarda las fallas que prsentan las laptops.
/*
cod_fal int                (Código de la falla)
fec_fal datetime           (Fecha de la falla)
lap_fal int                (N° de laptop)
obs_fal text               (Observación de la falla)
fky_alumno alumno(cod_alu) (Alumno que reporta la falla)
est_fal char
Estatus de la falla.
A: Ticket Abierto, por resolver.
R: Resuelto el problema.
*/
//== Datos de la BD: cod_fal, fec_fal, lap_fal, obs_fal, fky_alumno, est_fal

require_once("utilidad.class.php");

class falla extends utilidad
{

  public $cod_fal;
  public $fec_fal; 
  public $lap_fal;
	public $obs_fal;
  public $fky_alumno; 
  public $est_fal;
//==============================================================================
   public function agregar(){

    	$sql="insert into falla(
            fec_fal,
            lap_fal, 
            obs_fal, 
            fky_alumno, 
            est_fal)
            values
            (
            '$this->fec_fal',
            '$this->lap_fal',
            '$this->obs_fal',
            '$this->fky_alumno',
            '$this->est_fal'
            );";
      echo $sql;      

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   
   	 $sql="update falla 
           set 
              lap_fal=$this->lap_fal,
              obs_fal='$this->obs_fal',
              fky_alumno=$this->fky_alumno,
              est_fal='$this->est_fal'
          where 
              cod_fal='$this->cod_fal';";

   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){

   		$sql="select * from falla where est_fal='$this->est_fal';";
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

   public function filtrar($cod_fal,$fec_fal,$est_fal){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_fal!="") ? "and cod_fal=$cod_fal":"";
        $filtro2 = ($fec_fal!="") ? "and fec_fal>='$fec_fal' and fec_fal<='$fec_fal'":"";
        $filtro3 = ($est_fal!="") ? "and est_fal='$est_fal'":"";

   		  $sql="select * from falla $where $filtro1 $filtro2 $filtro3;";

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>