<?php

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		conecta
//OTPUT:
//		$con	:	referencia a la conexi�n con la db
//		bool	:	False en el caso de que no se pudiera establecer la conexion
//DESC:
//		Funci�n para crear una conexion entre la aplicaci�n y la db, regresa una referencia a la conexion con db si se puedo establecer 
//		dicha conexi�n, de lo contrario regresa false
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function conecta(){
	//Configuraci�n de la conexi�n a base de datos
	//Debe de solicitar los datos de conexi�n al administrador de la db
	$bd_host = "localhost"; 
	$bd_usuario = "desa01"; 
	$bd_password = "d0rp3r!6D-"; 
	$bd_base = "dgireprod"; 

	//Realizamos la conexi�n
	if($con = mysql_connect($bd_host, $bd_usuario, $bd_password)){
		//seleccionamos la db
		if(mysql_select_db($bd_base, $con)){
			return $con;
		}
	}
	
	return false;
}


?>
