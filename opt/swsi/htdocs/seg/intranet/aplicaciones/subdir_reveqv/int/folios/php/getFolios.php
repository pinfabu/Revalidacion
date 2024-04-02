<?php
//Agregamos el archivo que contiene los datos para conectarnos a la base de datos
include_once "../conexion/conexion.php";
include_once "./auxFunction.php";

//inicamos sesion
if(!isset($_SESSION)) session_start();

//Creamos la conexion
$cnx=conecta();

//Validamos la conexion
if(!$cnx){
	echo "<p>No se pudo realizas la conexion a la base de datos</p>";
	return;
}

//Cadena para obtener todos los folios
$sql='select reg.*, concat(emp.Nombre," ",emp.Ap_Paterno," ",emp.Ap_Materno) as nombre from empleados emp, reg_folios reg where reg.IdSolicitante = emp.IdEmpleado ORDER BY folio DESC';

//Guardamos la cadena del query
$_SESSION["query"]=$sql;

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
	echo "<p align=\"center\">Aun no se han registrado folios en el sistema</p>";
	return;
}

//Imprimimos la tabla
printTable($res);

?>