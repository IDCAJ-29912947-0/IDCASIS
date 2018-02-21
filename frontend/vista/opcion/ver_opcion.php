<?php
require("../../../backend/clase/opcion.class.php");
require("../../../backend/clase/modulo.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new opcion;
$objModulo=new modulo;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=25,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_opc,$nom_opc="",$est_opc="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="latin-1">
	<title>Ver Opci&oacute;n</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/modulo.php" method="POST">

  <div class="container">

	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Opci&oacute;n</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">C&oacute;digo:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['cod_opc']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text"  class="form-control" value="<?php echo $datos['nom_opc']; ?>" size="35" readonly >
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">URL:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="url_opc" id="url_opc" required="required" class="form-control" placeholder="URL del Módulo" size="50" value="<?php echo $datos['url_opc']; ?>" readonly>
		</div>

	  </div>

	
	  <div class="row mt-2">
	    <div class="col-md-2 col-12 align-self-center">
		     <label for="">M&oacute;dulo:</label>
		</div>
		<div class="col-md-6 col-12">
		<fieldset disabled>
		   <select name="fky_modulo" id="fky_modulo" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $objModulo->asignar_valor("est_mod","A");
		   $datoMod=$objModulo->listar();

		   while(($modulo=$objModulo->extraer_dato($datoMod))>0)
		   {
		   		$selected = ($datos['fky_modulo']==$modulo['cod_mod']) ? "selected":"";
		   		echo "<option value='$modulo[cod_mod]' $selected>$modulo[nom_mod]</option>";
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
		 $selected = ($datos['est_opc']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activa</option>";
		 $selected = ($datos['est_opc']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactiva</option>";	
		 ?>
		</select>
		</fieldset>
	   </div>
	  </div>
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