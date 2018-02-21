<?php
//==============================================================================
//===   rol: Roles de Usuarios en el Sistema.
/*
cod_rol int 		(Código del Rol)
nom_rol varchar-25 	(Nombre del Rol)
est_rol char 		(Estatus del Rol)
Estatus del Rol:
A: Activo
I: Inactivo
*/                         
//==============================================================================

require("../clase/permiso.class.php");
require("../clase/opcion.class.php");
require("../clase/rol.class.php");
require("../clase/opcion_rol.class.php");

$obj=new rol;
$objPermiso=new permiso;
$objOpcion=new opcion;
$objOpcRol=new opcion_rol;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","rol"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria
  	$obj->asignar_valor("nom_rol",$_REQUEST["nom_rol"]);
  	$obj->asignar_valor("est_rol",$_REQUEST["est_rol"]);	

//Recibimos todas las variables enviadas por el método POST o GET
	

	switch ($_REQUEST["accion"]) {

		case 'agregar':    
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				foreach($_REQUEST as $nombre_campo => $valor){
					
  		            if($nombre_campo!="nom_rol" && $nombre_campo!="est_rol")
  		            {
  		            	$opc=$objOpcion->filtrar($cod_opc="",$nom_opc="",$est_opc="",$nombre_campo);
  		            	$objOpcRol->asignar_valor("fky_rol",$prk_aud);
  		            	while(($opcion=$objOpcion->extraer_dato($opc))>0)
  		            	{
							$objOpcRol->asignar_valor("fky_opcion",$opcion['cod_opc']);
							$objOpcRol->asignar_valor("est_opc_rol","A");
							$objOpcRol->agregar();
  		            	}

  		            }
	             } 
				$obj->mensaje("success","Rol agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Rol");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_rol);
				$obj->mensaje("success","Rol modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_rol);
			  	$obj->mensaje("success","Rol eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Rol.");
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