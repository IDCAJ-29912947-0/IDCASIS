<?php
require("../../../backend/clase/requisito.class.php");
require("../../../backend/clase/rol.class.php");
require("../../../backend/clase/permiso.class.php");


$obj=new requisito;
$objRol=new rol;
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
	<title>Agregar Usuario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/usuario.php" method="POST">

	<div class="container">

	   <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  			<h3>Datos del Usuario</h3>
	 	 </div>
	   </div>

	   <div class="row mt-2">
			<div class="col-md-2 col-12 align-self-center">
		    	 <label for="">Nombre:</label>
			</div>
		
			<div class="col-md-4 col-12">
		    	<input type="text" name="nom_usu" id="nom_usu" required="required" maxlength="50" class="form-control" placeholder="Nombre del Usuario">
			</div>
	   </div> 	   

	   <div class="row mt-2">
			<div class="col-md-2 col-12 align-self-center">
		    	 <label for="">Apellido:</label>
			</div>
		
			<div class="col-md-4 col-12">
		    	<input type="text" name="ape_usu" id="ape_usu" required="required" maxlength="50" class="form-control" placeholder="Apellido del Usuario">
			</div>
	   </div> 

	   <div class="row mt-2">
			<div class="col-md-2 col-12 align-self-center">
		    	 <label for="">Login:</label>
			</div>
		
			<div class="col-md-3 col-12">
		    	<input type="text" name="log_usu" id="log_usu" required="required" maxlength="25" class="form-control" placeholder="Login del Usuario">
			</div>
	   </div> 

	   <div class="row mt-2">
			<div class="col-md-2 col-12 align-self-center">
		    	 <label for="">Email:</label>
			</div>
		
			<div class="col-md-6 col-12">
		    	<input type="text" name="ema_usu" id="ema_usu" required="required" maxlength="80" class="form-control" placeholder="Email del Usuario">
			</div>
	   </div> 


	   <div class="row mt-2">
			<div class="col-md-2 col-12 align-self-center">
		    	 <label for="">Contraseña:</label>
			</div>
		
			<div class="col-md-4 col-12">
		    	<input type="password" name="cla_usu" id="cla_usu" required="required" maxlength="12" class="form-control" placeholder="Clave del Usuario">
			</div>
	   </div> 	

	   <div class="row mt-2">
			<div class="col-md-2 col-12 align-self-center">
		    	 <label for="">Rol:</label>
			</div>
		
			<div class="col-md-4 col-12">
			  <select name="fky_rol" id="fky_rol" class="form-control">
			  <option value="X">Seleccione...</option>
		    	<?php
		    		$objRol->asignar_valor("est_rol","A");
		    		$pun_rol=$objRol->listar();
		    		while(($rol=$objRol->extraer_dato($pun_rol))>0)
		    		{
		    			echo "<option value='$rol[cod_rol]'>$rol[nom_rol]</option>";
		    		}
		    	?>
		      </select>
			</div>
	   </div> 

	   <div class="row mt-2">
			<div class="col-md-2 col-12 align-self-center">
		    	 <label for="">Estatus:</label>
			</div>
		
			<div class="col-md-4 col-12">
			  <select name="est_usu" id="est_usu" class="form-control">
			  		<option value="X">Seleccione...</option>
			  		<option value="A">Activo</option>
			  		<option value="I">Inactivo</option>			  		
		      </select>
			</div>
	   </div> 		      

	    <div class="row mt-2 bg-light">
	  	    <div class="col-12  text-center">
		    	 <input type="submit" class="btn btn-primary btn-lg" value="Guardar Usuario">
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