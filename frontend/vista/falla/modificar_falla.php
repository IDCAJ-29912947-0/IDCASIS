<?php
require("../../../backend/clase/falla.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/alumno.class.php");

$obj=new falla;
$objPermiso=new permiso;
$objAlumno=new alumno;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

	$resultado=$obj->filtrar($obj->cod_fal,$nom_fal="",$est_fal="");
	$datos=$obj->extraer_dato($resultado);

	$alu=$objAlumno->filtrar($datos["fky_alumno"],$ide_alu="",$nom_alu="",$ape_alu="",$te1_alu="",$ema_alu="");
    $alumno=$objAlumno->extraer_dato($alu);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Falla</title>
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
		    <input type="text" name="ide_alu" id="ide_alu" required="required" maxlength="15" class="form-control" placeholder="C&eacute;dula del Alumno" value="<?php echo $alumno['ide_alu'] ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Fecha Falla:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="fec_fal" id="fec_fal" required="required" maxlength="15" class="form-control" 
		    value="<?php echo $obj->voltear_timestamp($datos['fec_fal']) ?>" disabled>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Laptop:</label>
		</div>
		<div class="col-md-6 col-12">
		      <select name="lap_fal" id="lap_fal" class="form-control">
		        <option value="">Seleccione...</option>
		      	<option value="1" <?php echo ($datos['lap_fal']=="1")?"selected":""?> >Laptop N° 1</option>
		      	<option value="2" <?php echo ($datos['lap_fal']=="2")?"selected":""?> >Laptop N° 2</option>
		      	<option value="3" <?php echo ($datos['lap_fal']=="3")?"selected":""?> >Laptop N° 3</option>
		      	<option value="4" <?php echo ($datos['lap_fal']=="4")?"selected":""?> >Laptop N° 4</option>
		      	<option value="5" <?php echo ($datos['lap_fal']=="5")?"selected":""?> >Laptop N° 5</option>
		      	<option value="6" <?php echo ($datos['lap_fal']=="6")?"selected":""?> >Laptop N° 6</option>
		      	<option value="7" <?php echo ($datos['lap_fal']=="7")?"selected":""?> >Laptop N° 7</option>
		      	<option value="8" <?php echo ($datos['lap_fal']=="8")?"selected":""?> >Laptop N° 8</option>
		      	<option value="9" <?php echo ($datos['lap_fal']=="9")?"selected":""?> >Laptop N° 9</option>
		      	<option value="10" <?php echo ($datos['lap_fal']=="10")?"selected":""?> >Laptop N° 10</option>
		      	<option value="11" <?php echo ($datos['lap_fal']=="11")?"selected":""?> >Laptop N° 11</option>
		      	<option value="12" <?php echo ($datos['lap_fal']=="12")?"selected":""?> >Laptop N° 12</option>
		      	<option value="13" <?php echo ($datos['lap_fal']=="13")?"selected":""?> >Laptop N° 13</option>
		      	<option value="14" <?php echo ($datos['lap_fal']=="14")?"selected":""?> >Laptop N° 14</option>
		      	<option value="15" <?php echo ($datos['lap_fal']=="15")?"selected":""?> >Laptop N° 15</option>
		      	<option value="16" <?php echo ($datos['lap_fal']=="16")?"selected":""?> >Laptop N° 16</option>
		      	<option value="17" <?php echo ($datos['lap_fal']=="17")?"selected":""?> >Laptop N° 17</option>
		        <option value="18" <?php echo ($datos['lap_fal']=="18")?"selected":""?> >Laptop Instructor</option>
		      </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Observaciones de la Falla:</label>
		</div>
		<div class="col-md-6 col-12">
		   <textarea name="obs_fal" id="obs_fal" class="form-control" required><?php echo $datos['obs_fal'] ?></textarea>
		</div>

	  </div>


	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-6 col-12">
		<select name="est_fal" id="est_fal" class="form-control">
		  <?php
		    $selected=($datos["est_fal"]==A)?"selected":"";
			echo "<option value='A' $selected>Ticket Abierto, por resolver.</option>";
			$selected=($datos["est_fal"]==R)?"selected":"";
			echo "<option value='R' $selected>Resuelto el problema.</option>";
		  ?>		
		</select>

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
<input type="hidden" name="accion" id="accion" value="modificar">
<input type="hidden" name="cod_fal" id="cod_fal" value="<?php echo $datos['cod_fal'] ?>">	
<input type="hidden" name="fky_alumno" id="fky_alumno" value="<?php echo $datos['fky_alumno']?>">		
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>