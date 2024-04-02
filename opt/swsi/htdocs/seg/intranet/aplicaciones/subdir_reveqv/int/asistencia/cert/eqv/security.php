<?php

	//Inicializamos las sesiones
	if(!isset($_SESSION)) session_start();
	
	//Verificamos la existencia de la variable user
    if(!isset($_SESSION['user'])){
       header("Location: http://132.248.38.6/app");
       exit();
    }
	
	//Si existe user el valor debe ser >=0
	if($_SESSION['user']<0){
       header("Location: http://132.248.38.6/app");
       exit();
    }
	
?>
