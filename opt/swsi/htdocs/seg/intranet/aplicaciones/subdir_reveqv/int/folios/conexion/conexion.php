<?php

function conecta(){
	//Configuracion de la conexion a base de datos
	$bd_host = "localhost"; 
	$bd_usuario = "desa01"; 
	$bd_password = "d0rp3r!6D-"; 
	$bd_base = "dgireprod"; 

	if($con = mysql_connect($bd_host, $bd_usuario, $bd_password)){
		if(mysql_select_db($bd_base, $con)){
			return $con;
		}
	}
	
	return false;
}
?>
