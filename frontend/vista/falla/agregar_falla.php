<?php
require("../../../backend/clase/falla.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new falla;
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
	<title>Agregar Falla</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/falla.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row">
	 	 <div class="col-12 mt-3">
	  		 <div class="alert alert-warning"><strong>Atención:</strong> Si tuviste alg&uacute;n problema en la laptop donde estuviste trabajando por favor notifica detalladamente.</div>
	 	 </div>
	  </div>

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Falla</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">C&eacute;dula:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ide_alu" id="ide_alu" required="required" maxlength="15" class="form-control" placeholder="C&eacute;dula del Alumno">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Laptop:</label>
		</div>
		<div class="col-md-6 col-12">
		      <select name="lap_fal" id="lap_fal" class="form-control">
		        <option value="">Seleccione...</option>
		      	<option value="1">Laptop N° 1</option>
		      	<option value="2">Laptop N° 2</option>
		      	<option value="3">Laptop N° 3</option>
		      	<option value="4">Laptop N° 4</option>
		      	<option value="5">Laptop N° 5</option>
		      	<option value="6">Laptop N° 6</option>
		      	<option value="7">Laptop N° 7</option>
		      	<option value="8">Laptop N° 8</option>
		      	<option value="9">Laptop N° 9</option>
		      	<option value="10">Laptop N° 10</option>
		      	<option value="11">Laptop N° 11</option>
		      	<option value="12">Laptop N° 12</option>
		      	<option value="13">Laptop N° 13</option>
		      	<option value="14">Laptop N° 14</option>
		      	<option value="15">Laptop N° 15</option>
		      	<option value="16">Laptop N° 16</option>
		      	<option value="17">Laptop N° 17</option>
		        <option value="18">Laptop Instructor</option>
		      </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Observaciones de la Falla:</label>
		</div>
		<div class="col-md-6 col-12">
		   <textarea name="obs_fal" id="obs_fal" class="form-control" required></textarea>
		</div>

	  </div>


	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
	    <fieldset disabled>
		<select name="est_fal" id="est_fal" class="form-control">
			<option value="A" selected="">Ticket Abierto, por resolver.</option>
			<option value="R">Resuelto el problema.</option>
		</select>
		</fieldset>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Falla">
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