<?php
//==============================================================================
//===   contenido: Cada Item representa un contenido que será visto en el curso y se imprimirá por la parte de atrás del certificado.
/*
cod_con int 						(Código del Contenido)
nom_con varchar-80					(Nombre del contenido, es individual los registros)
est_con char   						(Estatus del contenido)
Valores del estatus:
A: Activo
I: Inactivo
*/                     
//==============================================================================
//===	Campos B.D:  cod_con, nom_con, est_con

require_once("universidad.class.php");

class contenido extends utilidad
{

//==============================================================================
   public function agregar(){

    	$sql="insert into contenido
            (nom_con, 
             est_con)
            values
            ('$this->nom_con', 
             '$this->est_con');";

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update contenido 
               set 
               nom_con='$this->nom_con', 
               est_con='$this->est_con'
               where 
               cod_con='$this->cod_con';";

   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from contenido where est_con='$this->est_con';";
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

   public function filtrar($cod_con,$nom_con,$est_con){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_con!="") ? "and cod_con=$cod_con":"";
        $filtro2 = ($nom_con!="") ? "and nom_con like '%$nom_con%'":"";
        $filtro3 = ($est_con!="") ? "and est_con='$est_con'":"";

           $sql="select * from contenido $where $filtro1 $filtro2 $filtro3;";

          return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
