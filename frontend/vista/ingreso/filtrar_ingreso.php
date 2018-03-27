<?php
require("../../../backend/clase/curso.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/banco.class.php");


$obj=new curso;
$objBanco=new banco;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=8,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filtrar Ingreso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_ingreso.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Buscar Ingreso</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">
		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Curso:</label>
		</div>
		<div class="col-md-6 col-12">
		    <select name="fky_curso" id="fky_curso"  class="form-control">
		    <option value="">Seleccione...</option>
		    <?php
		         $cur=$obj->listar_general();		         
		         while(($curso=$obj->extraer_dato($cur))>0)
		         {
		         	echo "<option value='$curso[cod_cur]'>$curso[nom_tip_cur] - ".$obj->voltear_fecha($curso['ini_cur'])."</option>";
		         }
		    ?>
		    </select>
		</div>
	  </div>


	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Fecha del Pago:</label>
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

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Cédula:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="ide_alu" id="ide_alu" maxlength="15" class="form-control" placeholder="Cédula del Alumno" onkeyup="return solo_numeros();">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	  <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Banco Destino:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_banco_destino" id="fky_banco_destino" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $objBanco->est_ban="A";
		   $datoBanco=$objBanco->listar();
		   while(($banco=$objBanco->extraer_dato($datoBanco))>0)
		   {
		   		echo "<option value='$banco[cod_ban]'>$banco[nom_ban]</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>

	   <div class="row mt-2 bg-light">
	  		 <div class="col-12  text-center">
		    	 <input type="submit" class="btn btn-primary btn-lg" value="Filtrar Ingresos">
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