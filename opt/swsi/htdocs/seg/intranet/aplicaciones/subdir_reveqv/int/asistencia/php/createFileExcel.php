<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////					Código utilizado para crear un archivo en excel con la consulta de asistencia realizada
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Incluimos las funciones de conesión
include_once "../conexion/conexion.php";

//inicamos sesion
if(!isset($_SESSION)) session_start();

//Si no existe la variable user, quiere decir que el usuario no se logueado
//lo redireccionamos para que se logue
if(!isset($_SESSION["user"])){
	header("Location: login.php");
	exit();
}

if(!isset($_SESSION["query"])){
	header("Location: buscar.php");
 	exit();
}

//obtenemos la cadena de consulta echa
$query=$_SESSION["query"];

//creamos los estilos para las tablas
$shtml = "<style type=\"text/css\">";
$shtml = "<!--";
$shtml = ".xl24";
$shtml = "	{mso-style-parent:style0;";
$shtml = "	font-weight:700;";
$shtml = "	text-align:center;";
$shtml = "	vertical-align:middle;";
$shtml = "	white-space:normal;}";
$shtml = ".xl25";
$shtml = "	{mso-style-parent:style0;";
$shtml = "	font-weight:700;";
$shtml = "	text-align:center;";
$shtml = "	vertical-align:middle;";
$shtml = "	border:.5pt solid windowtext;";
$shtml = "	white-space:normal;}";
$shtml = ".xl26";
$shtml = "	{mso-style-parent:style0;";
$shtml = "	mso-number-format:\"Short Date\";";
$shtml = "	border:.5pt solid windowtext;";
$shtml = "	white-space:normal;}";
$shtml = ".xl27";
$shtml = "	{mso-style-parent:style0;";
$shtml = "	border:.5pt solid windowtext;";
$shtml = "	white-space:normal;}";
$shtml = ".xl28";
$shtml = "	{mso-style-parent:style0;";
$shtml = "	mso-number-format:\"hh\:mm\:ss\";";
$shtml = "	border:.5pt solid windowtext;";
$shtml = "	white-space:normal;}";
$shtml = "-->";
$shtml = "</style>";


//Cabezera de las tablas
$shtml .= "<table border=\"1\">"; 


$shtml .= "<tr>"; 
$shtml .= "<th align=\"center\"></th>";
$shtml .= "<th colspan=\"3\" class=xl24 align=\"center\">REGISTRO DE ASISTENCIA</th>";
$shtml .= "<th align=\"center\" colspan=\"2\"></th>";
$shtml .= "</tr>";

$shtml .= "<tr>"; 
$shtml .= "<th align=\"center\"></th>";
$shtml .= "<th colspan=\"3\" class=xl24 align=\"center\">PERSONAL ADMINISTRATIVO DE CONFIANZA</th>";
$shtml .= "<th align=\"center\" colspan=\"2\"></th>";
$shtml .= "</tr>";


$shtml .= "<tr>"; 
$shtml .= "<th align=\"center\"></th>";
$shtml .= "<th colspan=\"3\" class=xl24 align=\"center\">SUBDIRECCIÓN DE CERTIFICACIÓN</th>";
$shtml .= "<th align=\"center\" colspan=\"2\"></th>";
$shtml .= "</tr>";


$shtml .= "<tr>"; 
$shtml .= "<th align=\"center\"></th>";
$shtml .= "<th colspan=\"3\" class=xl24 align=\"center\">AÑO 2010</th>";
$shtml .= "<th align=\"center\" colspan=\"2\"></th>";
$shtml .= "</tr>";

$shtml .= "<tr>"; 
$shtml .= "<th colspan=\"6\"></th>";
$shtml .= "</tr>";

$shtml .= "<tr>"; 
$shtml .= "<th colspan=\"6\"></th>";
$shtml .= "</tr>";


$shtml .= "<tr>"; 
$shtml .= "<th class=xl25 align=\"center\">FECHA</th>";
$shtml .= "<th class=xl25 align=\"center\">Nombre</th>";
$shtml .= "<th class=xl25 align=\"center\">AREA DE ADSCRIPCION</th>";
$shtml .= "<th class=xl25 align=\"center\">HORA DE ENTRADA</th>";
$shtml .= "<th class=xl25 align=\"center\" colspan=\"2\">FIRMA</th>";
$shtml .= "</tr>";



	//Realizamos la consulta
	$cnx=conecta();
	
	if(!$cnx) exit();
	
	//Realizamos la solicitud
	$res=mysql_query($query,$cnx); 
	mysql_close($cnx);
	if(mysql_errno()){
		exit();
	}

	//Recorremos los dregistros para mostrarlos en la tabla
	while($row = mysql_fetch_array($res)){
		$shtml .= "<tr>";
		$shtml .= "<td class=xl26>".$row["Fecha"]."</td>";
		$shtml .= "<td class=xl27>".ucfirst(strtolower(utf8_decode($row["Nombre"])))." ".ucfirst(strtolower(utf8_decode($row["Paterno"])))." ".ucfirst(strtolower(utf8_decode($row["Materno"])))."</td>";
		$shtml .= "<td class=xl27>".ucfirst(strtolower(htmlentities($row["Depto"])))."</td>";
		$shtml .= "<td class='xl28' align='center'>".$row["Hora_Entrada"]."</td>"; 
		$shtml .= "<td class=xl28 colspan=\"2\"></td>"; 
		$shtml .= "</tr>";
	}
	
$shtml .= "</table>";

//Terminamos el archivo y se lo enviamos al usuario
$nombre = 'consultas.xls'; // Nombre del archivo
$contenido = 'Texto del archivo'; // Contenido del archivo
header( "Content-Type: application/octet-stream");
header( "Content-Disposition: attachment; filename=".$nombre."");
print($shtml);

?>
