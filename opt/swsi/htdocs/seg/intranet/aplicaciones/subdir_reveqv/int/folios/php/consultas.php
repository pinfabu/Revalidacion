<?php

//Variables de conexion
include_once "../conexion/conexion.php";
include_once "./auxFunction.php";

//iniciamos sesion
if(!isset($_SESSION)) session_start();

//Creamos la conexion a la db
$cnx=conecta();

//validamos la conexion
if(!$cnx){
	echo "<p>No se pudo realizar la conexion a la base de datos<p>";
	return;
}

//obtenemos la cedena de consulta la funcion se encuentra en auxFunction.php
$sql = cadWhere();

//Guardamos la cadena de consulta
$_SESSION["query"]=$sql;

//realializamos la consulta a la db
$res=mysql_query($sql,$cnx);
mysql_close($cnx);
if(mysql_errno()){
	echo '<p>No se pudieron consultar los datos en la base de datos</p>';
	return;
}

//Imprimimos la tabla
printTable($res);

?>