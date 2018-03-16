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

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

$objPais->asignar_valor("est_pai","A");
$objUniversidad->asignar_valor("est_uni","A");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Alumno</title>
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
		    <input type="text" name="ide_alu" id="ide_alu" required="required" maxlength="15" class="form-control" placeholder="Cédula del Alumno" onkeyup="return solo_numeros();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombres:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="nom_alu" id="nom_alu" required="required" maxlength="25" class="form-control" placeholder="Nombre del Alumno" onkeyup="return solo_letras();">
		</div>

	  </div>

	   <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Apellidos:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="ape_alu" id="ape_alu" required="required" maxlength="25" class="form-control" placeholder="Apellido del Alumno" onkeyup="return solo_letras();">
		</div>

	  </div> 

	   <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Sexo:</label>
		</div>
		<div class="col-md-4 col-12">
		  <div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" name="sex_alu" id="sex_alu1" class="form-check-input mr-2" value="M">Masculino
						</label>

						<label class="form-check-label">
							<input type="radio" name="sex_alu" id="sex_alu2" class="form-check-input mr-2" value="F">Femenino
						</label>
					</div>
		</div>

	  </div> 

	   <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ema_alu" id="ema_alu" required="required" maxlength="80" class="form-control" placeholder="Email del Alumno" onkeyup="return solo_email();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Número de Celular:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="te1_alu" id="te1_alu" required="required" maxlength="15" class="form-control" placeholder="Preferiblemente con Whatsapp" onkeyup="return solo_numeros();">
		</div>

	  </div> 


	  <div class="row mt-2">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Teléfono Secundario:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="te2_alu" id="te2_alu" maxlength="15" class="form-control" placeholder="Teléfono Secundario" onkeyup="return solo_numeros();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Instagram:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ins_alu" id="ins_alu" maxlength="20" class="form-control" placeholder="Instagram">
		</div>

	  </div> 

	  <div class="row mt-2">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Universidad:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_universidad" id="fky_universidad" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $datoUni=$objUniversidad->listar();

		   while(($universidad=$objUniversidad->extraer_dato($datoUni))>0)
		   {
		   		echo "<option value='$universidad[cod_uni]'>$universidad[nom_uni]</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>

	  <div class="row mt-2">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">Carrera:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_carrera" id="fky_carrera" class="form-control">
		   <option>Seleccione...</option>
		   <?php
           $objCarrera->est_car="A";		   
		   $datoCar=$objCarrera->listar();
		   while(($carrera=$objCarrera->extraer_dato($datoCar))>0)
		   {
		   		echo "<option value='$carrera[cod_car]'>$carrera[nom_car]</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>

	  <div class="row mt-2">
	  <div class="col-md-2 col-12 align-self-center">
		     <label for="">País:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_pais" id="fky_pais" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $datoPais=$objPais->listar();

		   while(($pais=$objPais->extraer_dato($datoPais))>0)
		   {
		   		echo "<option value='$pais[cod_pai]'>$pais[nom_pai]</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>

	  <div class="row mt-2">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_alu" id="est_alu" class="form-control">
			<option value="A" selected="">Activo</option>
			<option value="S">Suspendido, el motivo se debe a no cumplir con las políticas de la empresa</option>
			<option value="I">Inactivo, el alumno se fué del pais o no quiere recibir correos</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Alumno">
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