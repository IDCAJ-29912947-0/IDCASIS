<?php
//==============================================================================
//===   usuario: Usuario del Sistema
/*
log_usu varchar-25 								(Login del Usuario)
nom_usu varchar-50 								(Nombre)
ape_usu varchar-50 								(Apellido)
ema_usu varchar-80 								(Correo)
cla_usu varchar-32 								(Clave encriptada)
fky_rol rol(cod_rol) 							(Rol)
est_usu char 									(Estatus del Usuario).
												Valores del Estatus:
												A: Activo
												I: Inactivo
*/                      
//==============================================================================
//===	Campos B.D: log_usu, nom_usu, ape_usu, ema_usu, cla_usu, fky_rol, est_usu						
require_once("utilidad.class.php");

class usuario extends utilidad
{
  public $cod_usu; 
  public $log_usu;
  public $nom_usu;
  public $ape_usu;
  public $ema_usu;
  public $cla_usu;
  public $fky_rol;
  public $est_usu;

//==============================================================================
   public function agregar(){

    	$sql="insert into usuario
            (log_usu, 
             nom_usu, 
             ape_usu, 
             ema_usu, 
             cla_usu, 
             fky_rol, 
             est_usu)
            values(
            '$this->log_usu',
            '$this->nom_usu', 
            '$this->ape_usu',  
            '$this->ema_usu',
            '".md5($this->cla_usu)."',
            '$this->fky_rol', 
            '$this->est_usu');";

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){

   		$sql="update usuario set
            log_usu='$this->log_usu', 
            nom_usu='$this->nom_usu', 
            ape_usu='$this->ape_usu', 
            ema_usu='$this->ema_usu', 
            fky_rol='$this->fky_rol', 
            est_usu='$this->est_usu'
            where 
            cod_usu='$this->cod_usu';";

   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from usuario where est_usu='$this->est_usu';";
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

   public function filtrar($log_usu, $nom_usu, $ape_usu, $ema_usu){

        $where="where fky_rol=cod_rol";
        
        $filtro1 = ($log_usu!="") ? "and log_usu='$log_usu'":"";
        $filtro2 = ($nom_usu!="") ? "and nom_usu like '%$nom_usu%'":"";
        $filtro3 = ($ape_usu!="") ? "and ape_usu like '%$ape_usu%'":"";
        $filtro4 = ($ema_usu!="") ? "and ema_usu='$ema_usu'":"";

        $sql="select u.*,r.nom_rol from usuario u,rol r $where $filtro1 $filtro2 $filtro3 $filtro4;";
   
        return $this->ejecutar($sql); 

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase

?>