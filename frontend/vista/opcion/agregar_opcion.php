<?php
require("../../../backend/clase/opcion.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/modulo.class.php");

$obj=new opcion;
$objModulo=new modulo;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=21,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="latin-1">
	<title>Agregar Opci&oacute;n</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/opcion.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Opci&oacute;n</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="nom_opc" id="nom_opc" required="required" maxlength="25" class="form-control" placeholder="Nombre del Opci&oacute;n" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">URL:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="url_opc" id="url_opc" required="required" class="form-control" placeholder="URL del Opci&oacute;n" size="50">
		</div>

	  </div>

	  <div class="row mt-2">
	    <div class="col-md-2 col-12 align-self-center">
		     <label for="">M&oacute;dulo:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_modulo" id="fky_modulo" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $objModulo->asignar_valor("est_mod","A");
		   $datoMod=$objModulo->listar();

		   while(($modulo=$objModulo->extraer_dato($datoMod))>0)
		   {
		   		echo "<option value='$modulo[cod_mod]'>$modulo[nom_mod]</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>	  


	  <div class="row mt-2">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_opc" id="est_opc" class="form-control">
			<option value="A" selected="">Activo</option>
			<option value="I">Inactivo</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Opci&oacute;n">
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