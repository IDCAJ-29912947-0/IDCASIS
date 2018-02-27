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

	foreach($_REQUEST as $nombre_campo => $valor){
		$obj->asignar_valor($nombre_campo,$valor);
    } 
    
	$resultado=$obj->filtrar($obj->cod_tip_cur,$nom_tip_cur="",$fky_area="",$fky_empresa="",$est_tip_cur="");
	$datos=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Tipo de Curso</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

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
		  		  placeholder="Nombre del Curso" value="<?php echo $datos['nom_tip_cur']?>" disabled>
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">N&uacute;mero de Horas:</label>
			</div>
			<div class="col-md-3 col-12">	   
		  		  <input type="text" name="hor_tip_cur" id="hor_tip_cur" required="required" maxlength="3" class="form-control" placeholder="Horas Académicas" value="<?php echo $datos['hor_tip_cur']?>" disabled>
			</div>
	  </div>	  

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Certificado:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  		  <input type="text" name="cer_tip_cur" id="cer_tip_cur" required="required" maxlength="50" class="form-control" placeholder="Nombre que aparecer&aacute; en el certificado." value="<?php echo $datos['cer_tip_cur']?>" disabled>
			</div>
	  </div>	

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Objetivo del Curso:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  		    <textarea name="obj_tip_cur" id="obj_tip_cur" disabled class="form-control" required><?php echo $datos['obj_tip_cur']?></textarea>   
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">N° M&iacute;nimo de Cupos:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="min_tip_cur" id="min_tip_cur" required="required" maxlength="2" class="form-control" placeholder="N° M&iacute;nimo de Cupos"
		  		  value="<?php echo $datos['min_tip_cur']?>" disabled>
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">N° M&aacute;ximo de Cupos:</label>
			</div>
			<div class="col-md-4 col-12">	   
		  		  <input type="text" name="max_tip_cur" id="max_tip_cur" required="required" maxlength="2" class="form-control" placeholder="N° M&aacute;ximo de Cupos"
		  		  value="<?php echo $datos['max_tip_cur']?>" disabled>
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Certificado:</label>
			</div>
			<div class="col-md-6 col-12">
				<fieldset disabled>   
		  		 <select name="ava_tip_cur" id="ava_tip_cur" class='form-control' required>
		  		 	<?php
		  		 	$selected=($datos["ava_tip_cur"]=="A")?"":"";
		  		 	echo "<option value='A' $selected>
		  		 	      Avalado por el Ministerio de Educaci&oacute;n
		  		 	      </option>";
		  		 	$selected=($datos["ava_tip_cur"]=="N")?"":"";      
		  		 	echo "<option value='N' $selected>
		  		 	      No Avalado por el Ministerio de Educaci&oacute;n
		  		 	      </option>";
		  		 	?>
		  		 </select>
		  	  </fieldset>	 
			</div>
	  </div>	  

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Url del Material:</label>
			</div>
			<div class="col-md-7 col-12">	
   
		  	<input type="file" name="url_tip_cur" id="url_tip_cur" class='form-control' value="<?php echo $datos['url_tip_cur']?>" disabled> 

		  	<span class="text-muted">Formatos V&aacute;lidos .jpg, .png, .pdf .zip</span>		  
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">&Aacute;rea:</label>
			</div>
			<div class="col-md-7 col-12">
			 <fieldset disabled>	   
		  		<?php
		  			$objArea->asignar_valor("est_are","A");
		  			$are=$objArea->listar();
		  			echo "<select name='fky_area' id='fky_area' required class='form-control'>";
		  			echo "<option value='X'>Seleccione...</option>";
		  			while(($area=$objArea->extraer_dato($are))>0)
		  			{
		  			$selected=($area['cod_are']==$datos["fky_area"])?"selected":"";	
		  			echo "<option value='$area[cod_are]' $selected>$area[nom_are]</option>";
		  			}
		  			echo "</select>";
		  		?> 
		  	 </fieldset>	 
			</div>
	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Empresa:</label>
			</div>
			<div class="col-md-7 col-12">
			  <fieldset disabled>	   
		  		<?php
		  			$objEmpresa->asignar_valor("est_emp","A");
		  			$emp=$objEmpresa->listar();
		  			echo "<select name='fky_empresa' id='fky_empresa' required class='form-control'>";
		  			echo "<option value='X'>Seleccione...</option>";
		  			while(($empresa=$objEmpresa->extraer_dato($emp))>0)
		  			{
		  			$selected=($empresa["cod_emp"]==$datos["fky_empresa"])?"selected":"";	
		  			echo "<option value='$empresa[cod_emp]' $selected>$empresa[nom_emp]</option>";
		  			}
		  			echo "</select>";
		  		?>  
		  	  </fieldset>  
			</div>
	  </div>	  

	  <div class="row mt-2 bg-light align-items-center">
	    	 <div class="col-md-3 col-12 text-left">
		    	 <label for="">Estatus:</label>
			</div>
	    	<div class="col-md-4 col-12">
	    	  <fieldset disabled>
				<select name="est_tip_cur" id="est_tip_cur" class="form-control">
					<?php
					$selected=($datos["est_tip_cur"]=="A")?"selected":"";
					echo "<option value='A' $selected>Activo</option>";
					$selected=($datos["est_tip_cur"]=="I")?"selected":"";					
					echo "<option value='I' $selected>Inactivo</option>";	
					?>
				</select>
			  </fieldset>
			</div>
	   </div>

    </div>
  </div>
</div> <!-- Fin Container -->
</>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>