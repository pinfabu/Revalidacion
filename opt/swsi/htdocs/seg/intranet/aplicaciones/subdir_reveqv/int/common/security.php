<?php

session_start();
if(!isset($_SESSION["activo"])){
	header('Location: ../');
}

if($_SESSION["activo"]!=1){
	header('Location: ../');
}

$nombre_completo = $_SESSION["nombre_completo"];
