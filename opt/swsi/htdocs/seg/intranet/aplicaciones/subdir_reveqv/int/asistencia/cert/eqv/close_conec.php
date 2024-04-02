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

if(!isset($_SESSION)) session_start();

//creamos la conexion
$cxn=conecta();

//validamos la conexion
if(!$cxn){
	header("Location: ../../int/login/login.php");
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
header("Location: ../../login/login.php");
exit();


?>
