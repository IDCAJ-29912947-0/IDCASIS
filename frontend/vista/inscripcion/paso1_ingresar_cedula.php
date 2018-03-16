<?php
require("../../../backend/clase/alumno.class.php");
$obj=new alumno;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pre-Inscripción</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="paso2_datos_alumno.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Pre-Inscripción</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">C&eacute;dula:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ide_alu" id="ide_alu" maxlength="15" class="form-control" placeholder="Ingresa el número de cédula del alumno">
		</div>

	  </div>
	  <div class="row mt-2 bg-light">

		<div class="col-md-12 col-12 align-self-center">
			<p class="alert alert-danger">
				<strong>¿Con la pre-inscripción aseguro mi cupo al curso? </strong>
				La pre-inscripción 
				<span class="badge badge-danger">NO</span> asegura tu cupo al curso, pero es un requisito necesario para poder inscribirte.</p>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-md" value="Continuar">
		</div>
	   </div>	

	    </div>
	   </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="filtrar">			
</form>	
</body>
</html>