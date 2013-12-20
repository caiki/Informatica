<?php
/**
* Relacionar docente con Curso
* @autor : Juan E. Huamani Mendoza
* @web : http://www.escodigo.com
*/

// Guardar los datos recibidos en variables:
if (isset($_POST['docente']) && isset($_POST['curso']) && isset($_POST['valor'])) 

{
	$docente = $_POST['docente'];
	$curso = $_POST['curso'];
	$valor = $_POST['valor'];
	
	/**
	* Validar los datos 
	* Validaciones muy Simples
	*/

	if($valorTemp == "0" || $valorTemp=="1"){$valor=$valorTemp;}


	// Conexion a la base de datos
	require("_included/database.php"); // incluir configuracion.
	$db = new DataBase();
	$dbConexion = $db->conectar();

	/**
	* Verificar si ya se realizo misma votacion
	*/
	$query = mysql_query("SELECT cantidad_positivos, cantidad_negativos FROM dai_valoracion WHERE docente = $docente && curso=$curso LIMIT 1") or die(mysql_error());
	$existe = 0;
	if(mysql_num_rows($query)>0)
	{
		$existe = 1;
		$resultado = mysql_fetch_array($query);
	}
	if($existe)
	{
		$cantidad = 1;
		/**
		* Acumular el contador
		*/
		if($valor) // Positivo 
		{
			$cantidad += $resultado['cantidad_positivos'];
			$cantidadConsulta = mysql_query("UPDATE  `dai_valoracion` SET  `cantidad_positivos` =  $cantidad WHERE  `valoracion`.`docente` =$docente && `valoracion`.`curso` =$curso ;") or die(mysql_error());
		} 
		else // Negativo
		{
			$cantidad += $resultado['cantidad_negativos'];
			$cantidadConsulta = mysql_query("UPDATE  `dai_valoracion` SET  `cantidad_negativos` =  $cantidad WHERE  `valoracion`.`docente` =$docente && `valoracion`.`curso` =$curso ;") or die(mysql_error());
		}
	} 
	else // No existe un registro
	{
		/**
		* Crear un nuevo registro
		*/
		if($valor) // Voto Positivo
		{
			$relacionarConsulta = mysql_query("INSERT INTO `dai_valoracion` (`docente`, `curso`, `cantidad_positivos`, `cantidad_negativos`) VALUES ('$docente', '$curso', '1', '0');") or die(mysql_error());
		}
		else //Voto Negativo
		{
			$relacionarConsulta = mysql_query("INSERT INTO `dai_valoracion` (`docente`, `curso`, `cantidad_positivos`, `cantidad_negativos`) VALUES ('$docente', '$curso', '0', '1');") or die(mysql_error());
		}
	}
	$db->terminar();
}
else
{
	print "<p>Datos A&ntilde;adidos <a href='#' title='Volver a Resultados'>Resultados</a></p>";
}
?>