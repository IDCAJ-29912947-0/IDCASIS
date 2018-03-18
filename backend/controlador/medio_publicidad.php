<?php
//==============================================================================
//===   Medio Publicidad: medio por el cual el alumno se enteró del curso. 
/*
	cod_med int (Código del Medio Publicitario)
	nom_med varchar-35 (Nombre del Medio Publicitario)
	est_med char (Estatus del Medio Publicitario)
	A: Activa
	I: Inactiva    
*/  

//==============================================================================
//===	Campos B.D: cod_med, nom_med, est_med

require("../clase/permiso.class.php");
require("../clase/medio_publicidad.class.php");

$obj=new medio_publicidad;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","medio_publicidad"); //Para Auditoria
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
				$obj->mensaje("success","Medio Publicitario agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Medio Publicitario");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_med);
				$obj->mensaje("success","Medio Publicitario modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_med);
			  	$obj->mensaje("success","Medio Publicitario eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Medio Publicitario.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_med);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Medio Publicitario.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>