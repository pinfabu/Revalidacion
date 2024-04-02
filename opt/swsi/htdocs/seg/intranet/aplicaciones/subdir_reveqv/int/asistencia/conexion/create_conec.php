<?php

include_once "conexion.php";

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		replaceChar
//OTPUT:
//		$text	:	string
//DESC:
//		Funci�n utilizada para remplazar los acento en una cadena por su correspondiente en html
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function replaceChar($text){
	$text = nl2br($text);
	$text = str_replace("�","&aacute;",$text);
	$text = str_replace("�","&eacute;",$text);
	$text = str_replace("�","&iacute;",$text);
	$text = str_replace("�","&oacute;",$text);
	$text = str_replace("�","&oacute;",$text);
	$text = str_replace("�","&uacute;",$text);
	$text = str_replace("�","&ntilde;",$text);
	return $text; 
}

//Checamos los parametros
if(!isset($_POST["txtUsuario"])){
	header("Location: login.php");
	//echo "<p>usuario</p>";
    exit();
}

if(!isset($_POST["txtPassowrd"])){
	header("Location: login.php");
	//echo "<p>password</p>";
    exit();
}
	
//Obtenemos los datos
$user=$_POST["txtUsuario"];
$pass=$_POST["txtPassowrd"];

//cremos la conexi�n 
$cnx = conecta();

//validamos la conexion
if(!$cnx){
	echo '<p>No se pudo realizar la conexi�n a la base de datos</p>';
	exit();
}

//validamos la conexi�n
if(!$cnx){
	header("Location: ../login.php");
	exit();
}


//Obtenemos los datos del usuario
$res=mysql_query("select usrname, password, user_conec, IdEmpleado, ip_user from cat_usuarios where usrname = \"$user\"",$cnx); 
if(mysql_errno()){
	mysql_close($cnx);
	header("Location: ../login.php");
	exit();
}

//inicamos sesi�n si no existe
if(!isset($_SESSION)) session_start();

//Verificamos los datos
while($row = mysql_fetch_array($res)){
		//Checamos que los datos coincidan
		$auxPass=md5($row['password'].md5($_SESSION["t_parcial"] .getenv("REMOTE_ADDR")));
		
	    //if(($row['usrname']==$user)&&($row['password']==$pass)){
		if(($row['usrname']==$user)&&($auxPass==$pass)){
			$_SESSION["user"]=$user;
			$_SESSION["conteo"]=1;
			mysql_close($cnx);
			header("Location: ../buscar.php");
			exit();
		}
}

//Cerramos conexi�n y o redirigimos a la ventana de login
mysql_close($cnx);
header("Location: ../login.php");
exit();
?>
