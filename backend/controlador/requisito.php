<?php
//==============================================================================
//===   requisito: Guarda los datos de los requisitos que se solicitarán en general.
/*
cod_req int 		(Código del requisito).
nom_req varchar-80 	(Nombre del requisito).
est_req char
Estatus del Requisito:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_req, nom_req, est_req

require("../clase/permiso.class.php");
require("../clase/requisito.class.php");

$obj=new requisito;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","requisito"); //Para Auditoria
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
				$obj->mensaje("success","Requisito agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el requisito");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_req);
				$obj->mensaje("success","Requisito modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_req);
			  	$obj->mensaje("success","Requisito eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Requisito.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_req);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Requisito.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>