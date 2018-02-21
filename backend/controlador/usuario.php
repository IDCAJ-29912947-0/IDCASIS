<?php
//==============================================================================
//===   usuario: Usuario del Sistema
/*
log_usu varchar-25 								(Login del Usuario)
nom_usu varchar-50 								(Nombre)
ape_usu varchar-50 								(Apellido)
ema_usu varchar-80 								(Correo)
cla_usu varchar-32 								(Clave encriptada)
fky_rol rol(cod_rol) 							(Rol)
est_usu char 									(Estatus del Usuario).
												Valores del Estatus:
												A: Activo
												I: Inactivo
*/                      
//==============================================================================
//===	Campos B.D: log_usu, nom_usu, ape_usu, ema_usu, cla_usu, fky_rol, est_usu						
require("../clase/permiso.class.php");
require("../clase/usuario.class.php");
require("../clase/opcion_rol.class.php");

$obj=new usuario;
$objPermiso=new permiso;
$objOpcionRol=new opcion_rol;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","rol"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria
  
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	}   	  	  		  	
//Recibimos todas las variables enviadas por el método POST o GET
	
	switch ($_REQUEST["accion"]) {

		case 'agregar':

			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$opc_pun=$objOpcionRol->filtrar($fky_opcion="",$_REQUEST["fky_rol"],$est_opc_rol="");
				while(($opc_rol=$objOpcionRol->extraer_dato($opc_pun))>0)
				{
					$objPermiso->fky_opcion=$opc_rol["fky_opcion"];
				    $objPermiso->est_per=$opc_rol["est_opc_rol"];
					$objPermiso->agregar($prk_aud);
				}
				$obj->mensaje("success","Usuario agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Usuario");
			}
			
		break;

		case 'modificar':  

			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_usu);
				if($_REQUEST["fky_rol_old"]!=$_REQUEST["fky_rol"])
				{
					$objPermiso->eliminar($_REQUEST["cod_usu"]);

			        $opc_pun=$objOpcionRol->filtrar($fky_opcion="",$_REQUEST["fky_rol"],$est_opc_rol="");
				    while(($opc_rol=$objOpcionRol->extraer_dato($opc_pun))>0)
				    {
					  $objPermiso->fky_opcion=$opc_rol["fky_opcion"];
				      $objPermiso->est_per=$opc_rol["est_opc_rol"];
					  $objPermiso->agregar($obj->cod_usu);
				   }

				}
					$obj->mensaje("success","Usuario modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_rol);
			  	$obj->mensaje("success","Usuario eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Usuario.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_rol);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del rol.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>