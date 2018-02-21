<?php
//==============================================================================
//===   utilidad: en este archivo se guardarán las funciones genéricas de todo el sistema.                         
//==============================================================================

class utilidad
{
    private $servidor="localhost";
    private $usuario="root";
    private $clave="";
    private $base_datos="sistema";
    public  $mysqli;
    public  $sql;
    private $tab_aud;
    private $fky_usuario;
    private $acc_aud;


//=== Función que se ejecuta automáticamente cuando se instancia a utilidad o un hijo de utilidad    
    public function __construct()
    {
    	$this->conectar();
    }// Fin de __construct()


//=== conectar: función para conectar a la base de datos.
   public function conectar(){

   		$this->mysqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base_datos);

   } // Fin de conectar()


//=== desconectar: Función para desconectar de la base de datos.
   public function desconectar(){
   		$this->mysqli->close();
   } //Fin de la función desconectar()



//=== asignar_valor: función genérica que sirve para asignar el valor en un atributo cualquiera.
   public function asignar_valor($atributo,$valor){

   		$this->$atributo=$valor;
   } // Fin de Asignar Valor


//=== obtener_valor: función genérica que sirve para obtener el valor en un atributo cualquiera.
   public function obtener_valor($atributo){
   		return $this->$atributo;
   } // Fin de Asignar Valor

//=== ejecutar: función para ejecutar una acción en la base de datos.
	public function ejecutar($sql){
		$this->sql=$sql; 
		return $this->mysqli->query($sql);
	}// Fin de la función ejecutar()  

//== extraer_dato: función para extraer los registros de cualquier query	 
	public function extraer_dato($pun_bds){
		//return mysql_fetch_assoc($pun_bds);
		return $pun_bds->fetch_assoc();
	}// Fin de la función extraer_dato() 

	public function mensaje($color,$mensaje)
	{

		echo "<link  rel='stylesheet' href='../../frontend/bootstrap-4.0/css/bootstrap.min.css'>";
		echo "<div class='alert alert-$color mt-3'>
					<strong>$mensaje.</strong> <a href='javascript:window.history.back();' class='alert-link'>Volver?</a>
			  </div>";
	}

	public function ultimo_id_insertado()
	{

		return mysqli_insert_id($this->mysqli);
	} 

  public function filas_afectadas(){
    return $this->mysqli->affected_rows;
  }

	public function auditoria($prk_aud){
		$this->sql=str_replace("'","",$this->sql); 
    	$sql="insert into auditoria(tab_aud, fec_aud, acc_aud, prk_aud, fky_usuario,sql_aud)values('$this->tab_aud', '".date('Y-m-d h:i:s')."', '$this->acc_aud', '$prk_aud','$this->fky_usuario','$this->sql');";
    	return $this->ejecutar($sql);
   }//Auditoria


}//Fin de la Clase

?>