<?php
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/tipo_curso.class.php");

$obj=new tipo_curso;
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
	<title>Seleccionar Tipo de Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="paso2_requisitos_por_curso.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Seleccionar Tipo de Curso</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Curso:</label>
		</div>
		<div class="col-md-9 col-12 text-left">
		   <select name="fky_tipo_curso" id="fky_tipo_curso" required class="form-control">
		   	<option value="">Seleccione...</option>
		   <?php
		       $obj->est_tip_cur="A";
		   	   $tc=$obj->listar();
		   	   while(($tipo_curso=$obj->extraer_dato($tc))>0)
			   {
                echo "<option value='$tipo_curso[cod_tip_cur]'>$tipo_curso[nom_tip_cur]</option>";
			   }
		   ?>
		   </select>
		</div>

	  </div>
	 

	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Continuar">
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