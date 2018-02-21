<?php
//==============================================================================
//===   area: Área del Curso: Diseño Gráfico, Informática, Electrónica, Comunicación Social, Etc 
/*
	cod_are int (Código del Área)
	nom_are varchar-35 (Nombre del Area)
	est_are char (Estatus del Area)
	A: Activa
	I: Inactiva    
*/  

//==============================================================================
//===	Campos B.D: cod_are, nom_are, est_are

require("../clase/permiso.class.php");
require("../clase/area.class.php");

$obj=new area;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","area"); //Para Auditoria
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
				$obj->mensaje("success","Área agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Area");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_are);
				$obj->mensaje("success","Area modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_are);
			  	$obj->mensaje("success","Area eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar area.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_are);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del area.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>