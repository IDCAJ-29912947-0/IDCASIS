<?php
//==============================================================================
//===   tipo_pago: formas de pago
/*
cod_tip_pag int 			(Código del tipo de pago)
nom_tip_pag varchar-25 		(Nombre el tipo de pago)
est_tip_pag char 			(Estatus del tipo de pago)
Estatus de los tipos de Pago:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_tip_pag, nom_tip_pag, est_tip_pag

require("../clase/permiso.class.php");
require("../clase/tipo_pago.class.php");

$obj=new tipo_pago;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","tipo_pago"); //Para Auditoria
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
				$obj->mensaje("success","Tipo de pago agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Tipo de Pago");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_tip_pag);
				$obj->mensaje("success","Tipo de pago modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_pag);
			  	$obj->mensaje("success","Tipo de pago eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar el tipo de pago.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_pag);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del tipo de pago.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>