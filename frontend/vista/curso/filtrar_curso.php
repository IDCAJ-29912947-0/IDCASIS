<?php
require("../../../backend/clase/curso.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/modalidad.class.php");
require("../../../backend/clase/tipo_curso.class.php");
require("../../../backend/clase/instructor.class.php");


$obj=new curso;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=8,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$objModalidad=new modalidad;
	$objTipoCurso=new tipo_curso;
	$objInstructor=new instructor;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filtrar Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_curso.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Buscar del Curso</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Curso:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_tipo_curso" id="fky_tipo_curso"  class="form-control">
		    <option value="">Seleccione...</option>
		    <?php
		         $objTipoCurso->asignar_valor("est_tip_cur","A");		    
		         $tip=$objTipoCurso->listar();		         
		         while(($tipo_curso=$objTipoCurso->extraer_dato($tip))>0)
		         {
		         	echo "<option value='$tipo_curso[cod_tip_cur]'>$tipo_curso[nom_tip_cur]</option>";
		         }
		    ?>
		    </select>
		</div>
	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Instructor:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_instructor" id="fky_instructor"  class="form-control">
		    <option value="">Seleccione...</option>
		    <?php
		         $objInstructor->asignar_valor("est_ins","A");		    
		         $ins=$objInstructor->listar();		         
		         while(($instructor=$objInstructor->extraer_dato($ins))>0)
		         {
		         	echo "<option value='$instructor[cod_ins]'>$instructor[nom_ins] $instructor[ape_ins]</option>";
		         }
		    ?>
		    </select>
		</div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Inicio del Curso:</label>
		</div>
		<div class="col-md-8 col-12">
		    
			<div class="row align-items-center">
			   <div class="col-md-5">		    
			  		 <input type="date" name="ini_cur" id="ini_cur"  class="form-control"> 
			   </div>
			   <div class="col-md-1 ml-0 mr-0 pl-0 pr-0">	
			   	<span>hasta</span>	    
			   </div>
			   <div class="col-md-5">		    
		   			 <input type="date" name="fin_cur" id="fin_cur"  class="form-control">
			   </div>				
			</div>


			

		</div>

	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Modalidad:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_modalidad" id="fky_modalidad"  class="form-control">
		    <option value="">Seleccione...</option>
		    <?php
		         $objModalidad->asignar_valor("est_mod","A");		    
		         $mod=$objModalidad->listar();		         
		         while(($modalidad=$objModalidad->extraer_dato($mod))>0)
		         {
		         	echo "<option value='$modalidad[cod_mod]'>$modalidad[nom_mod]</option>";
		         }
		    ?>
		    </select>
		</div>
	  </div>

	  <div class="row mt-1 bg-light">
	     <div class="col-md-3 col-12 align-self-center  text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-8 col-12">
		<select name="est_cur" id="est_cur" class="form-control">
		    <option value="">Seleccione...</option>
			<option value="A">Activo, en Inscripciones Abiertas</option>
			<option value="I">Inactivo o Cancelado</option>	
			<option value="C">Por empezar, pero ya se encuentra lleno (NO HAY CUPOS).</option>	
		</select>
		</div>
	   </div>

	   <div class="row mt-2 bg-light">
	  		 <div class="col-12  text-center">
		    	 <input type="submit" class="btn btn-primary btn-lg" value="Filtrar Curso">
			</div>
	   </div>	

	    </div>
	   </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="filtrar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>