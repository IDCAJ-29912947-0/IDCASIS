<?php
//==============================================================================
//===   cuenta: Número de Cuenta donde el Alumno debe Depositar o Transferir el Dinero  
/*
cod_cue int 							(Código de la Cuenta Bancaria. Auto Incremental.)
num_cue varchar-20 						(Número de Cuenta Bancaria. Son 20 Dígitos, sin guiones.)
rif_cue varchar-15						(Rif de la cuenta Bancaria: Inicia con la Letra: V,J,G y luego solo números.)
nom_cue varchar-25 						(Nombre del titular de la cuenta bancaria.)
fky_banco banco(cod_ban) 				(Banco asociado a la cuenta bancaria)
tip_cue char 							(Tipo de Cuenta Bancaria.)
										A: Ahorro
										C: Corriente
fky_empresa empresa(cod_emp)			(Empresa asociada a la cuenta Bancaria: Ingeniería Digital CA, Ingeniería Web F.P.)
est_cue   char                      Estatus de la cuenta
fky_empresa                         Empresa
Valores:
A: Activo
I: Inactivo
*/                       
//==============================================================================
//===	Campos B.D:  cod_cue, num_cue, rif_cue, nom_cue, fky_banco, tip_cue, est_cue, fky_empresa

require_once("utilidad.class.php"); 

class cuenta extends utilidad
{
   public $cod_cue; 
   public $num_cue; 
   public $rif_cue; 
   public $nom_cue; 
   public $fky_banco; 
   public $fky_empresa;
   public $tip_cue; 
   public $est_cue;

//==============================================================================
   public function agregar(){

    	$sql="insert into cuenta(
            num_cue, 
            rif_cue, 
            nom_cue, 
            fky_banco,
            fky_empresa, 
            tip_cue,
            est_cue)
            values(
            '$this->num_cue', 
            '$this->rif_cue', 
            '$this->nom_cue', 
            '$this->fky_banco',
             $this->fky_empresa, 
            '$this->tip_cue',
            '$this->est_cue'      
            );";
echo $sql;
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update cuenta set 
              num_cue='$this->num_cue', 
              rif_cue='$this->rif_cue', 
              nom_cue='$this->nom_cue', 
              fky_banco=$this->fky_banco, 
              fky_empresa=$this->fky_empresa,
              tip_cue='$this->tip_cue',
              est_cue='$this->est_cue'
              where
              cod_cue=$this->cod_cue;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from cuenta where cod_cue=$this->cod_cue;";
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

   public function filtrar($cod_cue,$nom_cue,$est_cue){
        
        $filtro1 = ($cod_cue!="") ? "and cod_cue=$cod_cue":"";
        $filtro2 = ($nom_cue!="") ? "and nom_cue like '%$nom_cue%'":"";
        $filtro3 = ($est_cue!="") ? "and est_cue='$est_cue'":"";

        $sql="select c.*,b.nom_ban,e.nom_emp 
              from cuenta c,banco b,empresa e
              where 
              fky_banco=cod_ban and 
              fky_empresa=cod_emp 
              $filtro1 $filtro2 $filtro3;"; 
        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>