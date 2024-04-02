<?php
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////				Código para validar si un usuario se ha logueado
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	//path general
	$xPath = "http://localhost/int";
	
	//login
	$login= $xPath . "login";
	
	//Inicializamos las sesiones si no existe
	if(!isset($_SESSION)) session_start();
	
	//Verificamos la existencia de la variable user
    if(!isset($_SESSION['user'])){
       header($login);
       exit();
    }
	
	//Si existe user el valor debe ser >=0
	if($_SESSION['user']<0){
       header($login);
       exit();
    }
	
	?>