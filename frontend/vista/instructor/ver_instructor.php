<?php
require("../../../backend/clase/instructor.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new instructor;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=7,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

	foreach($_REQUEST as $nombre_campo => $valor){
  		$obj->asignar_valor($nombre_campo,$valor);
	} 

	$resultado=$obj->filtrar($obj->cod_ins,$nom_ins="",$est_ins="");
	$instructor=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Instructor</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
 <body>
 	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8 text-center ">

				 <div class="row bg-primary text-white">
				 	 <div class="col-12 text-center">
				  	<h3>Datos del Instructor</h3>
				 	 </div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-2 col-12 align-self-center">
					     	<label for="">Cédula:</label>
						</div>
						<div class="col-md-4 col-12">	   
					  		  <input type="text" name="ide_ins" id="ide_ins" required="required" maxlength="15" class="form-control" 
					  		  placeholder="C&eacute;dula del Instructor" value="<?php echo $instructor['ide_ins']?>" disabled>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-2 col-12 align-self-center">
					     	<label for="">Nombres:</label>
						</div>
						<div class="col-md-6 col-12">	   
					  		  <input type="text" name="nom_ins" id="nom_ins" required="required" maxlength="25" class="form-control" placeholder="Nombre del Instructor" value="<?php echo $instructor['nom_ins']?>" disabled>
						</div>
				  </div>	  

				  <div class="row mt-2 bg-light">
						<div class="col-md-2 col-12 align-self-center">
					     	<label for="">Apellidos:</label>
						</div>
						<div class="col-md-6 col-12">	   
					  		  <input type="text" name="ape_ins" id="ape_ins" required="required" maxlength="25" class="form-control" placeholder="Apellido del Instructor" value="<?php echo $instructor['ape_ins']?>" disabled>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-2 col-12 align-self-center">
					     	<label for="">Email:</label>
						</div>
						<div class="col-md-8 col-12">	   
					  		  <input type="text" name="ema_ins" id="ema_ins" required="required" maxlength="80" class="form-control" placeholder="Email del Instructor" value="<?php echo $instructor['ema_ins']?>" disabled>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-2 col-12 align-self-center">
					     	<label for="">Tel&eacute;fono 1:</label>
						</div>
						<div class="col-md-4 col-12">	   
					  		  <input type="text" name="te1_ins" id="te1_ins" required="required" maxlength="35" class="form-control" placeholder="Tel&eacute;fono Principal" value="<?php echo $instructor['te1_ins']?>" disabled>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-2 col-12 align-self-center">
					     	<label for="">Tel&eacute;fono 2:</label>
						</div>
						<div class="col-md-4 col-12">	   
					  		  <input type="text" name="te2_ins" id="te2_ins" required="required" maxlength="35" class="form-control" placeholder="Tel&eacute;fono Secundario" value="<?php echo $instructor['te2_ins']?>" disabled>
						</div>
				  </div>	

				  <div class="row mt-2">
				    	 <div class="col-md-2 col-12 align-self-center">
					    	 <label for="">Estatus:</label>
						</div>
				    	<div class="col-md-4 col-12">
				    	  <fieldset disabled>
							<select name="est_ins" id="est_ins" class="form-control">
								<?php 
									$selected=($instructor['est_ins']=="A")?"selected":"";
									echo "<option value='A' $selected>Activa</option>";
									$selected=($instructor['est_ins']=="I")?"selected":"";								
									echo "<option value='I' $selected>Inactiva</option>";	
								?>
							</select>
						 </fieldset>
						</div>
				   </div>
	   		</div>
	 	</div>  	  
	</div> <!-- Fin Container -->
 </body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>