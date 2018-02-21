<?php
require("../../../backend/clase/rol.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/modulo.class.php");

$obj=new rol;
$objPermiso=new permiso;
$objModulo=new modulo;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="latin-1">
	<title>Agregar Rol</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/rol.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Rol</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="nom_rol" id="nom_rol" required="required" maxlength="25" class="form-control" placeholder="Nombre del Rol" onkeyup="return solo_letras();">
		</div>

	  </div>


	  <div class="row mt-2">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_rol" id="est_rol" class="form-control">
			<option value="A" selected="">Activo</option>
			<option value="I">Inactivo</option>	
		</select>
		</div>
	   </div>

	   	<div class="row mt-2 bg-light">

		<div class="col-12 align-self-center bg-primary text-white">
		     <h4>Permisos del Rol:</h4>
		</div>
		<div class="col-12">
		   <div class="row justify-content-center">
	        
		  	<?php	
			$num_fil=0;
			$resultado=$objModulo->filtrar("","","");
			while(($datos=$objModulo->extraer_dato($resultado))>0){
				
				echo "<div class='col-4 text-left '> $datos[nom_mod] </div>";
				echo "<div class='col-4 text-left '> $datos[url_mod]</div>";
				echo "<div class='col-4 text-center '> <input type='checkbox' name='$datos[cod_mod]' id='$datos[cod_mod]'></div>";
	
			}
			?>
			


	   </div>

	  </div>	  	  
    </div>
      <div class="row mt-2 bg-light text-center">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Rol">
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