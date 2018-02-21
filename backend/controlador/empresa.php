<?php
//==============================================================================
//===   empresa: Nombre de la empresa organizadora del curso.
/*
cod_emp int 				(Código de la empresa)
rif_emp varchar-15 		    (Rif de la empresa)
nom_emp varchar-50 		    (Nombre de la Empresa)
dom_emp varchar-255 		(Domicilio Fiscal)
est_emp char 				(Estatus de la empresa)
A: Activa
I: Inactiva
*/

//==============================================================================
//===	Campos B.D: cod_emp, rif_emp, nom_emp, dom_emp, est_emp


require("../clase/permiso.class.php");
require("../clase/empresa.class.php");

$obj=new empresa;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","empresa"); //Para Auditoria
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
				$obj->mensaje("success","Empresa agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar la Empresa");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_emp);
				$obj->mensaje("success","Empresa modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_emp);
			  	$obj->mensaje("success","Empresa eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Empresa.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_emp);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Empresa.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>