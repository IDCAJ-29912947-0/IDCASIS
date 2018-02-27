<?php
require("../../../backend/clase/turno.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new turno;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
 	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

$resultado=$obj->filtrar($obj->cod_tur,$nom_tur="",$est_tur="");
$datos=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Turno</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/turno.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Turno</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_tur" id="nom_tur" required="required" maxlength="20" class="form-control" placeholder="Nombre del Turno" value="<?php echo $datos['nom_tur']?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Hora Inicio:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="time" name="ini_tur" id="ini_tur" required="required" maxlength="2" 
		     class="form-control" placeholder="Inicio" value="<?php echo $datos['ini_tur']?>">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Hora Fin:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="time" name="fin_tur" id="fin_tur" required="required" maxlength="2" 
		     class="form-control" placeholder="Fin" value="<?php echo $datos['fin_tur']?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Meridiano:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="mer_tur" id="mer_tur" class="form-control">
		    	<?php	
		    	    $selected=($datos["mer_tur"]=="A")?"selected":"";
		    	    echo "<option value='A' $selected>am</option>";
		    	    $selected=($datos["mer_tur"]=="P")?"selected":"";
		    	    echo "<option value='P' $selected>pm</option>";
		    	?>
		    </select>
		</div>

	  </div>	  

	  <div class="row mt-2 bg-light">
	     <div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_tur" id="est_tur" class="form-control">
			<?php
		    	$selected=($datos["est_tur"]=="A")?"selected":"";
				echo "<option value='A' $selected>Activo</option>";
		    	$selected=($datos["est_tur"]=="I")?"selected":"";				
				echo "<option value='I' $selected>Inactivo</option>";	
			?>
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Turno">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="modificar">
<input type="hidden" name="cod_tur" id="cod_tur" value="<?php echo $datos['cod_tur']?>">			

</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>