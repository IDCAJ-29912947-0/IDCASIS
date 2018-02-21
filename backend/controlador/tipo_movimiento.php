<?php
//==============================================================================
//===   tipo_movimiento: Los tipos de Movimientos para controlar los ingresos y egresos del sistema.                       
//==============================================================================
/*
cod_tip_mov int 			(Código del tipo de movimiento)
nom_tip_mov varchar-25 	(Nombre del tipo de movimiento)
acc_tip_mov char        (Acción del  Tipo de Movimiento. I: Ingreso, E: Egreso)
est_tip_mov char 			(Estatus del tipo de movimiento)
*/
//==============================================================================

//===	Campos B.D: cod_tip_mov, nom_tip_mov, est_tip_mov

require("../clase/permiso.class.php");
require("../clase/tipo_movimiento.class.php");

$obj=new tipo_movimiento;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","tipo_movimiento"); //Para Auditoria
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
				$obj->mensaje("success","Tipo de Movimiento agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Tipo de Movimiento");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_tip_mov);
				$obj->mensaje("success","Tipo de Movimiento modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_mov);
			  	$obj->mensaje("success","Tipo de Movimiento eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Tipo de Movimiento.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_mov);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Tipo de Movimiento.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>