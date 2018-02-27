<?php
//==============================================================================
//===   cuenta: Número de Cuenta donde el Alumno debe Depositar o Transferir el Dinero  
/*
cod_cue int 							(Código de la Cuenta Bancaria. Auto Incremental.)
num_cue varchar-20 						(Número de Cuenta Bancaria. Son 20 Dígitos, sin guiones.)
rif_cue varchar-15						(Rif de la cuenta Bancaria: Inicia con la Letra: V,J,G y luego solo números.)
nom_cue varchar-25 						(Nombre del titular de la cuenta bancaria.)
fky_banco banco(cod_ban) 				(Banco asociado a la cuenta bancaria)
tip_cue char 							(Tipo de Cuenta Bancaria.)
										A: Ahorro
										C: Corriente
fky_empresa empresa(cod_emp)			(Empresa asociada a la cuenta Bancaria: Ingeniería Digital CA, Ingeniería Web F.P.)
est_cue   char                      Estatus de la cuenta
Valores:
A: Activo
I: Inactivo
*/                       
//==============================================================================
//===	Campos B.D:  cod_cue, num_cue, rif_cue, nom_cue, fky_banco, tip_cue, est_cue


require("../clase/permiso.class.php");
require("../clase/cuenta.class.php");

$obj=new cuenta;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","cuenta"); //Para Auditoria
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
				$obj->mensaje("success","Cuenta agregada correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar la Empresa");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_cue);
				$obj->mensaje("success","Cuenta modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute;n registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_cue);
			  	$obj->mensaje("success","Cuenta eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Cuenta.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_cue);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus de la Cuenta.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>