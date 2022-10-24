<?php
/*
	CRUD con MySQL y PHP
	@author parzibyte
	@date 2018-02-12

$contraseña = "pro870app0";
$usuario = "root";
$nombre_base_de_datos = "Gestion";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}*/

class Conexion {

	private $contraseña = '$sql3'; //+3X1t05cr
	private $usuario = 'sa';
	private $nombreBaseDeDatos = 'Gestion';
	//Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
	private $rutaServidor = '192.168.3.216'; //127.0.0.1,14033
	private $conect;

		public function __construct() {
			$connectionString = "sqlsrv:server=".$this->rutaServidor. ";database=".$this->nombreBaseDeDatos;
			try {
		$this->conect = new PDO($connectionString,$this->usuario, $this->contraseña);
		$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
	    	} catch (Exception $e) {
		$this->conect = 'Error de conexión';
		echo $e->getMessage();
	    	}

		}
	
		public function connect()
		 {
		return $this->conect;
		}
}

?>	