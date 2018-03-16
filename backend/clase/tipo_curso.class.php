<?php
//==============================================================================
//===   tipo_curso: Guarda los datos generales de los diferentes cursos que impartimos.
/*
cod_tip_cur int 							(Código del Tipo de Curso. Autoincremental)
nom_tip_cur varchar-50 						(Nombre del tipo de curso)
hor_tip_cur int 							(Numero de Horas Académicas)
cer_tip_cur varchar-50 						(Nombre que aparecerá en el certificado)
des_tip_cur text              (Descripción del tipo de curso, aclara al alumno de qué se trata el curso)
obj_tip_cur varchar-255 					(Objetivo del Curso)
min_tip_cur int 							(Número mínimo de cupos)
max_tip_cur int 							(Numero maximo de cupos)
ava_tip_cur char 							Valores:
											A: Certificado Avalado por el Ministerio de Educación
											N: Certificado No Avalado por el Ministerio de Educación
url_tip_cur text 						    (URL del contenido del curso comprimido en un .zip)
fky_area area(cod_are)						(Area a la que pertenece el curso)
fky_empresa empresa(cod_emp) 				(Empresa que organiza el curso)
est_tip_cur char
Valores del Estatus:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_tip_cur, nom_tip_cur, hor_tip_cur, cer_tip_cur, obj_tip_cur, min_tip_cur, max_tip_cur, ava_tip_cur,url_tip_cur, fky_area, fky_empresa, est_tip_cur

require_once("utilidad.class.php");

class tipo_curso extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into tipo_curso(
      nom_tip_cur, 
      hor_tip_cur, 
      cer_tip_cur, 
      des_tip_cur,      
      obj_tip_cur, 
      min_tip_cur, 
      max_tip_cur, 
      ava_tip_cur,
      url_tip_cur, 
      fky_area, 
      fky_empresa, 
      est_tip_cur
      )values(
      '$this->nom_tip_cur', 
       $this->hor_tip_cur, 
      '$this->cer_tip_cur', 
      '$this->des_tip_cur',      
      '$this->obj_tip_cur', 
       $this->min_tip_cur, 
       $this->max_tip_cur, 
      '$this->ava_tip_cur',
      '$this->url_tip_cur', 
       $this->fky_area, 
       $this->fky_empresa, 
      '$this->est_tip_cur');";
      echo $sql;
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update tipo_curso 
         set 
               nom_tip_cur='$this->nom_tip_cur', 
               hor_tip_cur=$this->hor_tip_cur, 
               cer_tip_cur='$this->cer_tip_cur', 
               obj_tip_cur='$this->obj_tip_cur', 
               min_tip_cur=$this->min_tip_cur, 
               max_tip_cur= $this->max_tip_cur, 
               max_tip_cur='$this->max_tip_cur', 
               des_tip_cur='$this->des_tip_cur', 
               fky_area=$this->fky_area, 
               fky_empresa=$this->fky_empresa, 
               est_tip_cur='$this->est_tip_cur'
         where 
               cod_tip_cur=$this->cod_tip_cur;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select 
                  t.*,a.nom_are,e.nom_emp 
            from 
                  tipo_curso t,area a,empresa e 
            where 
                  t.fky_area=a.cod_are and
                  t.fky_empresa=e.cod_emp and 
                  t.est_tip_cur='$this->est_tip_cur';";
                
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
   public function modificar_url($cod_tip_cur,$url_nueva){

        $sql="update tipo_curso set url_tip_cur='$url_nueva' where cod_tip_cur=$cod_tip_cur";
        return $this->ejecutar($sql);  
   }

//==============================================================================   

      public function subir_material($url_original,$tmp_name,$carpeta,$nombre_final)
   {
         $tmp = explode(".",$url_original);
         $extension = end($tmp);
         $subir= move_uploaded_file($tmp_name, $carpeta.$nombre_final.".".$extension);
         if($subir==true)
         {
           echo $nombre_final.".".$extension;
           return $nombre_final.".".$extension;
         }  else
             return false;
   }

  //==============================================================================   
 

   public function filtrar($cod_tip_cur,$nom_tip_cur,$fky_area,$fky_empresa,$est_tip_cur){

        $filtro1 = ($cod_tip_cur!="") ? " and cod_tip_cur=$cod_tip_cur":"";
        $filtro2 = ($nom_tip_cur!="") ? " and nom_tip_cur like '%$nom_tip_cur%'":"";
        $filtro3 = ($fky_area!="") ? " and fky_area='$fky_area'":"";       
        $filtro4 = ($fky_empresa!="") ? " and fky_empresa='$fky_empresa'":"";
        $filtro5 = ($est_tip_cur!="") ? " and est_tip_cur='$est_tip_cur'":"";   

   		$sql="select t.*,a.nom_are,e.nom_emp 
         from 
               tipo_curso t,area a,empresa e 
         where 
               t.fky_area=a.cod_are and
               t.fky_empresa=e.cod_emp
               $filtro1
               $filtro2
               $filtro3
               $filtro4
               $filtro5;";
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================



}//Fin de la Clase
?>