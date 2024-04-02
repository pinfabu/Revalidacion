<?php

session_start();

require_once "./login/conexion/conexion.php";

//jjajajaja
function propuesta($ptl,$pass,&$cxn){
	
	//cadena de validacion
	$query = "select vig from plantelesw_pass where ptl = '".$ptl."' and pass = '".$pass."'";
	
	//consultamos
	$res=mysql_query($query,$cxn); 
	
	$num = mysql_num_rows($res);
	
	if($num<=0){
		echo "<p>Plantel no existe acceso denegado</p>";
		exit();
	}
	
	//validamos la consulta
	if(mysql_errno()){
		echo "<p>Error en la conexion con el servidor</p>";
		mysql_close($cxn);
		exit();
	}
	
	//mysql_close($cxn);
	$vig="N";
	
	//Buscamos el dato
	while($row = mysql_fetch_array($res)) $vig = $row['vig'];
	
	if($vig=="N"){
		echo "<p>Tu cuenta no se encuentra vigente</p>";	
		exit();
	}
	
	//obtenemos el nombre del plantel
	$query = "select ptl_nombre from planteles where ptl_ptl = '".$ptl."'";
	
	$res=mysql_query($query,$cxn); 
	
	$num = mysql_num_rows($res);
	
	if($num<=0){
		echo "<p>Plantel no existe acceso denegado</p>";
		exit();
	}
	
	//validamos la consulta
	if(mysql_errno()){
		echo "<p>Error en la conexion con el servidor</p>";
		mysql_close($cxn);
		exit();
	}
	$nombre = " ";
	
	//Buscamos el dato
	while($row = mysql_fetch_array($res)) $nombre = $row['ptl_nombre'];
	
	if($nombre==" "){
		echo "<p>Error en la conexion con el servidor</p>";
		exit();
	}
	
	$_SESSION["ptl"] = $ptl;
	$_SESSION["ptl_nombre"] = $nombre;
	
	$_SESSION["flag"] = "permitir";
	
	return true;
}




foreach($_POST as $name => $val){
echo "<p>".$name.": ".$val. "</p>";

}


if((isset($_POST["pass"]))&&(isset($_POST["login"]))){
        
		$pass= $_POST["pass"];
		$clave= $_POST["login"];

		
		$cxn = conecta2();

		if(!$cxn){
        		echo "<p>Error en la conexion con el servidor</p>";
			exit();
		}


		$flag =  propuesta($clave,$pass,$cxn);

		if($flag){
			header("Location: ./cert/propuesta/propuesta.php");
			exit();
		}
		else{
			echo "<p>Acceso restringido</p>";
			exit();
		}

}
else include "xindex.html";

?>
