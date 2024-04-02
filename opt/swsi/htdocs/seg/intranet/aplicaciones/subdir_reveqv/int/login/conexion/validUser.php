<?php
include_once "conexion.php";
include_once "xmlResponse.php";



//inicamos sesión
if(!isset($_SESSION)) session_start();

//Condición no conexión
if(!isset($_SESSION["t_parcial"])){
 	exit();
}

//condición no conexión
if((!isset($_POST["user"]))&&(!isset($_POST["pass"]))){
	exit();
}


$user=$_POST["user"];
$pass=$_POST["pass"];


//Creamos la conexión
$conec = conecta();

//validamos la coneción
if(!$conec){	
	printXMLResponse("C001","<![CDATA[Error en la conexión a la base de datos]]>","");
	exit();
}

//Guardamos la ip del usuario
$ip=$_SERVER['REMOTE_ADDR'];

//Creamos la cadena a insertar de mysql
//$sqlQuery = 'select usrname, password, user_conec, ip_user from cat_usuarios where user_activo = 1 and usrname = "'.$user.'"';
$sqlQuery = 'select usrname, password, user_conec, ip_user, user_activo from cat_usuarios where usrname = "'.$user.'"';
$res=mysql_query($sqlQuery,$conec); 
mysql_close($conec);
if(mysql_errno()){
	printXMLResponse("C001","no se pudieron insertar los datos","");
	exit();
}

if(!mysql_num_rows($res)){
	printXMLResponse("D001","Usuario o password incorrectos","");
	exit();
}


//Recoremos los registro de la consulta buscando al usuario
while($row = mysql_fetch_array($res)){


	//verificamos si esta activado el usuario
	//Generamos el pasword
	if($row["user_activo"]==0){
		printXMLResponse("D001","Usuario deshabilitado","");
		exit();
	}

	$auxPass=md5($row['password'].md5($_SESSION["t_parcial"] .getenv("REMOTE_ADDR")));
	//Verificamos la cuenta del usuario
	if(($row['usrname']==$user)&&($auxPass==$pass)){
		//Verificamos que no exista una conexion
		printXMLSucess();
	}
	else printXMLResponse("D001","Usuario o password incorrectos","");
	
	exit();
}

printXMLResponse("D001","Usuario o password incorrectos","");

?>
