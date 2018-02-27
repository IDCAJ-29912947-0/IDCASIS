<?php
require("../../../backend/clase/proveedor.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new proveedor;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Proveedor</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/proveedor.php" method="POST">

<div class="container">
  <div class="row justify-content-center">
	<div class="col-10 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Proveedor</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 text-left align-items-center">
		     	<label for="">RIF/C&eacute;dula:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="rif_pro" id="rif_pro" required="required" maxlength="15" class="form-control" 
		  		  placeholder="RIF o C&eacute;dula del Proveedor">
			</div>
	  </div>

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 text-left align-items-center">
		     	<label for="">Nombre / Raz&oacute;n Social:</label>
			</div>
			<div class="col-md-8 col-12">	   
		  		  <input type="text" name="nom_pro" id="nom_pro" required="required" maxlength="80" class="form-control" placeholder="Nombre del Proveedor">
			</div>
	  </div>	  

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 text-left align-items-center">
		     	<label for="">Tel&eacute;fono 1:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="te1_pro" id="te1_pro" required="required" maxlength="35" class="form-control" placeholder="Tel&eacute;fono Principal">
			</div>
	  </div>

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 text-left align-items-center">
		     	<label for="">Tel&eacute;fono 2:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="te2_pro" id="te2_pro" required="required" maxlength="35" class="form-control" placeholder="Tel&eacute;fono Secundario">
			</div>
	  </div>

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 text-left align-items-center">
		     	<label for="">Direcci&oacute;n Fiscal</label>
			</div>
			<div class="col-md-8 col-12">	   
		  		  <input type="text" name="dir_pro" id="dir_pro" required="required" maxlength="80" class="form-control" placeholder="Direcci&oacute;n Fiscal">
			</div>
	  </div>

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 text-left align-items-center">
		     	<label for="">Email:</label>
			</div>
			<div class="col-md-8 col-12">	   
		  		  <input type="text" name="ema_pro" id="ema_pro" required="required" maxlength="80" class="form-control" placeholder="Email del Proveedor">
			</div>
	  </div>	  		

	  <div class="row mt-2 bg-light">
	    	 <div class="col-md-3 col-12 text-left align-items-center">
		    	 <label for="">Estatus:</label>
			</div>
	    	<div class="col-md-4 col-12">
				<select name="est_pro" id="est_pro" class="form-control">
					<option value="A" selected="">Activo</option>
					<option value="I">Inactivo</option>	
				</select>
			</div>
	   </div>


	   <div class="row mt-2 bg-light">
	  		 <div class="col-12  text-center">
		    	 <input type="submit" class="btn btn-primary btn-lg" value="Guardar Proveedor">
			</div>
	   </div>

    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="agregar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>