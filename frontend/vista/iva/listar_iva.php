<?php
require("../../../backend/clase/iva.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new iva;
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
	<title>Listar IVA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>

<form action="listar_instructor.php" method="POST">
	<div class="container-fluid">
		<div class="row justify-content-center">	
			<div class="col-10 text-center ">

				 <div class="row bg-primary text-white">
	 				 <div class="col-12 text-center">
	  					<h3>Datos del IVA</h3>
	 				 </div>
	 			 </div>

	 			 <div class="row mt-1 bg-primary text-white text-center">


						<div class="col-md-2 col-12 border border-white text-center">
		  						
						</div>

						<div class="col-md-2 col-12  border border-white">
		   						 <span>Valor %</span>
						</div>

						<div class="col-md-3 col-12 border border-white ">
		     					<span>Inicio Vigencia</span>
						</div>

						<div class="col-md-3 col-12 border border-white ">
		     					<span>Fin de Vigencia</span>
						</div>

						<div class="col-md-2 col-12 border border-white ">
		     					<span>Estatus</span>
						</div>


				</div> <!-- Fin Row-->

	    		<div class="row mt-1 justify-content-center bg-light">
					<?php
		
						$num_fil=0;
						$resultado=$obj->filtrar("",$obj->est_iva);
						while(($datos=$obj->extraer_dato($resultado))>0){
						$num_fil++;	
					?>

						<div class="col-md-2 col-12 border border-white text-center">
		  						<a href="<?php echo "ver_iva.php?cod_iva=$datos[cod_iva]"?>">Ver<i class="fas fa-eye"></i></a> 
		  						<a href="<?php echo "modificar_iva.php?cod_iva=$datos[cod_iva]"?>">Mod<i class="fas fa-edit"></i></a>  
						</div>

						<div class="col-md-2 col-12 border border-white">
		  					   <span><?php echo $datos['val_iva']; ?>%</span>
						</div>

						<div class="col-md-3 col-12 border border-white text-left">
		   					  <span><?php echo $datos['ini_iva']; ?></span>
						</div>

						<div class="col-md-3 col-12 border border-white text-left">
		   					  <span><?php echo $datos['fin_iva']; ?></span>
						</div>

						<div class="col-md-2 col-12 border border-white">
		  					    <span>
		     						<?php echo ($datos['est_iva']=="A") ? "Activo":"Inactivo"; ?>
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