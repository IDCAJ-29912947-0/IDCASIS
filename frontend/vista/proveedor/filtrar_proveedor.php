<?php
require("../../../backend/clase/proveedor.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new proveedor;
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
	<title>Filtrar Proveedor</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_proveedor.php" method="POST">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8 text-center ">

				 <div class="row bg-primary text-white">
	 				 <div class="col-12 text-center">
	  					<h3>Buscar del Proveedor</h3>
	 	 			</div>
	 			 </div>


	  			 <div class="row mt-2 bg-light">

					<div class="col-md-2 col-12 align-self-center">
		    				 <label for="">Nombre:</label>
					</div>
		
					<div class="col-md-8 col-12">
		   					 <input type="text" name="nom_pro" id="nom_pro" maxlength="50" class="form-control" placeholder="Nombre del Proveedor">
					</div>

	  			</div>

	  			<div class="row mt-2 bg-light">
	  				 <div class="col-12  text-center">
		     				<input type="submit" class="btn btn-primary btn-lg" value="Filtrar Proveedor">
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