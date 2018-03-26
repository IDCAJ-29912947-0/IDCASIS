<?php
require("../clase/permiso.class.php");
require("../clase/ingreso.class.php");
require("../clase/inscripcion.class.php");

$obj=new ingreso;
$objPermiso=new permiso;
$objInscripcion=new inscripcion;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","ingreso"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 

	switch ($_REQUEST["accion"]) {

		case 'agregar_remoto':
		    $ins=$objInscripcion->filtrar($_POST["fky_inscripcion"], $fec_ins="", $fky_alumno="", $fky_curso="", $est_ins="",$est_cur="");
		    $inscripcion=$objInscripcion->extraer_dato($ins);   
		    /*Cuando el pago lo hace el alumno desde la casa algunos datos quedan en null*/  
		    $obj->reg_ing=date("Y-m-d h:i:s");  
		    $obj->lot_ing=null; 
		    $obj->fky_curso=$inscripcion["cod_cur"]; 		   
		    $obj->fky_alumno=$inscripcion["cod_alu"]; 
		    $obj->fky_tipo_movimiento=1; /*Ingreso por Curso*/
		    $obj->est_ing="N"; /*No Validado*/ 
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$obj->mensaje("success","Pago registrado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al registrar Pago");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_are);
				$obj->mensaje("success","Pago modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_are);
			  	$obj->mensaje("success","Pago eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Pago.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_are);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Pago.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>