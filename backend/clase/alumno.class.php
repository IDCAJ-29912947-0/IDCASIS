<?php
//==============================================================================
//===   alumno: Tabla que guardará todos los datos de los alumnos que participen en los cursos.
/*
cod_alu int 			(Código Autoincremental del Alumno)
ide_alu varchar-15 		(Cédula del Alumno o Pasaporte)
nom_alu varchar-25 		(Nombre del Alumno)
ape_alu varchar-25 		(Apellido del Alumno)
sex_alu char 			(Sexo del Participante)
ema_alu varchar-80 		(Correo Electrónico)
te1_alu varchar-15 		(Telefono 1 del alumno)
te2_alu varchar-15 		(Telefono 2 del alumno)
ins_alu varchar-20 		(Instagram del Alumno)
fky_pais pais(cod_pai) 	(Apunta a la tabla Pais)
fky_universidad universidad(cod_uni) (Apunta a la tabla Universidad)
fky_carrera   int        (Carrera Universitaria)
est_alu char 			(Estatus de los alumnos)
1) Activo. Valor: A
2) Suspendido. Valor: S, el motivo se debe a no cumplir con las políticas de la empresa.
3) Inactivo: Valor: I, el alumno se fué del pais, no quiere recibir correos.
*/                       
//==============================================================================
//===	Campos B.D: cod_alu, ide_alu, nom_alu, ape_alu, sex_alu, ema_alu, te1_alu, te2_alu, ins_alu, fky_pais,fky_universidad, fky_carrera, est_alu 
require_once("utilidad.class.php");
class alumno extends utilidad
{
	public $cod_alu;
	public $ide_alu;
	public $nom_alu;
	public $ape_alu;
	public $sex_alu; 
	public $ema_alu; 
	public $te1_alu; 
	public $te2_alu;
	public $ins_alu; 
	public $fky_pais;
	public $fky_universidad;
  public $fky_carrera;
	public $est_alu; 

//==============================================================================
   public function agregar(){

    	$sql="insert into alumno(
            ide_alu, 
            nom_alu, 
            ape_alu, 
            sex_alu, 
            ema_alu, 
            te1_alu, 
            te2_alu, 
            ins_alu, 
            fky_pais,
            fky_universidad,
            fky_carrera,
            est_alu)
    	   values
    	     ('$this->ide_alu', 
            '$this->nom_alu', 
            '$this->ape_alu', 
            '$this->sex_alu', 
            '$this->ema_alu', 
            '$this->te1_alu', 
            '$this->te2_alu', 
            '$this->ins_alu', 
             $this->fky_pais,
             $this->fky_universidad,
             $this->fky_carrera,
            '$this->est_alu');";
            echo $sql;
    	return $this->ejecutar($sql);
    	
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update alumno set 
      ide_alu='$this->ide_alu', 
      nom_alu='$this->nom_alu', 
      ape_alu='$this->ape_alu', 
      sex_alu='$this->sex_alu', 
      ema_alu='$this->ema_alu', 
      te1_alu='$this->te1_alu', 
      te2_alu='$this->te2_alu', 
      ins_alu='$this->ins_alu', 
      fky_pais=$this->fky_pais,
      fky_universidad=$this->fky_universidad, 
      fky_carrera=$this->fky_carrera,
      est_alu='$this->est_alu' 
      where 
      cod_alu=$this->cod_alu;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from alumno where est_alu='$this->est_alu';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from alumno where cod_alu=$this->cod_alu;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update alumno set est_alu='$this->est_alu' where cod_alu=$this->cod_alu;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_alu,$ide_alu,$nom_alu,$ape_alu,$te1_alu,$ema_alu){
        
        $where="where 1=1";

        $filtro1 = ($cod_alu!="") ? "and cod_alu=$cod_alu":"";
        $filtro2 = ($ide_alu!="") ? "and ide_alu='$ide_alu'":"";
        $filtro3 = ($nom_alu!="") ? "and nom_alu like '%$nom_alu%'":"";
        $filtro4 = ($ape_alu!="") ? "and ape_alu like '%$ape_alu%'":"";        
        $filtro5 = ($te1_alu!="") ? "and (te1_alu='$te1_alu' or te2_alu='$te1_alu')":"";  
        $filtro6 = ($ema_alu!="") ? "and ema_alu='$ema_alu'":"";

   		  $sql="select * from alumno $where $filtro1 $filtro2 $filtro3 $filtro4 $filtro5 $filtro6";
       
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>