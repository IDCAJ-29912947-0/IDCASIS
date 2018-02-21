<?php
//==============================================================================
//===   permiso: Esta tabla guardará los permisos individuales de cada usuario.
/*
cod_per int 						(Código del Permiso)
fky_opcion opcion(cod_opc) 			(Opción de Sistema)
fky_usuario usuario(log_usu) 		(Usuario que tiene permiso a utilizar esa opción)
tok_per		varchar(32)				(Llave de seguridad para acceso al sistema.)
est_per char 						(El permiso se encuentra activo o no.)
Valores de los Estatus:
A: Activo
I: Inactivo
*/

//==============================================================================
//===	Campos B.D: cod_per, fky_opcion, fky_usuario, est_per

require_once("utilidad.class.php");


class permiso extends utilidad
{


//==============================================================================
   public function agregar($cod_usu){

    	$sql="insert into permiso(
      fky_opcion, 
      fky_usuario, 
      est_per
      )values(
       $this->fky_opcion, 
       $cod_usu, 
      '$this->est_per'
      );";
      
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

   public function eliminar($cod_usu){
   		$sql="delete from permiso where fky_usuario='$cod_usu';";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_per,$fky_usuario,$fky_opcion,$est_per){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_per!="") ? "and cod_per=$cod_per":"";
        $filtro2 = ($fky_usuario!="") ? "and fky_usuario=$fky_usuario":"";
        $filtro3 = ($fky_opcion!="") ? "and fky_opcion=$fky_opcion":"";
        $filtro4 = ($est_per!="") ? "and est_per='$est_per'":"";

        $sql="select * from permiso $where $filtro1 $filtro2 $filtro3 $filtro4;";

       return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================
  public function validar_acceso($opcion,$fky_usuario,$token){
  		
      $sql="select est_per 
            from permiso p, usuario u 
            where 
            p.fky_usuario=u.cod_usu and 
            p.fky_opcion=$opcion and 
            p.fky_usuario=$fky_usuario and 
            u.tok_per='$token'";
  		
  		return $this->ejecutar($sql);

  }

}//Fin de la Clase

?>