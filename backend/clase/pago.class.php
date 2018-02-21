<?php
//==============================================================================
//===   pago: Pago de los alumnos a la empresa por los cursos o de la empresa a sus proveedores. 
/*
cod_pag int 							(Código del Pago, Auto incremental)
fec_pag date 							(Fecha del pago en el banco vía transferencia o depósito)
hor_pag time 							(Hora a la que se hizo el pago)
dep_pag varchar-20 						(Número de Depósito Bancario o Referencia Bancaria.)
mon_pag float 							(Monto pagado)
fky_curso curso(cod_cur) 				(Curso que esta pagando el alumno)
fky_alumno alumno(ide_alu) 				(Alumno que esta pagando)
fky_proveedor proveedor(cod_pro)
fky_banco_origen banco(cod_ban) 		(Banco del Cliente)
fky_banco_destino banco(cod_ban) 		(Banco de Ingeniería Digital a donde pagaron o transfieron)
fky_tipo_pago tipo_pago(cod_tip_pag)    
fky_inscripcion inscripcion(cod_ins)    (Apunta a la inscripción hecha por el alumno).
fky_tipo_movimiento tipo_movimiento(cod_tip_mov) (Los tipos de Movimientos para controlar los ingresos y egresos del sistema).
url_pag text.							(URL del documento PDF donde se encuentra la imagen del pago).
obs_pag varchar-255 					(Observación del Pago).
est_pag char
Estatus del Pago:
V: Validado
N: No validado
*/                        
//==============================================================================
//===	Campos B.D: cod_pag,fec_pag,hor_pag,dep_pag,mon_pag,fky_curso,fky_alumno,fky_proveedor,fky_banco_origen,fky_banco_destino,fky_tipo_pago,fky_inscripcion,fky_tipo_movimiento,url_pag,obs_pag,est_pag

class pago extends utilidad
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
