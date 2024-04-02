<?php

	include_once "../conexion/conexion.php";

	//Si no existe la sesión la inicializamoss
	if(!isset($_SESSION)) session_start();

	//Esta línea se debe a que se utilizo como servidor de prueba wamp
	//y se tiene que ajustar la fecha con la siguente linea
	date_default_timezone_set('America/Mexico_City');
	
	//Creamos la conexión a la db
	$cnx = conecta();

	//Validamos la conexión
	if(!$cnx){
		echo '<p>Error en la conexion a la base de datos</p>';
		return;
	}
	
	//Validamos que recibimos los campos de consulta
	if(isset($_POST["txtNom"])) $txtNom=strtoupper($_POST["txtNom"]);
	else $txtNom="";
	if(isset($_POST["txtApPat"])) $txtApPat=strtoupper($_POST["txtApPat"]);
	else $txtApPat="";
	if(isset($_POST["txtApMat"])) $txtApMat=strtoupper($_POST["txtApMat"]);
	else $txtApMat="";
	if(isset($_POST["txtIni"])) $txtIni=strtoupper($_POST["txtIni"]);
	else $txtIni="";
	if(isset($_POST["txtFin"]))$txtFin=strtoupper($_POST["txtFin"]);
	else $txtFin="";

	$sqlvalue = "";

	//Creamos la cadena de condición de la busqueda
	if($txtNom!=""){
		$sqlvalue = " Nombre LIKE \"%$txtNom%\" ";
	}
	if($txtApPat!=""){
		if($sqlvalue == "")	$sqlvalue = " Paterno LIKE \"%$txtApPat%\" ";
		else $sqlvalue .= "and Paterno LIKE\"%$txtApPat%\" ";
	}
	if($txtApMat!=""){
		if($sqlvalue == "")	$sqlvalue = " Materno LIKE \"%$txtApMat%\" ";
		else $sqlvalue .= "and Materno LIKE \"%$txtApMat%\" ";
	}
	if(($txtIni!="")&&($txtFin!="")){
		if($sqlvalue == "")	$sqlvalue = " Fecha >= \"$txtIni\" and Fecha <= \"$txtFin\" ";
		else $sqlvalue .= "and Fecha >= \"$txtIni\" and Fecha <= \"$txtFin\" ";
	}
	
	//Vrificamos que existan datos a consultar
	if($sqlvalue==""){
		mysql_close($cnx);
		echo "<p>No hay datos que cumplan la condici&oacute;n</p>";
		return;
	}
	
	//Creamos la cadena de consulta
	$sql = 'select * from vw_asistencia where ' . $sqlvalue;

	//Guardamos la consulta
	$_SESSION["query"]=$sql;
	
	//REalizamos la consulta
	$res=mysql_query($sql,$cnx); 
	mysql_close($cnx);
	if(mysql_errno()){
		echo '<p>Error en la conexion de a la base de datos</p>';
		return;
	}
	
	//Contamos los registros, si no existen datos salimos
	$resRows=mysql_num_rows($res);
	if($resRows==0){
		echo "<p>No hay datos que cumplan la condici&oacute;n</p>";
		return;
	}

	//Creamos la tabla donde se mostraran los datos
	echo "<table class='results'>";
		echo "<thead>";
		echo "<tr>";
			echo "<th>";
				echo "FECHA";
			echo "</th>";
			echo "<th>";
				echo "NOMBRE";
			echo "</th>";
			echo "<th>";
				echo "AREA DE ADSCRIPCI&Oacute;N";
			echo "</th>";
			echo "<th>";
				echo "HORA ENTRADA";
			echo "</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		
	//Recoremos los registros para mostrar los en el navegador
	$cont=1;
	while($row = mysql_fetch_array($res)){
		if(($cont%2)==0) echo "<tr class=\"even\">";
		else echo "<tr class=\"odd\">";
		$cont++;
			echo "<td>";
				echo $row["Fecha"];
			echo "</td>";
			echo "<td>";
				echo ucfirst(strtolower(utf8_decode($row["Nombre"])))." ".ucfirst(strtolower(utf8_decode($row["Paterno"])))." ".ucfirst(strtolower(utf8_decode($row["Materno"])));
			echo "</td>";
			echo "<td>";
				echo ucfirst(strtolower(htmlentities($row["Depto"])));
			echo "</td>";
			echo "<td align='center'>";
				echo $row["Hora_Entrada"];
			echo "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
?>
