<?php
require("../../../backend/clase/opcion.class.php");
require("../../../backend/clase/modulo.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/usuario.class.php");
require("../../../backend/clase/rol.class.php");


$obj=new permiso;
$objOpcion=new opcion;
$objModulo=new modulo;
$objUsuario=new usuario;


$permiso=$obj->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$obj->extraer_dato($permiso);



if($acceso["est_per"]=="A")
{
	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

$inf_usu=$objUsuario->filtrar($log_usu="", $nom_usu="", $ape_usu="", $obj->dat_usu);
$usuario=$objUsuario->extraer_dato($inf_usu);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="latin-1">
	<title>Lista Permisos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>

<div class="alert alert-danger mt-3">
	<strong>Aviso</strong> Estas cambiando los permisos del usuario, por lo tanto no ser&aacute;n seg&uacute;n el rol sino ser&aacute;n permisos personalizados.
</div>

<form action="../../../backend/controlador/permiso.php" method="POST">

	<div class="container-fluid">

	<div class="row justify-content-center">
	<div class="col-10 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de los Permisos</h3>
	 	 </div>
	  </div>

	  <div class="row text-left bg-light">
	  	<div class="col-md-2">Login:</div>
	  	<div class="col-md-6"><?php echo $usuario["log_usu"]; ?></div>
	  </div>

	  <div class="row text-left">
	  	<div class="col-md-2">Nombres:</div>
	  	<div class="col-md-6"><?php echo $usuario["nom_usu"]; ?></div>
	  </div>

	  <div class="row text-left bg-light">
	  	<div class="col-md-2">Apellidos:</div>
	  	<div class="col-md-6"><?php echo $usuario["ape_usu"]; ?></div>
	  </div>

	  <div class="row text-left">
	  	<div class="col-md-2">Email:</div>
	  	<div class="col-md-6"><?php echo $usuario["ema_usu"]; ?></div>
	  </div>

	  <div class="row text-left align-items-center">
	  	<div class="col-md-2">Rol:</div>
	  	<div class="col-md-6">
	  	Personalizado
	  	</div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

							<div class="col-md-2 col-12  border border-white">
		     <span>Cod. M&oacute;dulo</span>
							</div>

							<div class="col-md-6 col-12 border border-white ">
		   		  				<span>Nombre del M&oacute;dulo</span>
							</div>

							<div class="col-md-2 col-12 border border-white ">
		   		  				<span>Personalizar Permiso</span>
							</div>

							<div class="col-md-2 col-12 border border-white ">
		   		  				<span>Todos Permisos</span>
							</div>
	

  	    </div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
							<?php	
							$num_fil=0;
							$resultado=$objModulo->filtrar("","","");
							while(($datos=$objModulo->extraer_dato($resultado))>0){
							$num_fil++;	
							?>
			

							<div class="col-md-2 col-12 border border-white">
							     <span><?php echo $datos['cod_mod']; ?></span>
							</div>

							<div class="col-md-6 col-12 border border-white text-left">							     
							  <?php
							     echo $datos['nom_mod'];
							     echo "<div class='collapse' id='bloque$num_fil'>
									<div class='card card-body'>
										<div class='card-text'>";
                                      $opc=$objOpcion->filtrar($cod_opc="",$nom_opc="",$est_opc="",$fky_modulo=$datos['cod_mod']);
									  while(($opcion=$objOpcion->extraer_dato($opc))>0){

									  
									$per=$obj->filtrar($cod_per="",$usuario['cod_usu'],$opcion['cod_opc'],$est_per="");
									$permiso=$obj->extraer_dato($per);

								    $sel_che=($permiso['est_per']=="A")? "checked":"";
                                       
                                       echo "<p>
                                              <input type='checkbox' name='fky_opcion$opcion[cod_opc]' id='fky_opcion$opcion[cod_opc]' $sel_che >
             									 $opcion[nom_opc]
                                             </p>";
									  }
											
								echo "</div>
									</div>
								</div>";
							  ?>							     
							</div>

							<div class="col-md-2 col-12 border border-white">
							   <?php echo "<a href='#bloque$num_fil' aria-expanded='false' aria-controls='bloque1' data-toggle='collapse'>Abrir</a>"; ?>

							</div>

							<div class="col-md-2 col-12 border border-white">
							    <?php echo "Proximamente"; ?>
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
							<div class="row">
							  <div class="col-md-6">
								<input type="submit" class="btn btn-primary" value="Guardar Permisos">
							  </div>	
							</div>
							
			</div> <!-- Fin Row -->

	     </div> <!-- Fin Col 10 -->

	  </div> <!-- Fin Row 10 -->

	 </div> <!-- Fin Container -->

    <input type="hidden" name="fky_usuario" id="fky_usuario" value="<?php echo $usuario["cod_usu"] ?>">	
    <input type="hidden" name="accion" id="accion" value="agregar">	  	  
    <input type="hidden" name="fky_rol" id="fky_rol" value="1">	  
</form>
	<script src="../../bootstrap-4.0/js/jquery-3.2.1.min.js"></script>
	<script src="../../bootstrap-4.0/js/popper-1.12.6.min.js"></script>
	<script src="../../bootstrap-4.0/js/bootstrap.min.js"></script>	
  
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
	
}

?>