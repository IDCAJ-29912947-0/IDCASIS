<?php
//==============================================================================
//===   Provvedor: Datos de los Proveedores, no incluye instructores.
/*
cod_pro int Código del Proveedor
rif_pro varchar-15 Rif del proveedor
nom_pro varchar-80 Nombre del Proveedor
ema_pro varchar-80 Email del Proveedor
te1_pro varchar-15 Teléfono 1 del Proveedor
te2_pro varchar-15 Teléfono 2 del proveedor
dir_pro varchar-80 Dirección del Proveedor
est_pro char(1)    Estatus del Proveedor
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_pro, rif_pro, nom_pro, ema_pro, te1_pro, te2_pro, dir_pro

require("../clase/permiso.class.php");
require("../clase/proveedor.class.php");

$obj=new proveedor;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","proveedor"); //Para Auditoria
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
				$obj->mensaje("success","Proveedor agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Proveedor");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_pro);
				$obj->mensaje("success","Proveedor modificado correctamente");
			}else
			{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_pro);
			  	$obj->mensaje("success","Proveedor eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar area.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_pro);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Proveedor.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>