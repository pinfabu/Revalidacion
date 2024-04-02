<?php


include_once "conexion.php";

if(!isset($_SESSION)) session_start();

//creamos la conexion
$cxn=conecta();

//validamos la conexion
if(!$cxn){
	header("Location: ../../../login/login.php");
	exit();
}

//obtenemos el login del usuario
$user=$_SESSION['user'];
$_SESSION['user']=-1;
$_SESSION = array();

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
	$res=mysql_query("UPDATE cat_usuarios SET user_conec =0 WHERE usrname=\"$user\"",$con);

mysql_close($cxn);
header("Location: ../../../login/login.php");
exit();

?>
