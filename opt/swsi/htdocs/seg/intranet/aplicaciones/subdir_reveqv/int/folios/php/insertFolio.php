<?php
//inicamos sesion
if(!isset($_SESSION)) session_start();

include_once "../conexion/conexion.php";



//Verificamos si recibimos todos los datos del formularios
if((!isset($_POST["txtFecha"]))||(!isset($_POST["txtEstatus"]))||(!isset($_POST["txtDirigido"]))||(!isset($_POST["txtAsunto"]))||(!isset($_POST["txtH"]))) return;

//Obtenemos los campos
foreach($_POST as $nombre_campo => $valor){
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
   eval($asignacion);
}

//validamos que recibimos algo en las vaiables
if(($txtFecha=="")||($txtDirigido=="")||($txtAsunto=="")||($txtH=="")||($txtEstatus=="")) return;

//Creamos la conexion a la db
$cnx=conecta();

//validamos la conexion
if(!$cnx){
	$errorVar="No se pudieron insertar los los datos en la db";
	return;
}

//Obtenemos el ultimo folio
$sql= "select max(folio) as folio from reg_folios";

//realializamos la consulta a la db
$res=mysql_query($sql,$cnx);
if(mysql_errno()){
	mysql_close($cnx);
	echo '<p>No se pudieron insertar los los datos en la db</p>';
	return;
}

//Id del empleado
$idEmp=$_SESSION["IdEmp"];

//contamos el numero defolios en la db
//Si no hay folios quiere decir que debemos empesar desde el numero 1
$nRows=mysql_num_rows($res);
if($nRows==0){
	//cadena de insercion
	$sql = "INSERT INTO reg_folios (IdEmpleado, folio, status, fecha, dirigido_a, asunto, IdSolicitante) VALUES ('$idEmp', 1, '$txtFecha', '$txtEstatus', '$txtDirigido', '$txtAsunto', $txtH)";

	//Realizamos la insercion
	$res=mysql_query($sql,$cnx);
	mysql_close($cnx);
	if(mysql_errno())	echo '<p>No se pudieron insertar los los datos en la db</p>';
	$sql="";

	return;
}

//Obtenemos el folio y le incrementamos una unidad
$xRow = mysql_fetch_array($res);
$maxFolio= $xRow["folio"]+1;

//Creamos la cadena para insertar el nuevo folio
$sql = "INSERT INTO reg_folios (IdEmpleado, folio, fecha, status, dirigido_a, asunto, IdSolicitante) VALUES ('$idEmp', $maxFolio, '$txtFecha', '$txtEstatus', '$txtDirigido', '$txtAsunto', $txtH)";

//Realizamos la insercion
$res=mysql_query($sql,$cnx);
mysql_close($cnx);
if(mysql_errno())	echo '<p>No se pudieron insertar los los datos en la db</p>';

//Guardamos una consulta a todos los folios
$_SESSION["query"]='select reg.*, concat(emp.Nombre," ",emp.Ap_Paterno," ",emp.Ap_Materno) as nombre from empleados emp, reg_folios reg where reg.IdSolicitante = emp.IdEmpleado ORDER BY folio DESC';


?>
