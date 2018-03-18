<?php
//==============================================================================
//===   inscripcion: Tabla que guarda los datos de las inscripciones a los cursos. Si el estatus de la inscripción es 'P' se considera que solo esta pre-inscrito.  
/*
cod_ins int  						(Código de la Inscripción.)
fec_ins date 						(Fecha de Inscripción.)
hor_ins time 						(Hora de Inscripción)
fky_alumno alumno(ide_alu) 	        (Clave Foránea hacia la tabla alumno.)
fky_curso  curso(cod_cur) 		    (Clave Foránea hacia la tabla Curso.)
fky_factura factura(num_fac) 	    (Clave Foránea hacia la tabla Factura.)
est_ins char 						(Estatus)
Valores del Estatus:
P -> Pre Inscrito
I -> Inscrito Correctamente.
X -> Inscrito pero luego de que el curso estaba lleno
C -> Inscrito pero el pago no pudo ser comprobado.
A -> Cupo apartado a familiares y amigos
*/                      
//==============================================================================
//===	Campos B.D: cod_ins, fec_ins, hor_ins, fky_alu, fky_cur,fky_factura, est_ins

require("../clase/permiso.class.php");
require("../clase/inscripcion.class.php");

$obj=new inscripcion;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","Inscripcion"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 

	switch ($_REQUEST["accion"]) {

		case 'agregar':
		    $obj->fec_ins=date("Y-m-d");    
		    $obj->hor_ins=date("h:i:s"); 
		    $obj->fky_factura="NULL";
		    $obj->est_ins="P";
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$obj->mensaje("success","Inscripci&oacute;n agregada correctamente");
			}else
			{
				$error=$obj->error_nro();
				if($error==1062){
				$obj->mensaje("danger","Error: Ud ya se encontraba pre-inscrito para el curso, por favor ahora registra el pago en la opci&oacute;n 'Registrar Pago'.");
			     }else
			     {
				$obj->mensaje("danger","Error al realizar la pre-inscripci&oacute;n. Nro Error: $error");
			     }

			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_iva);
				$obj->mensaje("success","Inscripci&oacute;n modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_iva);
			  	$obj->mensaje("success","Inscripci&oacute;n eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar la Inscripci&oacute;n.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_iva);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus de la Inscripci&oacute;n.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>