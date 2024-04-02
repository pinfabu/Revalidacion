<?php
//inicamos sesión
if(!isset($_SESSION)) session_start();

include_once "conexion.php";

//actualizamos el estado de la conexion del usuario
//creamos la conexion
$cnx=conecta();

//validamos la conexion
if(!$cnx){
	header("Location: ../login.php");
	exit();
}

//obtenemos el login del usuario
$user=$_SESSION['user'];

//Obtenemos los datos del usuario
for($res=mysql_query("UPDATE cat_usuarios SET user_conec =0 WHERE usrname=\"$user\"",$cnx);  mysql_errno()!=0;  )
	$res=mysql_query("UPDATE cat_usuarios SET user_conec =0 WHERE usrname=\"$user\"",$cnx);

mysql_close($cnx);


//Destruimos la sesión
session_destroy (); 

//Redireccionamos a la ventana de logeo
header("Location: ../login.php");
?>
