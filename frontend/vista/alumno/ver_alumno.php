<?php
require("../../../backend/clase/alumno.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/carrera.class.php");
require("../../../backend/clase/universidad.class.php");
require("../../../backend/clase/pais.class.php");

$objPais=new pais;
$obj=new alumno;
$objPermiso=new permiso;
$objCarrera=new carrera;
$objUniversidad=new universidad;

$permiso=$objPermiso->validar_acceso($opcion=5,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_alu,$ide_alu="",$nom_alu="",$ape_alu="",$te1_alu="",$ema_alu="");
$datos=$obj->extraer_dato($resultado);

$objPais->asignar_valor("est_pai","A");
$objUniversidad->asignar_valor("est_uni","A");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Alumno</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/alumno.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Alumno</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Cédula:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['ide_alu']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombres:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text"  class="form-control" value="<?php echo $datos['nom_alu']; ?>" readonly>
		</div>

	  </div>

	   <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Apellidos:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['ape_alu']; ?>" readonly>
		</div>

	  </div> 

	   <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Sexo:</label>
		</div>
		<div class="col-md-4 col-12">
		  <div class="form-check-inline">
						<label class="form-check-label">
						<?php
							$checked = ($datos['sex_alu']=="M") ? "checked":"";
							echo "<input type='radio' name='sex_alu' class='form-check-input mr-2' value='M' $checked>Masculino";
						?>	
						</label>

						<label class="form-check-label">
						<?php
							$checked = ($datos['sex_alu']=="F") ? "checked":"";
							echo "<input type='radio' name='sex_alu'  class='form-check-input mr-2' value='F' $checked>Femenino";
						?>	
						</label>
					</div>
		</div>

	  </div> 

	   <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['ema_alu']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Número de Celular:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['te1_alu']; ?>" readonly>
		</div>

	  </div> 


	  <div class="row mt-2">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Teléfono Secundario:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['te2_alu']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Instagram:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['ins_alu']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2">

	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Universidad:</label>
		</div>
		<div class="col-md-6 col-12">
		<fieldset disabled>
		   <select name="fky_universidad" id="fky_universidad" class="form-control">
		   <option value="X">Seleccione...</option>
		   <?php
		   $datoUni=$objUniversidad->listar();

		   while(($universidad=$objUniversidad->extraer_dato($datoUni))>0)
		   {	
		   		$selected = ($datos['fky_universidad']==$universidad['cod_uni']) ? "selected":"";
		   		echo "<option value='$universidad[cod_uni]' $selected>$universidad[nom_uni]</option>";
		   }
		   ?>
		   </select>
		 </fieldset>
		</div>

	  </div>

	  <div class="row mt-2">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Carrera:</label>
		</div>
		<div class="col-md-6 col-12">
			<fieldset disabled>
				<select name="fky_carrera" id="fky_carrera" class="form-control">
					<option>Seleccione...</option>
					<?php
					$objCarrera->est_car="A";		   
					$datoCar=$objCarrera->listar();
					while(($carrera=$objCarrera->extraer_dato($datoCar))>0)
					{
							$selected=($carrera["cod_car"]==$datos["fky_carrera"])?"selected":"";
							echo "<option value='$carrera[cod_car]' $selected>$carrera[nom_car]</option>";
					}
					?>
				</select>
			</fieldset>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">País:</label>
		</div>
		<div class="col-md-6 col-12">
		<fieldset disabled>
		   <select class="form-control">
		   <option value="X">Seleccione...</option>
		   <?php
		   $datoPais=$objPais->listar();

		   while(($pais=$objPais->extraer_dato($datoPais))>0)
		   {
		   		$selected = ($datos['fky_pais']==$pais['cod_pai']) ? "selected":"";
		   		echo "<option value='$pais[cod_pai]' $selected>$pais[nom_pai]</option>";
		   }
		   ?>
		   </select>
		 </fieldset> 
		</div>

	  </div>

	  <div class="row mt-2">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	  <fieldset disabled>
	     <select class='form-control'>
	     <option value="X">Seleccione...</option>
		 <?php
		 $selected = ($datos['est_alu']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_alu']=='S') ? "selected":"";
		 echo "<option value='S' $selected>Suspendido, el motivo se debe a no cumplir con las políticas de la empresa</option>";
		 $selected = ($datos['est_alu']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo, el alumno se fué del pais o no quiere recibir correos</option>";	
		 ?>
		</select>
		</fieldset>
	   </div>
	  </div>
  	  
	</div> <!-- Fin Container -->
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>