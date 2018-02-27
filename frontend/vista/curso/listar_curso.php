<?php

$genModulo="o"; /* Genero del Módulo, masculino o Femenino*/
$sufijo="_cur";
$clase="curso";
$cod_opcion=9;
$nomModulo="Curso";
$codigo="cod_cur";
$nombre="nom_tip_cur";
$estatus="est_cur";

require("../../../backend/clase/$clase.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/turno.class.php");

$obj=new $clase;
$objTurno=new turno;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($cod_opcion,$fky_usuario=1,$token=md5("12345"));
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
	<title>Listar <?php echo $nomModulo; ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>


<form action="listar_$clase.php" method="POST">

	<div class="container-fluid">

	<div class="row justify-content-center">
	<div class="col-12 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del <?php echo $nomModulo; ?></h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

	  	<div class="col-md-1 col-12 border border-white">
		  <i class="fas fa-eye"></i> 
		  <i class="fas fa-edit"></i>  
		  
		</div>

		<div class="col-md-3 col-12 border border-white ">
		     <span>Nombre del <?php echo $nomModulo; ?></span>
		</div>

		<div class="col-md-1 col-12  border border-white">
		     <span>Inicio</span>
		</div>

		<div class="col-md-5 col-12  border border-white">
		     <span>Horario y Turno</span>
		</div>

		<div class="col-md-1 col-12  border border-white">
		     <span>Precio</span>
		</div>		

		<div class="col-md-1 col-12 border border-white">
		     <span>Estatus</span>
		</div>

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		
		$num_fil=0;
		$resultado=$obj->filtrar($cod_cur="",$obj->fky_tipo_curso,$obj->fky_instructor,$obj->fky_modalidad,$obj->ini_cur,$obj->fin_cur,$obj->est_cur);
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-1 col-12 border border-white text-center">
		  <a href="<?php echo "ver_$clase.php?$codigo=$datos[$codigo]"?>"><i class="fas fa-eye"></i></a> 
		  <a href="<?php echo "modificar_$clase.php?$codigo=$datos[$codigo]"?>"><i class="fas fa-edit"></i></a>  
		</div>

		<div class="col-md-3 col-12 border border-white text-left">
		     <small><?php echo $datos["$nombre"]; ?></small>
		</div>

		<div class="col-md-1 col-12 border border-white text-left">
		     <small><?php echo $obj->voltear_fecha($datos["ini_cur"]); ?></small>
		</div>

		<div class="col-md-5 col-12 border border-white text-left">
		     <small><?php echo $datos["nom_hor"]; ?></small>
		     <small>
		     <?php 
		     	$tur1=$objTurno->filtrar($datos["fk1_turno"],"","");
		     	$turno1=$objTurno->extraer_dato($tur1);
		     	$tur2=$objTurno->filtrar($datos["fk2_turno"],"","");
		  		$turno2=$objTurno->extraer_dato($tur2);   	
		     	echo ("(".substr($turno1["ini_tur"],0,5)." a ".substr($turno1["fin_tur"],0,5).")");
		     	if($datos["fk2_turno"])
			     { echo (" y (".substr($turno2["ini_tur"],0,5)." a ".substr($turno2["fin_tur"],0,5).")"); }  	
		     ?>	
		     </small>
		</div>

		<div class="col-md-1 col-12 border border-white text-right">
		     <small><?php echo $obj->formatear_numero($datos["pre_cur"]); ?></small>
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <small>
		     	<?php 
		     		switch($datos[$estatus])
		     		{
		     			case "A": echo "Activo"; break;
		     			case "I": echo "Inactivo"; break;
		     			case "C": echo "Cupo Lleno"; break;
		     		}
		     	 ?>
		     </small>
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