<?php
//==============================================================================
//===   opcion: Tabla que mostrará dinamicamente las opciones o botones del sistema dependiendo del usuario.
/*
cod_opc int 				(Estas son las opciones del menú del sistema, asignamos permisos a cada una de esas opciones)
nom_opc varchar-25 			(Nombre de la opción.)
fky_modulo modulo(cod_mod)  (Módulo de seguridad al cual pertenece esta opcion.)
url_opc text 				(URL de la opción.)
est_opc char 				(Estatus de la opción)
Valores del Estatus:
A: Activo
I: Inactivo
*/
//==============================================================================
//===	Campos B.D: cod_opc, nom_opc, fky_modulo, url_opc, est_opc

require_once("utilidad.class.php");

class opcion extends utilidad
{

//==============================================================================
   public function agregar(){

         $sql="insert into opcion(
               nom_opc,
               fky_modulo,
               url_opc,
               est_opc)
               values
               ('$this->nom_opc', 
                 $this->fky_modulo, 
                '$this->url_opc', 
                '$this->est_opc');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update opcion 
               set 
               nom_opc='$this->nom_opc', 
               fky_modulo=$this->fky_modulo, 
               url_opc='$this->url_opc', 
               est_opc='$this->est_opc' 
               where cod_opc='$this->cod_opc';";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from opcion where est_opc='$this->est_opc';";
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

   public function filtrar($cod_opc,$nom_opc,$est_opc,$fky_modulo){

        $where="where 1=1";
        
        $filtro1 = ($cod_opc!="") ? "and cod_opc=$cod_opc":"";
        $filtro2 = ($nom_opc!="") ? "and nom_opc like '%$nom_opc%'":"";
        $filtro3 = ($est_opc!="") ? "and est_opc='$est_opc'":"";
        $filtro4 = ($fky_modulo!="") ? "and fky_modulo='$fky_modulo'":"";

        $sql="select o.cod_opc as cod_opc,o.nom_opc as nom_opc,o.est_opc as est_opc,m.nom_mod as nom_mod,o.url_opc as url_opc,o.fky_modulo from opcion o,modulo m $where and o.fky_modulo=m.cod_mod $filtro1 $filtro2 $filtro3  $filtro4;";


          return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase

?>