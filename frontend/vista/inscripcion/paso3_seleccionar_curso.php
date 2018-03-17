<?php
require("../../../backend/clase/curso.class.php");
require("../../../backend/clase/alumno.class.php");

$prk_aud=0;
$num_aff=0;
$obj=new curso;
$objAlumno=new alumno;

foreach($_REQUEST as $nombre_campo => $valor){
  	$objAlumno->asignar_valor($nombre_campo,$valor);
} 

	/*Ahora vemos si debemos agregar al alumno por primera vez o modificamos sus datos*/
	switch($_POST["accion"])
	{

	  case 'agregar':
	  			$res=$objAlumno->agregar();
				$prk_aud=$objAlumno->ultimo_id_insertado();
				if($prk_aud>0){	
					$obj->auditoria($prk_aud);
					$cod_alu=$prk_aud;
				}	
	  break;

	  case 'modificar':
	            $cod_alu=$objAlumno->cod_alu;
				$res=$objAlumno->modificar();
				$num_aff=$objAlumno->filas_afectadas();
				if($num_aff>0){
				$obj->auditoria($objAlumno->cod_alu);					
				}
	  break;

	}


	if($prk_aud>0 || $num_aff>=0)
	{
  		 $objAlumno->mensaje("success","Muy bien ".$objAlumno->nom_alu."!!!, ahora solo debes seleccionar el curso que deseas hacer :)");
	}else
	{
		$objAlumno->mensaje("danger","Error al procesar Alumno");
		exit;
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seleccionar Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/requisitos_curso.js"></script>
</head>
<body>

<form action="paso4_confirmar_curso.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	  <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Seleccionar Curso</h3>
	 	 </div>
	  </div>
	 

	  <div class="row mt-2">
	  <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Curso a <span class="badge badge-success badge-pill">Pre-Inscribir:</span> 
		    </label>
		</div>
		
		<div class="col-md-8 col-12">
		   <select name="fky_curso" id="fky_curso" class="form-control" onchange="buscar_requisitos_curso()">
		   <option>Seleccione...</option>
		   <?php
		   $obj->est_cur="A";
		   $cur=$obj->listar();
		   while(($curso=$obj->extraer_dato($cur))>0)
		   {	
		   		echo "<option value='$curso[cod_cur]'>$curso[nom_tip_cur] / Inicio: ".$obj->voltear_fecha($curso['ini_cur'])." </option>";
		   }
		   ?>
		   </select>
		</div>


	  <div class="col-md-12 col-12 mt-3 d-none" id="zona_barra">
	  	Cargando requisitos...
		  <div class="progress mb-3">

			  <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 10%; height: 20px; line-height: 50px;" id="barra"><span id="porcentaje"></span></div>
		  </div>
	  </div>

      <div class="col-md-12 col-12 mt-3" id="requisitos">
      	

      </div>		

       </div>
  
		<div class="row mt-2 bg-light">
			 <div class="col-12  text-center">
				   <input type="submit" class="btn btn-primary btn-md" value="Continuar" disabled id="boton">
			</div>
		</div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="fky_alumno" id="fky_alumno" value="<?php echo $cod_alu;?>">			
</form>	
</body>
	<script src="../../bootstrap-4.0/js/jquery-3.2.1.min.js"></script>
	<script src="../../bootstrap-4.0/js/popper-1.12.6.min.js"></script>
	<script src="../../bootstrap-4.0/js/bootstrap.min.js"></script>
</html>
