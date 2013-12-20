<?
/**
* Conexion a la base de datos
* @autor : Juan E. Huamani Mendoza
* @web : http://www.escodigo.com
*/

// Datos conexión a la Base de datos (MySql)
$sql_host="localhost";  	// Host, nombre del servidor o IP del servidor Mysql.
$sql_usuario="root";        // Usuario de Mysql
$sql_pass="toor132";        // contraseña de Mysql

$sql_db="dai";     // Base de datos que se usará.

public function DBConexion()
{
	return mysql_connect("$sql_host", "$sql_usuario", "$sql_pass") or die("No se pudo conectar a la Base de datos") or die(mysql_error());
mysql_select_db("$sql_db") or die(mysql_error());
}

?>
