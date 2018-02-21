<?php
require("../../../backend/clase/empresa.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new empresa;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=7,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_emp,$nom_emp="",$est_emp="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Empresa</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/empresa.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Empresa</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">RIF:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="rif_emp" id="rif_emp" required="required" maxlength="15" class="form-control" placeholder="RIF de la Empresa" value="<?php echo $datos['rif_emp']; ?>">
		</div>

	  </div>

	  <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="nom_emp" id="nom_emp" required="required" maxlength="50" class="form-control" placeholder="Nombre de la Empresa" 
		    value="<?php echo $datos['nom_emp']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Domicilio:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="dom_emp" id="dom_emp" required="required" maxlength="100" 
		     class="form-control" placeholder="Domicilio Fiscal" 
		     value="<?php echo $datos['dom_emp']; ?>">
		</div>

	  </div>

	  <div class="row mt-2">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	     <select name='est_emp' id='est_emp' class='form-control'>
		 <?php
		 $selected = ($datos['est_emp']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activa</option>";
		 $selected = ($datos['est_emp']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactiva</option>";
		 ?>
		</select>
	   </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Empresa">
		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_emp" id="cod_emp" value="<?php echo $datos['cod_emp']; ?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>