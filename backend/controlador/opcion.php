<?php
//==============================================================================
//===   opcion: Tabla que mostrará dinamicamente las opciones o botones del sistema dependiendo del usuario.
/*
cod_opc int 				(Estas son las opciones del menú del sistema, asignamos permisos a cada una de esas opciones)
nom_opc varchar-25 			(Nombre de la opción.)
fky_modulo modulo(cod_mod)  (Módulo de seguridad al cual pertenece esta opcion.)
url_opc text 				(URL de la opción.)
est_opc char 				(Estatus de la opción)
Valores del Estatus:
A: Activo
I: Inactivo
*/
//==============================================================================
//===	Campos B.D: cod_opc, nom_opc, fky_modulo, url_opc, est_opc

require("../clase/permiso.class.php");
require("../clase/opcion.class.php");

$obj=new opcion;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=21,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","opcion"); //Para Auditoria
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
				$obj->mensaje("success","Opci&oacute;n agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Opci&oacute;n");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_opc);
				$obj->mensaje("success","Opci&oacute;n modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_opc);
			  	$obj->mensaje("success","Acci&oacute; eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Acci&oacute;.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_opc);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus de la Opci&oacute;n.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>