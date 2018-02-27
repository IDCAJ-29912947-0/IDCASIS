<?php
require("../../../backend/clase/proveedor.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new proveedor;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=7,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

	foreach($_REQUEST as $nombre_campo => $valor){
  		$obj->asignar_valor($nombre_campo,$valor);
	} 

	$resultado=$obj->filtrar($obj->cod_pro,$nom_pro="",$est_pro="");
	$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Proveedor</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
 <body>
 	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8 text-center ">

				 <div class="row bg-primary text-white">
				 	 <div class="col-12 text-center">
				  	<h3>Datos del Proveedor</h3>
				 	 </div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-3 text-left col-12 align-self-center">
					     	<label for="">RIF/C&eacute;dula:</label>
						</div>
						<div class="col-md-4 col-12">	   
					  		  <input type="text" name="rif_pro" id="rif_pro" required="required" maxlength="15" class="form-control" 
					  		  placeholder="RIF del Proveedor/C&eacute;dula" value="<?php echo $datos['rif_pro']?>" disabled>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-3 text-left col-12 align-self-center">
					     	<label for="">Nombre:</label>
						</div>
						<div class="col-md-8 col-12">	   
					  		  <input type="text" name="nom_pro" id="nom_pro" required="required" maxlength="80" class="form-control" placeholder="Nombre del Proveedor" value="<?php echo $datos['nom_pro']?>" disabled>
						</div>
				  </div>	  


				  <div class="row mt-2 bg-light">
						<div class="col-md-3 text-left col-12 align-self-center">
					     	<label for="">Tel&eacute;fono 1:</label>
						</div>
						<div class="col-md-4 col-12">	   
					  		  <input type="text" name="te1_pro" id="te1_pro" required="required" maxlength="35" class="form-control" placeholder="Tel&eacute;fono Principal" value="<?php echo $datos['te1_pro']?>" disabled>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-3 text-left col-12 align-self-center">
					     	<label for="">Tel&eacute;fono 2:</label>
						</div>
						<div class="col-md-4 col-12">	   
					  		  <input type="text" name="te2_pro" id="te2_pro" required="required" maxlength="35" class="form-control" placeholder="Tel&eacute;fono Secundario" value="<?php echo $datos['te2_pro']?>" disabled>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-3 col-12 text-left align-items-center">
					     	<label for="">Direcci&oacute;n Fiscal</label>
						</div>
						<div class="col-md-8 col-12">	   
					  		  <input type="text" name="dir_pro" id="dir_pro" required="required" maxlength="80" class="form-control" placeholder="Direcci&oacute;n Fiscal" value="<?php echo $datos['dir_pro']?>" disabled text-left>
						</div>
				  </div>

				  <div class="row mt-2 bg-light">
						<div class="col-md-3 text-left col-12 align-self-center">
					     	<label for="">Email:</label>
						</div>
						<div class="col-md-8 col-12">	   
					  		  <input type="text" name="ema_pro" id="ema_pro" required="required" maxlength="80" class="form-control" placeholder="Email del Proveedor" value="<?php echo $datos['ema_pro']?>" disabled>
						</div>
				  </div>				  	

				  <div class="row mt-2">
				    	 <div class="col-md-3 text-left col-12 align-self-center">
					    	 <label for="">Estatus:</label>
						</div>
				    	<div class="col-md-4 col-12">
				    	<fieldset disabled>
							<select name="est_pro" id="est_pro" class="form-control">
								<?php 
									$selected=($datos['est_pro']=="A")?"selected":"";
									echo "<option value='A' $selected>Activo</option>";
									$selected=($datos['est_pro']=="I")?"selected":"";								
									echo "<option value='I' $selected>Inactivo</option>";	
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