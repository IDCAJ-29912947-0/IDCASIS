<?php
//==============================================================================
//===   tipo_curso: Guarda los datos generales de los diferentes cursos que impartimos.
/*
cod_tip_cur int 							(Código del Tipo de Curso. Autoincremental)
nom_tip_cur varchar-50 						(Nombre del tipo de curso)
hor_tip_cur int 							(Numero de Horas Académicas)
cer_tip_cur varchar-50 						(Nombre que aparecerá en el certificado)
obj_tip_cur varchar-255 					(Objetivo del Curso)
min_tip_cur int 							(Número mínimo de cupos)
max_tip_cur int 							(Numero maximo de cupos)
ava_tip_cur char 							Valores:
											A: Certificado Avalado por el Ministerio de Educación
											N: Certificado No Avalado por el Ministerio de Educación
url_tip_cur text 						    (URL del contenido del curso comprimido en un .zip)
fky_area area(cod_are)						(Area a la que pertenece el curso)
fky_empresa empresa(cod_emp) 				(Empresa que organiza el curso)
est_tip_cur char
Valores del Estatus:
A: Activo
I: Inactivo
*/                        
//==============================================================================
//===	Campos B.D: cod_tip_cur, nom_tip_cur, hor_tip_cur, cer_tip_cur, obj_tip_cur, min_tip_cur, max_tip_cur, ava_tip_cur,url_tip_cur, fky_area, fky_empresa, est_tip_cur

require("../clase/permiso.class.php");
require("../clase/tipo_curso.class.php");

$obj=new tipo_curso;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","tipo_curso"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 



	switch ($_REQUEST["accion"]) {

		case 'agregar':  
		    $obj->asignar_valor("url_tip_cur",$_FILES["url_tip_cur"]["name"]);  
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$carpeta=$obj->ruta_contenido_backend;
		        $nombre_final="curso_".$prk_aud;
				$url_material=$obj->subir_material($_FILES["url_tip_cur"]["name"],$_FILES["url_tip_cur"]["tmp_name"],$carpeta,$nombre_final);
				if($url_material!=false){
 					$obj->mensaje("success","Archivo subido correctamente al servidor.");
 					$res=$obj->modificar_url($prk_aud,$url_material);
 					$fil_afe=$obj->filas_afectadas();
 					if($fil_afe==0)
 					{
 						$obj->mensaje("danger","No se pudo actualizar la url del archivo subido.");
 					}

				}else{
					$obj->mensaje("danger","Error al subir archivo al servidor.");
				}
				$obj->mensaje("success","Tipo de Curso agregado correctamente");
			}else
			{
				$obj->mensaje("danger","Error al agregar el Tipo de Curso");
			}
			
		break;

		case 'modificar':
		    	$obj->asignar_valor("url_tip_cur",$_FILES["url_tip_cur"]["name"]);  
		    	$carpeta=$obj->ruta_contenido_backend;  
		    	$nombre_final="curso_".$obj->cod_tip_cur;
		    	$url_material=$obj->subir_material($_FILES["url_tip_cur"]["name"],$_FILES["url_tip_cur"]["tmp_name"],$carpeta,$nombre_final);
				if($url_material!=false)
				{
 					$obj->mensaje("success","Archivo subido correctamente al servidor.");
 					$res=$obj->modificar_url($obj->cod_tip_cur,$url_material);
 					$fil_afe=$obj->filas_afectadas();
 					if($fil_afe==0)
 					{
 						$obj->mensaje("danger","No se pudo actualizar la url del archivo subido.");
 					}else
 					{
 						$obj->mensaje("success","URL del archivo subido modificado correctamente.");
 					}
 				}

			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_tip_cur);
				$obj->mensaje("success","Tipo de Curso modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_cur);
			  	$obj->mensaje("success","Tipo de Curso eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Tipo de Curso.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_tip_cur);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Tipo de Curso.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>