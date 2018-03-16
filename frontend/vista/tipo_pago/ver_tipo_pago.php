<?php
require("../../../backend/clase/tipo_pago.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new tipo_pago;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=7,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_tip_pag,$nom_tip_pag="",$est_tip_pag="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Tipo de Pago</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/tipo_pago.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Tipo de Pago</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_tip_pag" id="nom_tip_pag" required="required" maxlength="50" class="form-control" placeholder="Nombre del Tipo de Pago" 
		    value="<?php echo $datos['nom_tip_pag']; ?>" readonly>
		</div>

	  </div> 


	  <div class="row mt-2">
	     <div class="col-md-2 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
		<fieldset disabled>
			<select name='est_tip_pag' id='est_tip_pag' class='form-control'>
			 <?php
			 $selected = ($datos['est_tip_pag']=='A') ? "selected":"";
			 echo "<option value='A' $selected>Activo</option>";
			 $selected = ($datos['est_tip_pag']=='I') ? "selected":"";
			 echo "<option value='I' $selected>Inactivo</option>";
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