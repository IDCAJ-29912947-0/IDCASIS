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


require("../clase/permiso.class.php");
require("../clase/carrera.class.php");

$obj=new carrera;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","carrera"); //Para Auditoria
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
				$obj->mensaje("success","Carrera agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar la Carrera");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_car);
				$obj->mensaje("success","Carrera modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute;n registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_car);
			  	$obj->mensaje("success","Carrera eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Carrera.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_car);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus de la Cuenta.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>