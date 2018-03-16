<?php
require("../../../backend/clase/area.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/empresa.class.php");
require("../../../backend/clase/tipo_curso.class.php");


$obj=new tipo_curso;
$objArea=new area;
$objEmpresa=new empresa;
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
	<title>Agregar Tipo de Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/tipo_curso.php" method="POST" enctype="multipart/form-data">

<div class="container">
  <div class="row  justify-content-center">
	<div class="col-8 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Tipo de Curso</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Nombre:</label>
			</div>
			<div class="col-md-6 col-12">	   
		  		  <input type="text" name="nom_tip_cur" id="nom_tip_cur" required="required" maxlength="50" class="form-control" 
		  		  placeholder="Nombre del Curso">
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">N&uacute;mero de Horas:</label>
			</div>
			<div class="col-md-3 col-12">	   
		  		  <input type="text" name="hor_tip_cur" id="hor_tip_cur" required="required" maxlength="3" class="form-control" placeholder="Horas Académicas">
			</div>
	  </div>	  

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Certificado:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  		  <input type="text" name="cer_tip_cur" id="cer_tip_cur" required="required" maxlength="50" class="form-control" placeholder="Nombre que aparecer&aacute; en el certificado.">
			</div>
	  </div>	


	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">¿De qué se trata este curso?:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  		  <textarea name="des_tip_cur" id="des_tip_cur" cols="30" rows="5" required="required" class="form-control"></textarea>
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Objetivo del Curso:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  		 <textarea name="obj_tip_cur" id="obj_tip_cur" class="form-control" required></textarea>
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">N° M&iacute;nimo de Cupos:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="min_tip_cur" id="min_tip_cur" required="required" maxlength="2" class="form-control" placeholder="N° M&iacute;nimo de Cupos">
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">N° M&aacute;ximo de Cupos:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="max_tip_cur" id="max_tip_cur" required="required" maxlength="2" class="form-control" placeholder="N° M&aacute;ximo de Cupos">
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Certificado:</label>
			</div>
			<div class="col-md-6 col-12">	   
		  		 <select name="ava_tip_cur" id="ava_tip_cur" class='form-control' required>
		  		 	<option value="X">Seleccione...</option>
		  		 	<option value="A">Avalado por el Ministerio de Educaci&oacute;n</option>
		  		 	<option value="N">No Avalado por el Ministerio de Educaci&oacute;n</option>
		  		 </select>
			</div>
	  </div>	  

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Url del Material:</label>
			</div>
			<div class="col-md-7 col-12">	
   
		  	<input type="file" name="url_tip_cur" id="url_tip_cur" class='form-control'> 

		  	<span class="text-muted">Formatos V&aacute;lidos .jpg, .png, .pdf .zip</span>		  
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">&Aacute;rea:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  		<?php
		  			$objArea->asignar_valor("est_are","A");
		  			$are=$objArea->listar();
		  			echo "<select name='fky_area' id='fky_area' required class='form-control'>";
		  			echo "<option value='X'>Seleccione...</option>";
		  			while(($area=$objArea->extraer_dato($are))>0)
		  			{
		  			echo "<option value='$area[cod_are]'>$area[nom_are]</option>";
		  			}
		  			echo "</select>";
		  		?>  
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Empresa:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  		<?php
		  			$objEmpresa->asignar_valor("est_emp","A");
		  			$emp=$objEmpresa->listar();
		  			echo "<select name='fky_empresa' id='fky_empresa' required class='form-control'>";
		  			echo "<option value='X'>Seleccione...</option>";
		  			while(($empresa=$objEmpresa->extraer_dato($emp))>0)
		  			{
		  			echo "<option value='$empresa[cod_emp]'>$empresa[nom_emp]</option>";
		  			}
		  			echo "</select>";
		  		?>  
		  		  
			</div>
	  </div>	  

	  <div class="row mt-2 bg-light align-items-center">
	    	 <div class="col-md-3 col-12 text-left">
		    	 <label for="">Estatus:</label>
			</div>
	    	<div class="col-md-4 col-12">
				<select name="est_tip_cur" id="est_tip_cur" class="form-control">
					<option value="A" selected="">Activo</option>
					<option value="I">Inactivo</option>	
				</select>
			</div>
	   </div>


	   <div class="row mt-2 bg-light">
	  		 <div class="col-12  text-center">
		    	 <input type="submit" class="btn btn-primary btn-lg" value="Guardar Tipo de Curso">
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