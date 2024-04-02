<?php
//Agregamos el archivo que contiene los datos para conectarnos a la base de datos
include_once "../conexion/conexion.php";
include_once "auxFunction.php";

//inicamos sesion
if(!isset($_SESSION)) session_start();

//Creamos la conexion
$cnx=conecta();

//Validamos la conexion
if(!$cnx){
	echo "<p>No se pudo realizas la conexion a la base de datos</p>";
	return;
}

//Obtenemos la cedena de consulta
$sql = $_SESSION["query"];

//realializamos la consulta a la db
$res=mysql_query($sql,$cnx);
if(mysql_errno()){
	mysql_close($cnx);
	echo '<p>No se pudieron consultar los folios</p>';
	return;
}

//contamos el numero defolios en la db
//Si no hya folios no continuamos
$nRows=mysql_num_rows($res);
mysql_close($cnx);
if($nRows==0){
	echo "<p>Aun no se han registrado folios en el sistema</p>";
	return;
}

//imprimimos la tabla
printTable($res);

?>