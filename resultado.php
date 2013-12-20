<?php 
/**
* Relacionar docente con asignatura
* @autor : Juan E. Huamani Mendoza
* @web : http://www.escodigo.com
*/

	// Conexion a la base de datos
	require("_included/database.php"); // incluir configuracion.
	$db = new DataBase();
	$dbConexion = $db->conectar();

	/**
	* Optener todos las relaciones Docentes-Cursos
	*/
	$query = mysql_query("SELECT * FROM dai_valoracion JOIN dai_docente ON dai_docente.did=dai_valoracion.docente JOIN dai_curso ON dai_curso.cid=dai_valoracion.curso ORDER BY cantidad_positivos DESC") or die(mysql_error());
	$db->terminar();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Resultados de las Votaciones</title>
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1 align="center">Resultados</h1>
<div id="tabla-resultados">
	<div class="item head">
		<div class="docente"><b>Docente</b></div>
		<div class="curso"><b>Curso</b></div>
		<div class="positivo"><b>SI</b></div>
		<div class="negativos"><b>NO</b></div>
	</div>
<?php 
	$flag = 1;
	while ($resultado = mysql_fetch_array($query)) {
		print '
	<div class="item item-'.($flag%2).'">
		<div class="docente">'.$resultado['dname'].'</div>
		<div class="curso">'.$resultado['cname'].'</div>
		<div class="positivo">'.$resultado['cantidad_positivos'].'</div>
		<div class="negativos">'.$resultado['cantidad_negativos'].'</div>
	</div>';
	$flag =($flag%2) + 1;
	}
?>
</div>
<div id="main-menu">
    <ul>
        <li><a href="index.html" title="Volver a Inicio">Inicio</a></li>
        <li><a href="acerca-del-sistema.html" title="Infomacion del Sistema">Acerca de</a></li>
        <li><a href="http://www.github.com/juaneracleo" title="Descargar C&oacute;digo en HitHub">HitHub</a></li>
        <li><a href="resultado.php" class="resultados">Resultados</a></li>
    </ul>
</div>

<div class="info">
    <p><b>Docentes </b> Departamento acad&eacute;mico de Ingenieria Informatica </p>
    <br />
    <p><b>Universidad Nacional San Antonio Abad del Cusco</b></p><br /><br />
    <p align="center">Versi&oacute;n 1.0</p>
    <p> <b>@autor :</b> Juan E. Huamani Mendoza</p>
    <p><b>@web :</b> <a href="http://www.escodigo.com">Escodigo.com</a></p>
</div>
</body>
</html>