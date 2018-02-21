<?php
//==============================================================================
//===   universidad: Datos de la Universidad
/*
cod_uni int 			 (Código de la Universidad)
nom_uni varchar-25		 (Nombre de la Universidad)
est_uni char 			 (Estatus de la Universidad)
Valores del Estatus:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//== Columnas de la Base de Datos: cod_uni,nom_uni,est_uni

require("../clase/permiso.class.php");
require("../clase/universidad.class.php");

$obj=new universidad;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","universidad"); //Para Auditoria
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
				$obj->mensaje("success","Universidad agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Universidad");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_uni);
				$obj->mensaje("success","Universidad modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_uni);
			  	$obj->mensaje("success","Universidad eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar universidad.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_uni);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus de la universidad.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>