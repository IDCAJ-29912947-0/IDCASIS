<?php
require("../../../backend/clase/iva.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new iva;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
    } 

	$resultado=$obj->filtrar($obj->cod_iva,$est_iva="");
	$datos=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar IVA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del IVA</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 align-self-center">
		     	<label for="">Valor:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="val_iva" id="val_iva" required="required" maxlength="2" class="form-control" placeholder="Porcentaje de IVA"  value="<?php echo $datos['val_iva'] ?>%" disabled>
			</div>
	  </div>

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 align-self-center">
		     	<label for="">Fecha de Inicio:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  	 <input type="date" name="ini_iva" id="ini_iva" required="required" maxlength="35" class="form-control" placeholder="Inicio de Vigencia" value="<?php echo $datos['ini_iva'] ?>"  disabled>
			</div>
	  </div>

	  <div class="row mt-2 bg-light">
			<div class="col-md-3 col-12 align-self-center">
		     	<label for="">Fecha Fin:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  	   <input type="date" name="fin_iva" id="fin_iva" required="required" maxlength="35" class="form-control" placeholder="Fin de Vigencia"  value="<?php echo $datos['fin_iva'] ?>"  disabled>
			</div>
	  </div>	

	  <div class="row mt-2">
	    	 <div class="col-md-3 col-12 align-self-center">
		    	 <label for="">Estatus:</label>
			</div>
	    	<div class="col-md-4 col-12">
	    	<fieldset disabled>
				<select name="est_iva" id="est_iva" class="form-control">
					<?php
					$selected=($datos['est_iva']=="A")?"selected":"";
					echo "<option value='A' $selected>Activo</option>";
					$selected=($datos['est_iva']=="I")?"selected":"";					
					echo "<option value='I' $selected>Inactivo</option>";	
					?>
				</select>
			</fieldset>		
			</div>
	   </div>


    </div>
  </div>
</div> <!-- Fin Container -->
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>