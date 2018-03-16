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

require("../clase/permiso.class.php");
require("../clase/falla.class.php");
require("../clase/alumno.class.php");

$obj=new falla;
$objAlumno=new alumno;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","falla"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 

	switch ($_REQUEST["accion"]) {

		case 'agregar':    
		    $obj->fec_fal=date("Y-m-d h:i:s");
		    $alu=$objAlumno->filtrar($cod_alu="",$obj->ide_alu,$nom_alu="",$ape_alu="",$te1_alu="",$ema_alu="");
		    $alumno=$objAlumno->extraer_dato($alu);
		    $obj->fky_alumno=$alumno["cod_alu"];
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$obj->mensaje("success","Falla agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar Falla");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_fal);
				$obj->mensaje("success","Falla modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_fal);
			  	$obj->mensaje("success","Falla eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Falla.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_fal);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus de la Falla.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>