<?php
require("../../../backend/clase/area.class.php");
require("../../../backend/clase/carrera.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/universidad.class.php");



$obj=new carrera;
$objArea=new area;
$objPermiso=new permiso;
$objUniversidad=new universidad;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
  $resultado=$obj->filtrar($obj->cod_car,$nom_car="",$est_car="");
  $datos=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Carrera Universitaria</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/carrera.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8  ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Carrera Universitaria</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_car" id="nom_car" required="required" maxlength="50" class="form-control" placeholder="Nombre de la Carrera" value="<?php echo $datos['nom_car']?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Universidad:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_universidad" id="fky_universidad" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objUniversidad->asignar_valor("est_uni","A");
		    $pun_uni=$objUniversidad->listar();
		    while(($universidad=$objUniversidad->extraer_dato($pun_uni))>0)
		    {
		    	
		    	$selected=($datos['fky_universidad']==$universidad['cod_uni'])?"selected":"";
		    	echo "<option value='$universidad[cod_uni]' $selected>$universidad[nom_uni]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Area:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_area" id="fky_area" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objArea->asignar_valor("est_are","A");
		    $pun_are=$objArea->listar();
		    while(($area=$objArea->extraer_dato($pun_are))>0)
		    {
		    	$selected=($datos['fky_area']==$area['cod_are'])?"selected":"";
		    	echo "<option value='$area[cod_are]' $selected>$area[nom_are]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	     <div class="col-md-2 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-6 col-12">
		<select name="est_car" id="est_car" class="form-control">
		  <?php
		    $selected=($datos["est_car"]=="A")?"selected":"";
			echo "<option value='A' $selected>Activa</option>";
		    $selected=($datos["est_car"]=="I")?"selected":"";			
			echo "<option value='I' $selected>Inactiva</option>";	
		  ?>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Carrera">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="modificar">
<input type="hidden" name="cod_car" id="cod_car" value="<?php echo $datos['cod_car']?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>