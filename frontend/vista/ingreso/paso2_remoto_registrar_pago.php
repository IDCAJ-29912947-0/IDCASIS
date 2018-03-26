<?php
require("../../../backend/clase/alumno.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/tipo_pago.class.php");
require("../../../backend/clase/banco.class.php");
require("../../../backend/clase/cuenta.class.php");
require("../../../backend/clase/inscripcion.class.php");


$obj=new alumno;
$objBanco=new banco;
$objCuenta=new cuenta;
$objPermiso=new permiso;
$objTipoPago=new tipo_pago;
$objInscripcion=new inscripcion;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($cod_alu="",$obj->ide_alu,$nom_alu="",$ape_alu="",$te1_alu="",$ema_alu="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Pago</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/factura.js"></script>
</head>
<body>

<form action="../../../backend/controlador/ingreso.php" method="POST" enctype="multipart/form-data">

	<div class="container">

	  <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	   <h5>Datos del Alumno</h5>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Cédula:</label>
		</div>
		<div class="col-md-4 col-12">
		    <?php echo $datos["ide_alu"]?>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Nombres:</label>
		</div>
		<div class="col-md-4 col-12">
		    <?php echo $datos["nom_alu"]?>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-2 col-12 align-self-center">
		     <label for="">Apellidos:</label>
		</div>
		<div class="col-md-4 col-12">
             <?php echo $datos["ape_alu"]?>
		</div>

	  </div> 

	  <div class="row bg-primary text-white mt-3">
	 	 <div class="col-12 text-center">
	  	<h5>Registrar Pago</h5>
	 	 </div>
	  </div>	  


	  <div class="row mt-3 bg-light">
	  <div class="col-md-3 col-12 align-self-center">
		     <label for="">Curso a Pagar:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_inscripcion" id="fky_inscripcion" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $objInscripcion->est_ins="P";
		   $datoInscripcion=$objInscripcion->filtrar($cod_ins="", $fec_ins="", $datos["cod_alu"], $fky_curso="",$objInscripcion->est_ins,$est_cur="A");
		   while(($inscripcion=$objInscripcion->extraer_dato($datoInscripcion))>0)
		   {
		   		echo "<option value='$inscripcion[cod_ins]'>$inscripcion[nom_tip_cur] a iniciar el 
		   		".($obj->voltear_fecha($inscripcion['ini_cur']))."</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  <div class="col-md-3 col-12 align-self-center">
		     <label for="">Forma de Pago:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_tipo_pago" id="fky_tipo_pago" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $objTipoPago->est_tip_pag="O";
		   $datoPago=$objTipoPago->listar();
		   while(($forma_pago=$objTipoPago->extraer_dato($datoPago))>0)
		   {
		   		echo "<option value='$forma_pago[cod_tip_pag]'>$forma_pago[nom_tip_pag]</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  <div class="col-md-3 col-12 align-self-center">
		     <label for="">Tu Banco:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_banco_origen" id="fky_banco_origen" class="form-control">
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
	  <div class="col-md-3 col-12 align-self-center">
		     <label for="">Nuestro Banco:</label>
		</div>
		<div class="col-md-6 col-12">
		   <select name="fky_banco_destino" id="fky_banco_destino" class="form-control">
		   <option>Seleccione...</option>
		   <?php
		   $objCuenta->est_cue="A";
		   $datoCuenta=$objCuenta->filtrar($cod_cue="",$nom_cue="",$objCuenta->est_cue);
		   while(($cuenta=$objCuenta->extraer_dato($datoCuenta))>0)
		   {
		   		echo "<option value='$cuenta[fky_banco]'>$cuenta[nom_ban] / Cuenta: $cuenta[num_cue]</option>";
		   }
		   ?>
		   </select>
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Num. Depósito/Transferencia:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="text" name="ref_ing" id="ref_ing" maxlength="10" class="form-control" placeholder="Núm. Referencia">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Fecha del Pago:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="date" name="fec_ing" id="fec_ing" class="form-control">
		</div>

	  </div>	  


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Monto:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="text" name="mon_ing" id="mon_ing" maxlength="10" class="form-control" placeholder="Monto">
		</div>

	  </div>

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">Adjuntar Comprobante:</label>
			</div>
			<div class="col-md-7 col-12">	
   
		  	<input type="file" name="url_ing" id="url_ing" class='form-control'> 

		  	<span class="text-muted">Formatos V&aacute;lidos .jpg, .png, .pdf .zip</span>		  
			</div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Observaciones:</label>
		</div>
		<div class="col-md-7 col-12">
		    <textarea name="obs_ing" id="obs_ing" cols="100" rows="2" class="form-control" placeholder="Si tienes algún comentario por favor notificar por aquí"></textarea>
		</div>

	  </div>

	  <div class="row bg-primary text-white mt-3">
	 	 <div class="col-12 text-center">
	  	   <h5>Facturación</h5>
	 	 </div>
	  </div>	  

	  <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">¿Necesitas Factura Personalizada?:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  	  <select name="nec_fac" id="nec_fac" class="form-control" onclick="preguntar_factura()">
		  	  	  	<option value="X">Seleccione...</option>
		  	  	  	<option value="S">Sí, necesito factura personalizada</option>
		  	  	  	<option value="N">No, no necesito factura personalizada</option>
		  	  	  </select>	  
			</div>
	  </div>

	  <div id="tipo_persona" class="d-none">
	     <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">¿Eres Persona Natural o Jurídica?:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  	  <select name="per_fac" id="per_fac" class="form-control" onclick="preguntar_tipo_persona()">
		  	  	  	<option value="X">Seleccione...</option>
		  	  	  	<option value="N">Persona Natural</option>
		  	  	  	<option value="J">Persona Jurídica</option>
		  	  	  </select>	  
			</div>
	    </div>
	  

	  <div id="retiene_islr" class="d-none">
	     <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">¿Retienes ISLR?:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  	  <select name="per_fac" id="per_fac" class="form-control">
		  	  	  	<option value="X">Seleccione...</option>
		  	  	  	<option value="S">Sí, retengo ISLR</option>
		  	  	  	<option value="N">No, no retengo ISLR</option>
		  	  	  </select>	  
			</div>
	    </div>
	  </div>

	  <div id="contribuyente" class="d-none">
	     <div class="row mt-2 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
		     	<label for="">¿Eres contribuyente Ordinario o Especial?:</label>
			</div>
			<div class="col-md-7 col-12">	   
		  	  <select name="per_fac" id="per_fac" class="form-control">
		  	  	  	<option value="X">Seleccione...</option>
		  	  	  	<option value="O">Soy Contribuyente Ordinario</option>
		  	  	  	<option value="E">Soy Contribuyente Especial</option>
		  	  	  </select>	  
			</div>
	    </div>
	  </div>	  


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">C&eacute;dula o RIF:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="text" name="rif_tit" id="rif_tit" maxlength="15" class="form-control" placeholder="C&eacute;dula o RIF para la Facturas">
		</div>

	  </div>



	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre / Razón Social:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="nom_tit" id="nom_tit" maxlength="80" class="form-control" placeholder="A nombre de quien deseas la factura">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Domicilio Fiscal:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="dir_tit" id="dir_tit" maxlength="100" class="form-control" placeholder="Direcci&oacute;n / Domicilio Fiscal">
		</div>

	  </div>

	</div>

	  <div class="row mt-3 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-md" value="Registrar Pago">
		</div>
	   </div>	  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="agregar_remoto">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>