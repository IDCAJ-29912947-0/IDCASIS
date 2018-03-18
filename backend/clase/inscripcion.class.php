<?php
//==============================================================================
//===   inscripcion: Tabla que guarda los datos de las inscripciones a los cursos. Si el estatus de la inscripción es 'P' se considera que solo esta pre-inscrito.  
/*
cod_ins int  						(Código de la Inscripción.)
fec_ins date 						(Fecha de Inscripción.)
hor_ins time 						(Hora de Inscripción)
fky_alumno alumno(ide_alu) 	(Clave Foránea hacia la tabla alumno.)
fky_curso  curso(cod_cur) 		(Clave Foránea hacia la tabla Curso.)
fky_factura factura(num_fac) 	(Clave Foránea hacia la tabla Factura.)
est_ins char 						(Estatus)
Valores del Estatus:
P -> Pre Inscrito
I -> Inscrito Correctamente.
X -> Inscrito pero luego de que el curso estaba lleno
C -> Inscrito pero el pago no pudo ser comprobado.
A -> Cupo apartado a familiares y amigos
*/                      
//==============================================================================
//===	Campos B.D: cod_ins, fec_ins, hor_ins, fky_alu, fky_cur,fky_factura, est_ins

require_once("utilidad.class.php");
class inscripcion extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into inscripcion(
                 fec_ins, 
                 hor_ins, 
                 fky_alumno, 
                 fky_curso,
                 fky_factura,
                 fky_medio_publicidad,
                 est_ins)
            values(
                 '$this->fec_ins', 
                 '$this->hor_ins', 
                  $this->fky_alumno, 
                  $this->fky_curso,
                  $this->fky_factura, 
                  $this->fky_medio_publicidad,                  
                 '$this->est_ins');";

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   	
      	$sql="update inscripcion        
               set 
                 fec_ins='$this->fec_ins', 
                 hor_ins='$this->hor_ins', 
                 fky_alumno=$this->fky_alumno, 
                 fky_curso=$this->fky_curso,
                 fky_factura=$this->fky_factura, 
                 est_ins='$this->est_ins'               
               where 
                 cod_ins=$this->cod_ins;";

   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		
         $sql="select * from inscripcion where est_ins='$this->est_ins';";
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

   public function filtrar($cod_ins, $fec_ins, $fky_alumno, $fky_curso, $est_ins){

         $filtro1=($cod_ins!="")?" and cod_ins=$cod_ins":"";
         $filtro2=($fec_ins!="")?" and fec_ins='$fec_ins'":"";
         $filtro3=($fky_alumno!="")?" and fky_alumno=$fky_alumno":"";
         $filtro4=($fky_curso!="")?" and fky_curso=$fky_curso":"";
         $filtro5=($est_ins!="")?" and est_cur='$est_cur'":"";                  

   		$sql="select i.*,a.ide_alu,a.nom_alu,a.ape_alu,c.ini_cur, tc.nom_tip_cur
               from inscripcion i, alumno a, curso c,  tipo_curso tc
               where 
               i.fky_alumno=a.cod_alu,
               i.fky_curso=c.cod_cur,
               c.fky_tipo_curso=tc.cod_tip_cur
               $filtro1 $filtro2 $filtro3 $filtro4 $filtro5;";

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
