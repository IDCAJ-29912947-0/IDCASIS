<?php
/*
cod_ing int              (Código del Pago, Auto incremental)
reg_ing datetime         (Fecha de Registro del Pago)
fec_ing datetime         (Fecha del pago en el banco vía transferencia, depósito, débito, crédito o efectivo)
ref_ing varchar-20       (Número de Referencia del Depósito Bancario, Transferencia Bancaria, Punto de Venta, Recibo Manual de Pago(Efectivo)).
lot_ing varchar-10       (Representa al número de lote del punto de venta si el pago fué realizado con punto de venta).
mon_ing float                   (Monto Total Pagado)
fky_curso curso(cod_cur)        (Curso que esta pagando el alumno)
fky_alumno alumno(ide_alu)      (Alumno que esta pagando)
fky_banco_origen banco(cod_ban) (Banco del Cliente(Opcional))
fky_banco_destino banco(cod_ban)(Banco de Ingeniería Digital a donde pagaron o transfieron (Opcional))
fky_tipo_pago tipo_pago(cod_tip_pag)
        Tipos de Pago: 
        1 - Efectivo 
        2 - Depósto Bancario 
        3 - Transferencia desde el mismo banco 
        4- Transferencia desde otro banco 
        5 - Efectivo 
        6 - Convenio Publicitario 
        7 - Tarjeta de Crédito 
        8 - Tarjeta de Débito
fky_inscripcion inscripcion(cod_ins) (Apunta a la inscripción hecha por el alumno)
fky_tipo_movimiento tipo_movimiento(cod_tip_mov )
        Los tipos de Movimientos para controlar los ingresos y egresos del sistema. 
        1) Ingreso por curso 
        2) Egreso por Nómina 
        3) Egreso por Pago a Instructores 
        4) Egreso por Impuestos 
        5) Egreso por Material de Limpieza 
        6) Egreso por reposicion de equipos 
        7) Egreso por Reembolso 
        8) Egreso por Servicios Básicos
url_ing text URL del documento PDF donde se encuentra la imagen del pago
obs_ing varchar-255 (Observación del Pago)
est_ing char
        Estatus: 
        V: Pago Validado 
        N: Pago No validado
*/
//== Campos de la BD: cod_ing,reg_ing,fec_ing,ref_ing,lot_ing,sub_ing,iva_ing,mon_ing,fky_curso,fky_alumno,fky_banco_origen,fky_banco_destino,fky_tipo_pago,fky_inscripcion,fky_tipo_movimiento,url_ing,obs_ing,est_ing 

    

require_once("utilidad.class.php");

class ingreso extends utilidad
{

  public $cod_ing;
  public $reg_ing;
  public $fec_ing;
  public $ref_ing;
  public $lot_ing;
  public $mon_ing;
  public $fky_curso;
  public $fky_alumno;
  public $fky_banco_origen;
  public $fky_banco_destino;
  public $fky_tipo_pago;
  public $fky_inscripcion;
  public $fky_tipo_movimiento;
  public $url_ing;
  public $obs_ing;
  public $est_ing;  
	
//==============================================================================
   public function agregar(){

    	$sql="insert into ingreso
            (reg_ing,
             fec_ing,
             ref_ing,
             lot_ing,
             mon_ing,
             fky_curso,
             fky_alumno,
             fky_banco_origen,
             fky_banco_destino,
             fky_tipo_pago,
             fky_inscripcion,
             fky_tipo_movimiento,
             url_ing,
             obs_ing,
             est_ing)
             values
             ('$this->reg_ing',
              '$this->fec_ing',
              '$this->ref_ing',
              '$this->lot_ing',
               $this->mon_ing,
               $this->fky_curso,
               $this->fky_alumno,
               $this->fky_banco_origen,
               $this->fky_banco_destino,
               $this->fky_tipo_pago,
               $this->fky_inscripcion,
               $this->fky_tipo_movimiento,
              '$this->url_ing',
              '$this->obs_ing',
              '$this->est_ing');";

              echo $sql;

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   	  	$sql="update ingreso 
              set  
                  reg_ing='$this->reg_ing',
                  fec_ing='$this->fec_ing',
                  ref_ing='$this->ref_ing',
                  lot_ing='$this->lot_ing',
                  mon_ing=$this->mon_ing,
                  fky_curso='$this->fky_curso,
                  fky_alumno='$this->fky_alumno,
                  fky_banco_origen='$this->fky_banco_origen,
                  fky_banco_destino='$this->fky_banco_destino,
                  fky_tipo_pago='$this->fky_tipo_pago,
                  fky_inscripcion='$this->fky_inscripcion,
                  fky_tipo_movimiento='$this->fky_tipo_movimiento,
                  url_ing='$this->url_ing',
                  obs_ing='$this->obs_ing',
                  est_ing='$this->est_ing'
            where 
                  cod_ing=$this->cod_ing;";

   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from ingreso where est_ing='$this->est_ing';";
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

   public function filtrar($cod_ing,$fec_ing,$fky_curso,$fky_alumno,$fky_banco_origen,$fky_banco_destino,$fky_tipo_pago,$fky_inscripcion,$fky_tipo_movimiento,$est_ing,$rango1,$rango2){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_ing!="") ? " and cod_ing=$cod_ing":"";
        $filtro2 = ($fec_ing!="") ? " and fec_ing='$fec_ing'":"";
        $filtro3 = ($fky_curso!="") ? " and fky_curso='$fky_curso'":"";
        $filtro4 = ($fky_alumno!="") ? " and fky_alumno='$fky_alumno'":"";
        $filtro5 = ($fky_banco_origen!="") ? " and fky_banco_origen='$fky_banco_origen'":"";
        $filtro6 = ($fky_banco_destino!="") ? " and fky_banco_destino='$fky_banco_destino'":"";
        $filtro7 = ($fky_tipo_pago!="") ? " and fky_tipo_pago='$fky_tipo_pago'":"";
        $filtro8 = ($fky_inscripcion!="") ? " and fky_inscripcion='$fky_inscripcion'":""; 
        $filtro9 = ($fky_tipo_movimiento!="") ? " and fky_tipo_movimiento='$fky_tipo_movimiento'":""; 
        $filtro10 = ($est_ing!="") ? " and est_ing='$est_ing'":""; 
        $filtro11 = ($rango1!="" && $rango2!="") ? " and (fec_ing>='$fec_ing' and fec_ing<='$fec_ing')":""; 

   		  $sql="select i.*,c.ini_cur,c.fin_cur,tc.nom_tip_cur,a.cod_alu, a.ide_alu, a.nom_alu, a.ape_alu,tp.nom_tip_pag
              from 
                    ingreso i, curso c, tipo_curso tc,alumno a,tipo_pago tp 
              where i.fky_curso=c.cod_cur and
                    c.fky_tipo_curso=tc.cod_tip_cur and
                    i.fky_alumno=a.cod_alu and
                    i.fky_tipo_pago=tp.nom_tip_pag
                    $filtro1 
                    $filtro2 
                    $filtro3 
                    $filtro4 
                    $filtro5 
                    $filtro6 
                    $filtro7 
                    $filtro8 
                    $filtro9 
                    $filtro10
                    $filtro11;";

   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>