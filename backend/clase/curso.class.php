<?php
//==============================================================================
//===   curso: Datos del curso impartido por Ingeniería Digital o Ingeniería Web F.P.
/*
cod_cur int Código del Curso
ini_cur date Fecha de Inicio del Curso
fin_cur date Fecha de Finalización del Curso
bas_cur float Base Imponible del Curso
iva_cur float IVA del Curso en Bs
pre_cur float Precio del Curso con IVA Incluido
dol_cur int Precio en Dólares
pag_cur     Pago del instructor en porcentaje
obs_cur varchar-255
Obervación del Curso, por ejemplo, si es en la semana de
feria o semana santa la gente debe saber que el curso igual
se dictará
fk1_turno turno(cod_tur)
fk2_turno turno(cod_tur)
fky_horario horario(cod_hor)
fky_tipo_curso tipo_curso(cod_tip_cur) Tipo de Curso:
                                       Ejemplo:
                                       1 - Photoshop
                                       2 - Autocad
                                       3 -Community Manager
fky_instructor instructor(cod_ins)     Instructor:     
                                       Ejemplo:     
                                       1 - Pedro Parra     
                                       2 - Orlfraisi Carvajal     
                                       3 - Ricardo Gil
fky_modalidad modalidad(cod_mod)       Modalidad del Curso.
                                       1) Presencial
                                       2) Online
                                       3) Semi- Presencial
est_cur char                           Estatus del Curso:
                                       A: Activo, en inscripciones abiertas
                                       I: Inactivo o Cancelado
                                       C: Por empezar, pero ya se encuentra lleno
*/                       
//==============================================================================
//===	Campos B.D:  cod_cur,fec_ini,fec_fin,bas_cur,iva_cur,pre_cur,dol_cur,pag_cur,obs_cur,fk1_turno,fk2_turno,fky_horario, fky_tipo_curso, fky_instructor, fky_modalidad, est_cur


require_once("utilidad.class.php");
class curso extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into curso(
            ini_cur,
            fin_cur,
            bas_cur,
            iva_cur,
            pre_cur,
            dol_cur,
            pag_cur,
            obs_cur,
            fk1_turno,
            fk2_turno,
            fky_horario, 
            fky_tipo_curso, 
            fky_instructor, 
            fky_modalidad, 
            est_cur
      )values(
            '$this->ini_cur',
            '$this->fin_cur',
             $this->bas_cur,
             $this->iva_cur,
             $this->pre_cur,
             $this->dol_cur,
             $this->pag_cur,
            '$this->obs_cur',
             $this->fk1_turno,
             $this->fk2_turno,
             $this->fky_horario, 
             $this->fky_tipo_curso, 
             $this->fky_instructor, 
             $this->fky_modalidad, 
            '$this->est_cur');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update curso 
               set 
                     ini_cur='$this->ini_cur',
                     fin_cur='$this->fin_cur',
                     bas_cur=$this->bas_cur,
                     iva_cur=$this->iva_cur,
                     pre_cur=$this->pre_cur,
                     dol_cur=$this->dol_cur,
                     pag_cur=$this->pag_cur,
                     obs_cur='$this->obs_cur',
                     fk1_turno=$this->fk1_turno,
                     fk2_turno=$this->fk2_turno,
                     fky_horario=$this->fky_horario, 
                     fky_tipo_curso=$this->fky_tipo_curso, 
                     fky_instructor=$this->fky_instructor', 
                     fky_modalidad=$this->fky_modalidad, 
                     est_cur='$this->est_cur'               
               where 
                     cod_cur=$this->cod_cur;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select c.*,t.*,h.nom_hor,tc.nom_tip_cur,i.nom_ins,i.ape_ins,m.nom_mod
               from 
                      curso c,turno t,horario h,tipo_curso tc ,instructor i,modalidad m
               where 
                     c.fk1_turno=t.cod_tur and 
                     c.fky_horario=h.cod_hor and
                     c.fky_tipo_curso=tc.cod_tip_cur and
                     c.fky_instructor=i.cod_ins and
                     c.fky_modalidad=m.cod_mod and
                     c.est_cur='$this->est_cur';";
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

   public function filtrar($cod_cur,$fky_tipo_curso,$cod_ins,$cod_mod,$ini_cur,$fin_cur,$est_cur){

          $filtro1 = ($cod_cur!="") ? " and cod_cur=$cod_cur":"";
          $filtro2 = ($cod_ins!="") ? " and fky_instructor='$cod_ins'":"";
          $filtro3 = ($cod_mod!="") ? " and fky_modalidad=$cod_mod":"";
          $filtro4 = ($ini_cur!="") ? " and (ini_cur>='$ini_cur' && ini_cur<='$fin_cur')":"";
          $filtro5 = ($est_cur!="") ? " and est_cur='$est_cur'":"";
          $filtro6 = ($fky_tipo_curso!="") ? " and fky_tipo_curso='$fky_tipo_curso'":"";

   	 	 $sql="select c.*,i.nom_ins,i.ape_ins,h.nom_hor,m.nom_mod, tc.nom_tip_cur from curso c, instructor i, horario h, modalidad m, tipo_curso tc
        where 
        c.fky_instructor=i.cod_ins and
        c.fky_horario=h.cod_hor and
        c.fky_modalidad=m.cod_mod and
        c.fky_tipo_curso=tc.cod_tip_cur
        $filtro1 
        $filtro2 
        $filtro3 
        $filtro4 
        $filtro5 
        $filtro6;";
     
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
