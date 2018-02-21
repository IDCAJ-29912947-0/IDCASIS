<?php
require("../../../backend/clase/contenido.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new contenido;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=9,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);


if($acceso["est_per"]=="A")
{


	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listar Contenido</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>


<form action="listar_contenido.php" method="POST">

	<div class="container-fluid">

	<div class="row justify-content-center">
	<div class="col-11 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Contenido</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

	  	<div class="col-md-1 col-12 border border-white">
		  <i class="fas fa-eye"></i> 
		  <i class="fas fa-edit"></i>  
		  
		</div>

		<div class="col-md-2 col-12  border border-white">
		     <span>Código</span>
		</div>

		<div class="col-md-8 col-12 border border-white ">
		     <span>Nombre del Contenido</span>
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <span>Estatus</span>
		</div>

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		
		$num_fil=0;
		$resultado=$obj->filtrar("",$obj->nom_con,"");
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-1 col-12 border border-white text-center">
		  <a href="<?php echo "ver_contenido.php?cod_con=$datos[cod_con]"?>"><i class="fas fa-eye"></i></a> 
		  <a href="<?php echo "modificar_contenido.php?cod_con=$datos[cod_con]"?>"><i class="fas fa-edit"></i></a>  
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <span><?php echo $datos['cod_con']; ?></span>
		</div>

		<div class="col-md-8 col-12 border border-white text-left">
		     <span><?php echo $datos['nom_con']; ?></span>
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <span>
		     	<?php echo ($datos['est_con']=="A") ? "Activa":"Inactiva"; ?>
		     </span>
		</div>
		
		<?php
		}

		if($num_fil==0){
		?>
		<div class="col-12 border border-white text-center">
		     <span>No hay registros</span>
		</div>
		<?php
		}	
		?>

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