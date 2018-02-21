<?php
//==============================================================================
//===   contenido: Cada Item representa un contenido que será visto en el curso y se imprimirá por la parte de atrás del certificado.
/*
cod_con int 						(Código del Contenido)
nom_con varchar-80					(Nombre del contenido, es individual los registros)
est_con char   						(Estatus del contenido)
Valores del estatus:
A: Activo
I: Inactivo
*/                     
//==============================================================================
//===	Campos B.D:  cod_con, nom_con, est_con

require("../clase/permiso.class.php");
require("../clase/contenido.class.php");

$obj=new contenido;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","contenido"); //Para Auditoria
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
				$obj->mensaje("success","Contenido agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el contenido");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_con);
				$obj->mensaje("success","Contenido modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_con);
			  	$obj->mensaje("success","Contenido eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar contenido.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_con);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del contenido.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>