<?php 
/**
* Class Data Base
* @autor : Juan E. Huamani Mendoza
* @web : http://www.escodigo.com
*/
class DataBase
{
	private $host="localhost";  	// Host, nombre del servidor o IP del servidor Mysql.
	private $usuario="";        // Usuario de Mysql
	private $password="";        // contraseña de Mysql

	private $dataBase="";     // Base de datos que se usará.
	
	//function __construct(argument){		# code...	}

	/**
	* Iniciar una Coneccion
	*/
	function conectar()
	{
		mysql_connect($this->host, $this->usuario, $this->password) or die("No se pudo conectar a la Base de datos") or die(mysql_error());
		mysql_select_db($this->dataBase) or die(mysql_error());
	}
	/**
	* Elegir una base de datos
	*/
	function selecnarDB()
	{
		mysql_select_db($this->dataBase) or die(mysql_error());	
	}
	/**
	* Terminar Conexion
	*/
	function terminar()
	{
		return mysql_close();
	}
	/**
	* Ejecutar una sentencia sql
	*/
	function sql($sql)
	{

	}
}

 ?>