<?php
require("../../../backend/clase/tipo_movimiento.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new tipo_movimiento;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=8,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filtrar Tipo de Movimiento</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_tipo_movimiento.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-6 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Buscar del Tipo de Movimiento</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_tip_mov" id="nom_tip_mov" maxlength="35" class="form-control" placeholder="Nombre del Tipo de Movimiento" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Filtrar Tipo de Movimiento">
		</div>
	   </div>	

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