<?php
//==============================================================================
//===   permiso: Esta tabla guardará los permisos individuales de cada usuario.
/*
cod_per int 						(Código del Permiso)
fky_opcion opcion(cod_opc) 			(Opción de Sistema)
fky_usuario usuario(log_usu) 		(Usuario que tiene permiso a utilizar esa opción)
tok_per		varchar(32)				(Llave de seguridad para acceso al sistema.)
est_per char 						(El permiso se encuentra activo o no.)
Valores de los Estatus:
A: Activo
I: Inactivo
*/

//==============================================================================
//===	Campos B.D: cod_per, fky_opcion, fky_usuario, est_per

require("../clase/permiso.class.php");
require("../clase/opcion.class.php");
require("../clase/usuario.class.php");

$obj=new permiso;
$objUsuario=new usuario;


$permiso=$obj->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$obj->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	
	$obj->asignar_valor("tab_aud","permiso"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET

	switch ($_REQUEST["accion"]) {

		case 'agregar': 
		    //Recibimos muchos permisos simultaneamente  
		    $error=0;
		    $obj->eliminar($_POST['fky_usuario']);
		    
		    foreach($_REQUEST as $nombre_campo => $valor)
			{
					
				
			 if($nombre_campo!="fky_usuario" && $nombre_campo!="accion" && $nombre_campo!="fky_rol")
			 {
				$opcion=explode("fky_opcion",$nombre_campo);
				$obj->asignar_valor("fky_opcion",$opcion[1]); 
				$obj->asignar_valor("est_per","A"); 
				$obj->agregar($_POST['fky_usuario']);
				$prk_aud=$obj->ultimo_id_insertado();
				if($prk_aud>0){
						$obj->auditoria($prk_aud);
				}else
				{
					$error=1;
				}
			 }	      
	       }
	       if($error==0){
				$obj->mensaje("success","Permisos asignados correctamente");
			}else{
				$obj->mensaje("danger","Error al asignar permisos");
			} 		
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_are);
				$obj->mensaje("success","Permiso modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_are);
			  	$obj->mensaje("success","Permiso eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Permiso.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_are);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Permiso.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>