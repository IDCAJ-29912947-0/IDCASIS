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
                                       I: Inactivo
                                       C: Por empezar, pero ya se encuentra lleno
*/                       
//==============================================================================
//===	Campos B.D:  cod_cur,fec_ini,fec_fin,bas_cur,iva_cur,pre_cur,dol_cur,obs_cur,fk1_turno,fk2_turno,fky_horario, fky_tipo_curso, fky_instructor, fky_modalidad, est_cur

require("../clase/permiso.class.php");
require("../clase/curso.class.php");

$obj=new curso;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","curso"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 

	switch ($_REQUEST["accion"]) {

		case 'agregar':    
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$obj->mensaje("success","Curso agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Curso");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_cur);
				$obj->mensaje("success","Curso modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_cur);
			  	$obj->mensaje("success","Curso eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar el Curso.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_cur);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Curso.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>