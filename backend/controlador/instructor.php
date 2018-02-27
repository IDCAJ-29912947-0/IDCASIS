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


require("../clase/permiso.class.php");
require("../clase/instructor.class.php");

$obj=new instructor;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","instructor"); //Para Auditoria
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
				$obj->mensaje("success","Instructor agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Instructor");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_ins);
				$obj->mensaje("success","Instructor modificado correctamente");
			}else
			{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_ins);
			  	$obj->mensaje("success","Instructor eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar area.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_ins);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Instructor.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>