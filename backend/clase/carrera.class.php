<?php
//==============================================================================
//===   Carrera: Datos de la carrera universitaria
 /*
cod_car           integer    (Código de la Carrera Universitaria)
nom_car           varchar-50 (Nombre de la Carrera Universitaria)
fky_universidad   integer    (Universidad donde estudia o estudió)
fky_area           integer    (Código del Área)
est_car           char       (Estatus de la Carrera)
*/  
//==============================================================================
//===	Campos B.D:  cod_car, nom_car, fky_universidad, fky_area, est_car

require_once("utilidad.class.php");

class carrera extends utilidad
{

  public $cod_car;
  public $nom_car; 
  public $fky_universidad;
  public $fky_area; 
  public $est_car;	
//==============================================================================
   public function agregar(){

    	$sql="insert into carrera
              (nom_car,
              fky_universidad,
              fky_area,
              est_car)
            values
            ('$this->nom_car',
              $this->fky_universidad,
              $this->fky_area,
             '$this->est_car');";

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update carrera 
            set 
                nom_car='$this->nom_car',
                fky_universidad=$this->fky_universidad,
                fky_area=$this->fky_area,                                
                est_car='$this->est_car' 
            where cod_car='$this->cod_car';";

   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from carrera where est_car='$this->est_car';";
     
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

   public function filtrar($cod_car,$nom_car,$est_car){
              
        $filtro1 = ($cod_car!="") ? " and cod_car=$cod_car":"";
        $filtro2 = ($nom_car!="") ? " and nom_car like '%$nom_car%'":"";
        $filtro3 = ($est_car!="") ? " and est_car='$est_car'":"";

   		  $sql="select c.*,u.nom_uni,a.nom_are 
              from carrera c, universidad u, area a
              where
              c.fky_universidad=u.cod_uni and
              c.fky_area=a.cod_are
              $filtro1 $filtro2 $filtro3;";

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>