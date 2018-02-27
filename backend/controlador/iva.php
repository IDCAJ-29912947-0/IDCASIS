<?php
//==============================================================================
//===   iva: Iva asociado al momento de facturar.
/*
cod_iva int 				(Código del IVA)
val_iva float 				(Valor del IVA: 8%,12%)
ini_iva date 				(Fecha de Inicio de Vigencia del Iva)
fin_iva date 				(Fecha de finalización del iva)
est_iva char 				(Estatus del IVA)
A: Activo
I: Inactivo
*/
//==============================================================================
//===	Campos B.D: cod_iva, val_iva, ini_iva, fin_iva, est_iva

require("../clase/permiso.class.php");
require("../clase/iva.class.php");

$obj=new iva;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","iva"); //Para Auditoria
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
				$obj->mensaje("success","IVA agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el IVA");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_iva);
				$obj->mensaje("success","IVA modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_iva);
			  	$obj->mensaje("success","IVA eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar IVA.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_iva);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del IVA.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>