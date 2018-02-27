<?php
//==============================================================================
//== Horario: tabla que guarda los horarios de los cursos: Ej: Martes y Jueves
/*
cod_hor int Código del Horario, Auto Incremental
nom_hor varchar-50
Nombre del Horario. Ejemplos:
                    Lunes, Miércoles, Viernes
                    Martes y Jueves
                    Sábados
                    Domingos
est_hor char
Estatus. 
Valores:
A: Activo
I: Inactivo
*/
//==============================================================================
//===	Campos B.D: cod_hor, nom_hor, est_hor

require("../clase/permiso.class.php");
require("../clase/horario.class.php");

$obj=new horario;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","horario"); //Para Auditoria
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
				$obj->mensaje("success","Horario agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Horario");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_hor);
				$obj->mensaje("success","Horario modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_hor);
			  	$obj->mensaje("success","Horario eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Horario.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_hor);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Horario.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>