<?php
require("../../../backend/clase/curso.class.php");
require("../../../backend/clase/turno.class.php");
require("../../../backend/clase/medio_publicidad.class.php");

$obj=new curso;	
$objTurno=new turno;
$objMedio=new medio_publicidad;

	foreach($_REQUEST as $nombre_campo => $valor){
	  	$obj->asignar_valor($nombre_campo,$valor);
	} 
echo "el curso es: ".$obj->fky_curso;
		$resultado=$obj->filtrar($obj->fky_curso,"","","","","","");
		$datos=$obj->extraer_dato($resultado);

		$tur1=$objTurno->filtrar($datos["fk1_turno"],"","");
		$turno1=$objTurno->extraer_dato($tur1);
		$turno=($obj->formatear_hora($turno1["ini_tur"]).$turno1["mer_tur"]." a ".$obj->formatear_hora($turno1["fin_tur"]));
		

        if($datos["fk2_turno"]!="")
        {
			$tur2=$objTurno->filtrar($datos["fk2_turno"],"","");
			$turno2=$objTurno->extraer_dato($tur2);		
			if($turno2["cod_tur"]!="")
			{
				$turno.=" + ".($obj->formatear_hora($turno2["ini_tur"]).$turno2["mer_tur"]." a ".$obj->formatear_hora($turno2["fin_tur"]).$turno2["mer_tur"]);
				$turno.="<span class='badge badge-danger'>Debes asistir todo el día</span>";	
			}
		}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/curso.js"></script>
</head>
<body>

<form action="../../../backend/controlador/inscripcion.php">
	<div class="alert alert-success">
		<span>Por favor revisa con detenimiento los datos del curso en el cual te estas <span class="badge badge-success">Pre-Inscribiendo.</span></span>
	</div>
	
	<div class="container">
		<div class="row justify-content-center">
		<div class="col-9 text-center ">
	
		 <div class="row bg-primary text-white">
		 	 <div class="col-12 text-center">
		  	<h3>Datos del Curso</h3>
		 	 </div>
		  </div>
	
		  <div class="row mt-1 bg-light">
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Curso:</strong>
			</div>
			<div class="col-md-6 col-12 text-left">
				<span><?php echo $datos["nom_tip_cur"] ?></span>
			</div>
		  </div>
	
		  <div class="row mt-1 bg-light">
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Instructor:</strong>
			</div>
			<div class="col-md-6 col-12 text-left">
			    <?php echo $datos["nom_ins"]." ".$datos["ape_ins"]; ?>
			</div>
		  </div>
	
	
		  <div class="row mt-1 bg-light">
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Horario:</strong>
			</div>
			<div class="col-md-6 col-12 text-left">
		   		 <?php echo $datos["nom_hor"] ?>
			</div>
		  </div>
	
		  <div class="row mt-1 bg-light">
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Turno:</strong>
			</div>
			<div class="col-md-6 col-12 text-left">
		    	<span><?php echo $turno; ?></span>
			</div>
		  </div>
	
		  <div class="row mt-1 bg-light">
	
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Fecha Inicio:</strong>
			</div>
			<div class="col-md-6 col-12 text-left">
			     <?php echo $obj->voltear_fecha($datos['ini_cur']);?>
			</div>
	
		  </div>
	
		  <div class="row mt-1 bg-light">
	
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Fecha Finalizaci&oacute;n:</strong>
			</div>
			<div class="col-md-6 col-12 text-left">
			    <?php echo $obj->voltear_fecha($datos['fin_cur']);?>
			</div>
	
		  </div>
	
	
		  <div class="row mt-1 bg-light">
	
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Precio Total:</strong>
			</div>
			<div class="col-md-9 col-12 text-left">
			    <?php echo $obj->formatear_numero($datos['pre_cur']); ?> Bs.
			    <small class="badge badge-success">(Puedes pagarlo en 2 cuotas de <?php echo $obj->formatear_numero($datos['pre_cur']/2); ?> Bs.)</small>
			</div>
	
		  </div>
	
	
		  <div class="row mt-1 bg-light">
			<div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Modalidad:</strong>
			</div>
			<div class="col-md-6 col-12 text-left">
			  <?php echo $datos['nom_mod']?>
			</div>
		  </div>
	
	
		  <div class="row mt-1 bg-light">
	
			<div class="col-md-3 col-12 align-self-center text-left mb-5">
			     <strong>Observaciones:</strong>
			</div>
			<div class="col-md-8 col-12 text-left"><?php echo $datos["obs_cur"]?>
			</div>
	
		  </div>

		 <div class="row bg-primary text-white">
		 	 <div class="col-12 text-center">
		  	<h3>¿Cómo te enteraste del curso?</h3>
		 	 </div>
		  </div>

        <div class="row mt-1">

	    <div class="col-md-3 col-12 align-self-center text-left">
			     <strong>Medio Publicidad:</strong>
		</div>		  

		<div class="col-md-9 col-12 mt-2">
		   <select name="fky_medio_publicidad" id="fky_medio_publicidad" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $objMedio->est_med="A";
		   $cur=$objMedio->listar();
		   while(($medio=$objMedio->extraer_dato($cur))>0)
		   {	
		   		echo "<option value='$medio[cod_med]'>$medio[nom_med]</option>";
		   }
		   ?>
		   </select>
		</div>
		</div>		  		  
	
		  <div class="row mt-3 bg-light">
		  	 <div class="col-12  text-center">
			     <input type="submit" class="btn btn-primary btn-md" value="Guardar Pre-Inscripción">
			</div>
		   </div>		  
	  	  
	    </div>
	  </div>
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="agregar">			
	<input type="hidden" name="fky_curso" id="fky_curso" value="<?php echo $obj->fky_curso;?>">			
	<input type="hidden" name="fky_alumno" id="fky_alumno" value="<?php echo $_POST['fky_alumno'];?>">	
</form>	
</body>
</html>