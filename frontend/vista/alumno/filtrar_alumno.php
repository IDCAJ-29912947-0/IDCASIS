<?php
require("../../../backend/clase/alumno.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new alumno;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=3,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filtrar Alumno</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_alumno.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Buscar del Alumno</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Cédula:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="ide_alu" id="ide_alu" maxlength="15" class="form-control" placeholder="Cédula del Alumno" onkeyup="return solo_numeros();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombres:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="nom_alu" id="nom_alu" maxlength="25" class="form-control" placeholder="Nombre del Alumno" onkeyup="return solo_letras();">
		</div>

	  </div>

	   <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Apellidos:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="ape_alu" id="ape_alu" maxlength="25" class="form-control" placeholder="Apellido del Alumno" onkeyup="return solo_letras();">
		</div>

	  </div> 


	   <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ema_alu" id="ema_alu" maxlength="80" class="form-control" placeholder="Email del Alumno" onkeyup="return solo_email();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Número de Celular:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="te1_alu" id="te1_alu" maxlength="15" class="form-control" placeholder="Teléfono del Alumno" onkeyup="return solo_numeros();">
		</div>

	  </div> 

	  <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ema_alu" id="ema_alu" maxlength="80" class="form-control" placeholder="Email del Alumno" onkeyup="return solo_email();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Filtrar Alumno">
		</div>
	   </div>	  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="filtrar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>