<?php
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/requisito.class.php");
require("../../../backend/clase/tipo_curso.class.php");
require("../../../backend/clase/requisito_por_curso.class.php");

$obj=new requisito;
$objPermiso=new permiso;
$objTipoCurso=new tipo_curso;
$objRequisitoCurso=new requisito_por_curso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seleccionar Tipo de Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/requisito_por_curso.php" method="POST">

<div class="container-fluid">
						<div class="row justify-content-center">
									<div class="col-12 text-center ">

										  <div class="row bg-primary text-white mt-2 ml-2 mr-2">
										 	 			<div class="col-12 text-center">
										  							<h3>Requisitos por Curso</h3>
										 	 			</div>
										  </div>


										 	 <div class="row mt-2 ml-2 mr-2 bg-light">

																					<div class="col-md-1 col-12 align-self-center text-left">
																					     <label for="">Curso:</label>
																					</div>
																					<div class="col-md-11 col-12 text-left">
																					 <fieldset disabled>
																							<select name="fky_tipo_curso" id="fky_tipo_curso" required class="form-control"> -->
																							<?php
																							    $objTipoCurso->est_tip_cur="A";
																								   $tc=$objTipoCurso->listar();																								   
																								   while(($tipo_curso=$obj->extraer_dato($tc))>0)
																										   {
																										   	$selected=($tipo_curso["cod_tip_cur"]==$_POST["fky_tipo_curso"])?"selected":"";
																							       echo "<option value='$tipo_curso[cod_tip_cur]' $selected>
																							       $tipo_curso[nom_tip_cur]
																							       </option>";
																										   }																									   
																							?>
																						  	</select>
																					  </fieldset> 
																					</div>
										  		</div>


										  		<div class="row mt-2 bg-primary  text-white mt-2 ml-2 mr-2">
																			
																		<div class="col-md-3">
																						Tipo de Requisito
																		</div>
																		<div class="col-md-4">
																						Requisito
																		</div>
																		<div class="col-md-2">
																						Observaciones
																		</div>
																		<div class="col-md-1">
																						Asignar
																		</div>
																		<div class="col-md-2">
																						¿Obligatorio?
																		</div>	
										  		</div>

										  		<div class="row mt-2 ml-2 mr-2"">
										  		<?php
										  		$obj->est_req="A";
										  		$pun=$obj->listar();
										  		while(($datos=$obj->extraer_dato($pun))>0)
										  		{
										  			$reqCur=$objRequisitoCurso->filtrar($datos['cod_req'],$_POST["fky_tipo_curso"]);
										  			$req=$objRequisitoCurso->extraer_dato($reqCur);
										  			$check1=($req['cod_req_cur']!="")?"checked":"";
										  			$check2=($req['obl_req']!="")?"checked":"";										  			
										  			?>
	
																		<div class="col-md-3 mt-1 text-left align-self-center">
																						<?php echo $datos['nom_tip_req']; ?>
																		</div>
																		<div class="col-md-4 text-left mt-1 text-left align-self-center">
																							<?php echo $datos['nom_req']; ?>
																		</div>
																		<div class="col-md-2 mt-1 align-self-center">
																							<input type="text" class="form-control" name='<?php echo "obs_req_".$datos['cod_req']?>'" value="<?php echo $req['obs_req']?>">
																		</div>
																		<div class="col-md-1 mt-1 align-self-center">
																							<input type="checkbox" class="form-control" name='<?php echo "fky_requisito_".$datos['cod_req']?>'" <?php echo $check1 ?>>
																		</div>
																		<div class="col-md-2 mt-1 align-self-center">
																					<input type='checkbox' class='form-control' name='<?php echo "obl_req_".$datos['cod_req']?>'" <?php echo $check2 ?>>
																		</div>	

															<?php
										  		}
										  		?>
										  		</div>	 

										  		<div class="row mt-2 bg-light">
																						  	 <div class="col-12  text-center">
																							    		 <input type="submit" class="btn btn-primary btn-lg" value="Continuar">
																							   </div>
										   	</div>	  	  
    				</div>
 		 </div>
</div> <!-- Fin Container -->
	<input type="hidden" name="fky_tipo_curso" id="fky_tipo_curso" value="<?php echo $_POST['fky_tipo_curso']?>">
	<input type="hidden" name="accion" id="accion" value="agregar">
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>