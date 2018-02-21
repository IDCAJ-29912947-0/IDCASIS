<?php
require("../../../backend/clase/cuenta.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/banco.class.php");
require("../../../backend/clase/empresa.class.php");



$obj=new cuenta;
$objBanco=new banco;
$objEmpresa=new empresa;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Cuenta</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/cuenta.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8  ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Cuenta</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-right">
		     <label for="">Banco:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="fky_banco" id="fky_banco" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objBanco->asignar_valor("est_ban","A");
		    $pun_ban=$objBanco->listar();
		    while(($banco=$objBanco->extraer_dato($pun_ban))>0)
		    {
		    	echo "<option value='$banco[cod_ban]'>$banco[nom_ban]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-right">
		     <label for="">Tipo:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="tip_cue" id="tip_cue" class="form-control">
		    	<option value="X">Seleccione...</option>
		    	<option value="A">Corriente</option>
		    	<option value="I">Ahorro</option>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-right">
		     <label for="">RIF:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="rif_cue" id="rif_cue" required="required" maxlength="15" class="form-control" placeholder="RIF de la Cuenta">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-right">
		     <label for="">Titular:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="nom_cue" id="nom_cue" required="required" maxlength="25" class="form-control" placeholder="Titular de la Cuenta">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-right">
		     <label for="">Número de Cuenta:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="num_cue" id="num_cue" required="required" maxlength="20" class="form-control" placeholder="Número de Cuenta">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-right">
		     <label for="">Empresa:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="fky_empresa" id="fky_empresa" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objEmpresa->asignar_valor("est_emp","A");
		    $pun_ban=$objEmpresa->listar();
		    while(($empresa=$objEmpresa->extraer_dato($pun_ban))>0)
		    {
		    	echo "<option value='$empresa[cod_emp]'>$empresa[nom_emp]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>	  



	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-right">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_cue" id="est_cue" class="form-control">
			<option value="A" selected="">Activa</option>
			<option value="I">Inactiva</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Cuenta">
		</div>
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