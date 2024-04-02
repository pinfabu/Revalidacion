<?php
include_once "conexion.php";

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
//echo "no se conecto";
echo '<p>Error en la conexion a la base de datos</p>';
exit();
}

//Guardamos la ip del usuario
$ip=$_SERVER['REMOTE_ADDR'];

//Creamos la cadena a insertar de mysql
$sqlQuery = 'select usrname, password, user_conec, ip_user from cat_usuarios where usrname = "'.$user.'" and idperfil=1';
$res=mysql_query($sqlQuery,$conec); 
if(mysql_errno()){
	echo '<p>no se pudieron insertar los datos</p>';
	exit();
}


$cad = "";

	//Recoremos los registro de la consulta buscando al usuario
	while($row = mysql_fetch_array($res)){
	//Generamos el pasword
	$auxPass=md5($row['password'].md5($_SESSION["t_parcial"] .getenv("REMOTE_ADDR")));
		///comparamos usuario y passwors
		//si existe el usauir y concuerda su pasword regresamos un input oculto en el que su valor representa lo siguiente
		//value=0 existe el usuario y sus datos concuierda
		//value=1 los datos del usuario no concuerdan
		//Esto lo hago de esta manera porque un no se manejar xml para la transferencia de información
		//en futuras versiones se pretende corregir este error
		if(($row['usrname']==$user)&&($auxPass==$pass)){
				$cad="<input name=\"dato\" type=\"hidden\" id=\"dato\" value=\"0\"/>";
		}
		else{
			$cad="<input name=\"dato\" type=\"hidden\" id=\"dato\" value=\"3\"/>";
		}
	}
	
	//validamos si encontramos al usuario
	if($cad==""){
		$cad="<input name=\"dato\" type=\"hidden\" id=\"dato\" value=\"1\"/>";
	}
	
	
echo $cad;	
mysql_close($conec);

?>
