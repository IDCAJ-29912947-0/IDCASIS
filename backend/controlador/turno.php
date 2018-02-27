<?php
//==============================================================================
//==Turno: turno del curso. Mañana, Tarde
/*
cod_tur int Código del Turno
nom_tur varchar-20 Nombre del Turno
ini_tur time  	   Hora de Inicio
fin_tur time       Hora de Finalización
mer_tur char Meridiano del Turno:
			 A: am
			 P: pm
est_tur char
Valores:
A: Activo
I: Inactivo
*/

//==============================================================================
//===	Campos B.D: cod_tur, nom_tur, ini_tur, fin_tur, mer_tur, est_tur

require("../clase/permiso.class.php");
require("../clase/turno.class.php");

$obj=new turno;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","turno"); //Para Auditoria
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
				$obj->mensaje("success","Turno agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Turno");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_tur);
				$obj->mensaje("success","Turno modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tur);
			  	$obj->mensaje("success","Turno eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Turno.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tur);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Turno.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>