<?php
//==============================================================================
//===   requisito_por_curso: Enlaza los los cursos con los requisitos necesarios para hacer el curso.
/*
cod_req_cur int 				 		(Código del requisito). 
fky_requisito requisito(cod_req) 		(Requisito del Curso).
fky_tipo_curso tipo_curso(cod_tip_cur)  (Tipo de Curso: Photoshop, Autocad, Community Manager, etc)
obl_req char 							(Indica si el requisito es obligatorio).
										Valores:
										O: Obligatorio
										N: Opcional
*/                      
//==============================================================================
//===	Campos B.D:  cod_req_cur, fky_requisito, fky_tipo_curso, ini_req, fin_req obl_req, est_req

require_once("utilidad.class.php");

class requisito_por_curso extends utilidad
{

//==============================================================================
   public function agregar()
   {
      $sql="insert into requisito_por_curso(
            fky_requisito,
            fky_tipo_curso,
            obl_req,
            obs_req
          ) values(
             $this->fky_requisito,
             $this->fky_tipo_curso,
            '$this->obl_req',
            '$this->obs_req'
          )";
          echo $sql;
      return $this->ejecutar($sql);
   }

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
   		$sql="delete from requisito_por_curso where fky_tipo_curso=$this->fky_tipo_curso;";
      echo "<br> $sql";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($fky_requisito,$fky_tipo_curso){

        $filtro1=($fky_requisito!="")?" and fky_requisito=$fky_requisito":""; 
        $filtro2=($fky_tipo_curso!="")?" and fky_tipo_curso=$fky_tipo_curso":""; 

   		$sql="select rc.*,r.nom_req,tc.nom_tip_cur 
               from 
               requisito_por_curso rc, requisito r,tipo_curso tc 
               where rc.fky_requisito=r.cod_req and
                     rc.fky_tipo_curso=tc.cod_tip_cur $filtro1 $filtro2;";
      echo "$sql";              

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase

?>