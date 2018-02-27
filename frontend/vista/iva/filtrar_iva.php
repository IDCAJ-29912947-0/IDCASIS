<?php
require("../../../backend/clase/iva.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new iva;
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
	<title>Filtrar IVA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_iva.php" method="POST">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8 text-center ">

					 <div class="row bg-primary text-white">
		 				 <div class="col-12 text-center">
		  					<h3>Buscar IVA</h3>
		 	 			</div>
		 			 </div>


					  <div class="row mt-2">
					    	 <div class="col-md-2 col-12 align-self-center">
						    	 <label for="">Estatus:</label>
							</div>
					    	<div class="col-md-4 col-12">
								<select name="est_iva" id="est_iva" class="form-control">
									<option value="A" selected="">Activo</option>
									<option value="I">Inactivo</option>	
								</select>
							</div>
					   </div>

		  			<div class="row mt-2 bg-light">
		  				 <div class="col-12  text-center">
			     				<input type="submit" class="btn btn-primary btn-lg" value="Filtrar IVA">
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