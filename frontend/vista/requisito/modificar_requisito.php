<?php
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/requisito.class.php");
require("../../../backend/clase/tipo_requisito.class.php");



$obj=new requisito;
$objPermiso=new permiso;
$objTipoRequisito=new tipo_requisito;


$permiso=$objPermiso->validar_acceso($opcion=7,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_req,$nom_req="",$est_req="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Requisito</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/requisito.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-10 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Requisito</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="nom_req" id="nom_req" required="required" maxlength="80" class="form-control" placeholder="Nombre del Requisito" onkeyup="return solo_numeros();" 
		    value="<?php echo $datos['nom_req']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Tipo de Requisito:</label>
		</div>
		<div class="col-md-9 col-12 ">
		    <select name="fky_tipo_requisito" id="fky_tipo_requisito" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objTipoRequisito->asignar_valor("est_tip_req","A");
		    $pun_tr=$objTipoRequisito->listar();
		    while(($tipo_requisito=$objTipoRequisito->extraer_dato($pun_tr))>0)
		    {
		    	$selected=($tipo_requisito['cod_tip_req']==$datos['fky_tipo_requisito'])?"selected":"";
		    	echo "<option value='$tipo_requisito[cod_tip_req]' $selected>$tipo_requisito[nom_tip_req]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-9 col-12">
	     <select name='est_req' id='est_req' class='form-control'>
		 <?php
		 $selected = ($datos['est_req']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_req']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo</option>";
		 ?>
		</select>
	   </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Requisito">
		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_req" id="cod_req" value="<?php echo $datos['cod_req']; ?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>