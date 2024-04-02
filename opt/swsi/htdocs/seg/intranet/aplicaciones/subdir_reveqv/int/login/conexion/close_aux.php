<?php

include_once "conexion.php";

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['user'])) exit();

$cxn=conecta();

if(!$cxn){
	exit();
}

$user=$_SESSION['user'];
$_SESSION['user']=-1;

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
session_unset();

//Obtenemos los datos del usuario
for($res=mysql_query("UPDATE cat_usuarios SET user_conec =0 WHERE usrname=\"$user\"",$cxn);  mysql_errno()!=0;  )
	$res=mysql_query("UPDATE cat_usuarios SET user_conec =0 WHERE usrname=\"$user\"",$cxn);

mysql_close($cxn);
exit();

?>
