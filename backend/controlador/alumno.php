<?php
//==============================================================================
//===   alumno: Tabla que guardará todos los datos de los alumnos que participen en los cursos.
/*
cod_alu int 			(Código Autoincremental del Alumno)
ide_alu varchar-15 		(Cédula del Alumno o Pasaporte)
nom_alu varchar-25 		(Nombre del Alumno)
ape_alu varchar-25 		(Apellido del Alumno)
sex_alu char 			(Sexo del Participante)
ema_alu varchar-80 		(Correo Electrónico)
te1_alu varchar-15 		(Telefono 1 del alumno)
te2_alu varchar-15 		(Telefono 2 del alumno)
ins_alu varchar-20 		(Instagram del Alumno)
fky_pais pais(cod_pai) 	(Apunta a la tabla Pais)
fky_universidad universidad(cod_uni) (Apunta a la tabla Universidad)
not_alu                 (Notificaciones al correo)
est_alu char 			(Estatus de los alumnos)
1) Activo. Valor: A
2) Suspendido. Valor: S, el motivo se debe a no cumplir con las políticas de la empresa.
3) Inactivo: Valor: I, el alumno se fué del pais, no quiere recibir correos.
*/                       
//==============================================================================
//===	Campos B.D: cod_alu, ide_alu, nom_alu, ape_alu, sex_alu, ema_alu, te1_alu, te2_alu, ins_alu, fky_pais,fky_universidad, est_alu 


require("../clase/permiso.class.php");
require("../clase/alumno.class.php");

$obj=new alumno;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","alumno"); //Para Auditoria
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
				$obj->mensaje("success","Alumno agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar alumno");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_alu);
				$obj->mensaje("success","Alumno modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_alu);
			  	$obj->mensaje("success","Alumno eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar alumno.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_alu);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del alumno.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>