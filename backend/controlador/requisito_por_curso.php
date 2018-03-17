<?php
//==============================================================================
//===   requisito_por_curso: Enlaza los los cursos con los requisitos necesarios para hacer el curso.
/*
cod_req_cur int 				 		(Código del requisito). 
fky_requisito requisito(cod_req) 		(Requisito del Curso).
fky_tipo_curso tipo_curso(cod_tip_cur)  (Tipo de Curso: Photoshop, Autocad, Community Manager, etc)
obl_req char 							(Indica si el requisito es obligatorio).
										Valores:
										O: Obligatorio
										N: Opcional
*/                      
//==============================================================================
//===	Campos B.D:  cod_req_cur, fky_requisito, fky_tipo_curso, ini_req, fin_req obl_req, est_req

require("../clase/permiso.class.php");
require("../clase/tipo_curso.class.php");
require("../clase/requisito_por_curso.class.php");

$objPermiso=new permiso;
$objTipoCurso=new tipo_curso;
$obj=new requisito_por_curso;

$permiso=$objPermiso->validar_acceso($opcion=6,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","requisito_por_curso"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET

	switch($_REQUEST["accion"]) 
	{

		case 'agregar':
			$error=0;
			$obj->asignar_valor("fky_tipo_curso",$_POST["fky_tipo_curso"]); 
			$obj->eliminar();
			foreach($_REQUEST as $nombre_campo => $valor)
			{
				
				if($nombre_campo!="accion" && $nombre_campo!="fky_tipo_curso")
				{   			
					$fky_requisito=explode("obs_req_",$nombre_campo);
					if(@$_POST["fky_requisito_$fky_requisito[1]"]=="on")
					{   $obj->asignar_valor("fky_requisito",$fky_requisito[1]);
						$obj->asignar_valor("fky_tipo_curso",$_POST["fky_tipo_curso"]);
                        $obligatorio=($_POST["obl_req_$fky_requisito[1]"]=="on")?"O":"N";
						$obj->asignar_valor("obl_req",$obligatorio);					
						$obj->asignar_valor("obs_req",$_POST["obs_req_$fky_requisito[1]"]);

	  					$res=$obj->agregar(); 
				  		$prk_aud=$obj->ultimo_id_insertado();
						if($prk_aud>0){
								$obj->auditoria($prk_aud);													
						}else
						{
								$error=1;
						}
				   }
			    }
			}
			if($error==0)
			{
				$obj->mensaje("success","Requisitos asignados correctamente");
			}else
			{
				$obj->mensaje("danger","Error al asignar permisos");				
			}
		break;

		case 'filtrar':
			  $req=$obj->filtrar($fky_requisito="",$_GET["fky_curso"]);
			  $i=1;
			  $req_cur="";
			  $obl_req="";
			  $obs_req="";

			  $req_cur.="<div class='jumbotron'>";
			  $req_cur.="<p class='lead alert alert-success'>El alumno debe cumplir con los siguientes <strong>requisitos</strong> para hacer el curso:</p>";
			  while(($datos=$obj->extraer_dato($req))>0)
			  {
			  	$obl_req=($datos['obl_req']=="O")?"<span class='badge badge-danger'>(Obligatorio)</span>":"<span class='badge badge-info'>(Opcional)</span>";
			  	$obs_req=($datos['obs_req']!="")?"($datos[obs_req])":"";

			  	$req_cur.="<p class='text-left'>$i) $datos[nom_req]. $obl_req $obs_req</p>";
			    $i++;
			  }
			  $req_cur.="</div>";
			  echo ($i==1)?"<div class='alert alert-success'>¡Para poder hacer el curso no es necesario ningún requisito!</div>":"$req_cur";
		break;

	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>