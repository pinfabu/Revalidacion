<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////							Creamos el archivo en excel
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include_once "../conexion/conexion.php";
include_once "auxFunction.php";

if(!isset($_SESSION)) session_start();


if(!isset($_SESSION["query"])){
exit();
}


//estilos para las celdas
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
$shtml = "	white-space:normal;";
$shtml = "	background: \"#CCC\";}";
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
//$shtml .= "<th align=\"center\"></th>";
$shtml .= "<th colspan=\"4\" class=xl24 align=\"center\">Universidad Nacional Autónoma de México</th>";
$shtml .= "<th align=\"center\"></th>";
$shtml .= "</tr>";

$shtml .= "<tr>"; 
$shtml .= "<th align=\"center\"></th>";
//$shtml .= "<th align=\"center\"></th>";
$shtml .= "<th colspan=\"4\" class=xl24 align=\"center\">Dirección General de Incorporación y Revalidación de Estudios</th>";
$shtml .= "<th align=\"center\"></th>";
$shtml .= "</tr>";


$shtml .= "<tr>"; 
$shtml .= "<th align=\"center\"></th>";
//$shtml .= "<th align=\"center\"></th>";
$shtml .= "<th colspan=\"4\" class=xl24 align=\"center\">Subdirección de Revalidación y Apoyo Académico</th>";
$shtml .= "<th align=\"center\"></th>";
$shtml .= "</tr>";


$shtml .= "<tr>"; 
$shtml .= "<th colspan=\"6\"></th>";
$shtml .= "</tr>";

$shtml .= "<tr>"; 
$shtml .= "<th colspan=\"6\"></th>";
$shtml .= "</tr>";


	
$shtml .= "<tr>"; 
$shtml .= "<th class=xl25 align=\"center\">FOLIO</th>";
$shtml .= "<th class=xl25 align=\"center\">FECHA</th>";
$shtml .= "<th class=xl25 align=\"center\">DIRIGIDO A</th>";
$shtml .= "<th class=xl25 align=\"center\">ASUNTO</th>";
$shtml .= "<th class=xl25 align=\"center\">NOMBRE</th>";
$shtml .= "<th class=xl25 align=\"center\">ESTATUS</th>";
$shtml .= "</tr>";


$query=$_SESSION["query"];

	//Realizamos la consulta
	$cnx=conecta();
	
	if(!$cnx) exit();
	
	//Realizamos la solicitud
	$res=mysql_query($query,$cnx); 
	mysql_close($cnx);
	if(mysql_errno()){
		exit();
	}

	
	while($row = mysql_fetch_array($res)){
		$shtml .= "<tr>";
		$shtml .= "<td class=xl26 align=\"center\">".$row["folio"]."</td>";
		$shtml .= "<td class=xl27 align=\"center\">".$row["fecha"]."</td>";
		$shtml .= "<td class=xl28 align=\"center\">".utf8_decode($row["dirigido_a"])."</td>"; 
		$shtml .= "<td class=xl28 align=\"center\">".utf8_decode($row["asunto"])."</td>"; 
		$shtml .= "<td class=xl28 align=\"center\">".utf8_decode($row["nombre"])."</td>"; 
		$shtml .= "<td class=xl27 align=\"center\">".utf8_decode($row["status"])."</td>";
		$shtml .= "</tr>";
	}
	
$shtml .= "</table>";

$nombre = 'consultas.xls'; // Nombre del archivo
$contenido = 'Texto del archivo'; // Contenido del archivo
header( "Content-Type: application/octet-stream");
header( "Content-Disposition: attachment; filename=".$nombre."");
print($shtml);

?>
