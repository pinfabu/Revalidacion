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
	
	//Creamos la cadena de consulta
	$sql = 'select * from vw_asistencia where Fecha = "'.date("Y-m-d").'"';

	//Guardamos la consulta
	$_SESSION["query"]=$sql;
	
	//Realizamos la consulta
	$res=mysql_query($sql,$cnx); 
	mysql_close($cnx);
	if(mysql_errno()){
		echo '<p>Error en la conexion de a la base de datos</p>';
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
				echo ucfirst(strtolower(utf8_decode($row["Nombre"])))." ".ucfirst(strtolower(htmlentities($row["Paterno"])))." ".ucfirst(strtolower(htmlentities($row["Materno"])));
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
