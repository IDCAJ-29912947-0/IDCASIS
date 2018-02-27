<?php
require("../../../backend/clase/curso.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/turno.class.php");
require("../../../backend/clase/horario.class.php");
require("../../../backend/clase/tipo_curso.class.php");
require("../../../backend/clase/instructor.class.php");
require("../../../backend/clase/modalidad.class.php");
require("../../../backend/clase/iva.class.php");


$obj=new curso;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
$objTurno=new turno;
$objHorario=new horario;
$objModalidad=new modalidad;
$objTipoCurso=new tipo_curso;
$objInstructor=new instructor;
$objIva=new iva;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/curso.js"></script>
</head>
<body>

<form action="../../../backend/controlador/curso.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Curso</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Curso:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_tipo_curso" id="fky_tipo_curso" required class="form-control">
		    <option value="X">Seleccione...</option>
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
		    <select name="fky_instructor" id="fky_instructor" required class="form-control">
		    <option value="X">Seleccione...</option>
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
		     <label for="">Horario:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_horario" id="fky_horario" required class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		         $objHorario->asignar_valor("est_hor","A");		    
		         $hor=$objHorario->listar();		         
		         while(($horario=$objHorario->extraer_dato($hor))>0)
		         {
		         	echo "<option value='$horario[cod_hor]'>$horario[nom_hor]</option>";
		         }
		    ?>
		    </select>
		</div>
	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Turno 1:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fk1_turno" id="fk1_turno" required class="form-control">
		    <option value="NULL">Seleccione...</option>
		    <?php
		         $objTurno->asignar_valor("est_tur","A");		    
		         $tur=$objTurno->listar();		         
		         while(($turno=$objTurno->extraer_dato($tur))>0)
		         {
		         	echo "<option value='$turno[cod_tur]'>$turno[nom_tur] ($turno[ini_tur] a $turno[fin_tur])</option>";
		         }
		    ?>
		    </select>
		</div>
	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Turno 2:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fk2_turno" id="fk2_turno" class="form-control">
		    <option value="NULL">Seleccione...</option>
		    <?php
		         $objTurno->asignar_valor("est_tur","A");		    
		         $tur=$objTurno->listar();		         
		         while(($turno=$objTurno->extraer_dato($tur))>0)
		         {
		         	echo "<option value='$turno[cod_tur]'>$turno[nom_tur] ($turno[ini_tur] a $turno[fin_tur])</option>";
		         }
		    ?>
		    </select>
		</div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Fecha Inicio:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="date" name="ini_cur" id="ini_cur" required="required" class="form-control" placeholder="Fecha de Inicio">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Fecha Finalizaci&oacute;n:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="date" name="fin_cur" id="fin_cur" required="required" class="form-control" placeholder="Fecha de Finalizaci&oacute;n">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Precio D&oacute;lares:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="dol_cur" id="dol_cur" required="required" class="form-control" placeholder="Precio en D&oacute;lares">
		</div>

	  </div>	  

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">IVA(%):</label>
		</div>
		<div class="col-md-3 col-12">
		  <fieldset disabled>
		    <select name="fky_iva" id="fky_iva" required class="form-control">
		    <?php
		         $objIva->asignar_valor("est_iva","A");		    
		         $iva=$objIva->listar();		         
		         while(($impuesto=$objIva->extraer_dato($iva))>0)
		         {
		         	echo "<option value='$impuesto[val_iva]'>$impuesto[val_iva]%</option>";
		         }
		    ?>
		    </select>
		  </fieldset>  
		</div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Precio Total Bs.:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="text" name="pre_cur" id="pre_cur" required="required" class="form-control" placeholder="Precio Total en Bs." onkeyup="return desglozar_precio();">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Base Imp. Bs.:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="text" name="bas_cur" id="bas_cur" required="required" class="form-control" placeholder="Base Imponible en Bs." readonly>
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">IVA Bs.:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="text" name="iva_cur" id="iva_cur" required="required" class="form-control" placeholder="IVA en Bs." readonly>
		</div>

 		</div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Pago al Instructor(%).:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="number" name="pag_cur" id="pag_cur" required="required" class="form-control"  min="0" max="100" value="30">
		</div>

	  </div>


	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Modalidad:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_modalidad" id="fky_modalidad" required class="form-control">
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
			<option value="A" selected="">Activo, en Inscripciones Abiertas</option>
			<option value="I">Inactivo o Cancelado</option>	
			<option value="C">Por empezar, pero ya se encuentra lleno (NO HAY CUPOS).</option>	
		</select>
		</div>
	   </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Observaciones.:</label>
		</div>
		<div class="col-md-8 col-12">
		    <textarea name="obs_cur" id="obs_cur" class="form-control"></textarea>
		</div>

	  </div>

	  <div class="row mt-1 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Curso">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="agregar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>