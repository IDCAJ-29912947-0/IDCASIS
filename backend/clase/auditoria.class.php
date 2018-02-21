<?php
//==============================================================================
//===   auditoria: Tabla que guardará los movimientos importantes del sistema 
/*
cod_aud int 		(Código de la Auditoría)
tab_aud varchar-35 	(Tabla Auditada)
fec_aud datetime 	(Fecha del Movimiento)
acc_aud varchar-20  (Acción: Agregar, Modificar, Eliminar, Etc)
pk varchar(15) 		(El pk de la tabla afectada)
fky_usuario usuario(log_usu) (Usuario que realizó el movimiento)
*/                       
//==============================================================================
//===	Campos B.D: cod_aud, tab_aud, fec_aud, acc_aud, sql_aud, fky_usuario

class auditoria extends utilidad
{

	protected $cod_aud;
	protected $tab_aud;
	protected $fec_aud;
	protected $acc_aud;
	protected $prk_aud;
	protected $fky_usuario;


//==============================================================================
   public function agregar($prk_aud){
    	$sql="insert into auditoria(tab_aud, fec_aud, acc_aud, prk_aud, fky_usuario)values('$this->tab_aud', '".date('Y-m-d h:i:s')."', '$this->acc_aud', '$prk_aud','$this->fky_usuario');";
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