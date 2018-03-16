<?php
//==============================================================================
/* tipo_requisito: Los tipos de requisitos pueden ser Requisito de Edad, Requisito de Conocimientos Previos,
 Materiales o equipos a traer al curso, Estudiante o Profesional de algún Área.

cod_tip_req int         (Código del Requisito), 
nom_tip_req varchar-50  (Nombre del Tipo de Requisito), 
est_tip_req char        (Estatus del Tipo de Requisito)

*/                        
//==============================================================================
//===	Campos B.D: cod_tip_req, nom_tip_req, est_tip_req


require("../clase/permiso.class.php");
require("../clase/tipo_requisito.class.php");

$obj=new tipo_requisito;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","tipo_requisito"); //Para Auditoria
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
				$obj->mensaje("success","Tipo de Requisito agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Tipo de Requisito");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_tip_req);
				$obj->mensaje("success","Tipo de Requisito modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_req);
			  	$obj->mensaje("success","Tipo de Requisito eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar el tipo de Requisito.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_req);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del tipo de Requisito.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>