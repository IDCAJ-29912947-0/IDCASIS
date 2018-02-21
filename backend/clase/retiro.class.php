<?php
//==============================================================================
//===   retiro: Tabla que guarda los retiros del curso
/*
cod_ret int 					(Código del Retiro)
fec_ret date 					(Fecha del Retiro)
hor_ret time 					(Hora del Retiro)
fky_pago pago(cod_pag)			(Pago asociado al retiro, es el pago que debemos registrar para comprobar que si pagamos el reembolso)
mot_ret varchar-50				(Motivo del Retiro:)
								(Dato abierto donde el alumno explica el motivo del retiro)
mon_ret float 					(Monto del Retiro.)
ide_ret varchar-15 				(Identificación del titular de la cuenta que se va a reembolsar.)
tit_ret varchar-50 				(Nombre del titular al cual se le va a reembolsar el dinero.)
cue_ret varchar-20 				(Número de cuenta bancaria a retirar.)
fky_banco banco(cod_ban) 		(Banco de la persona a quien se le pagará el retiro)
fpa_ret date 					(Fecha de Pago cuando se hizo el retiro.)
obs_ret							(Observaciones del retiro, allí colocaremos por qué no se debe pagar el retiro)
est_ret char 					(Estatus del retiro).
Estatus del Retiro:
P: Pendiente por reembolsar
R: Reembolsado Correctamente.
N: No se debe reeembolsar

*/                        
//==============================================================================
//===	Campos B.D: cod_ret, fec_ret, hor_ret, fky_pago, mot_ret, mon_ret, ide_ret, tit_ret, cue_ret, fky_banco, fpa_ret, obs_ret, est_ret

class retiro extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into ______()values();";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update _______ set where _______;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from _________ where ;";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from ______ where ;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar(){

   		$sql="select * from __________ where ;";
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase

?>