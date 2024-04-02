<?php

include_once "conexion.php";


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		replaceChar
//OTPUT:
//		$text	:	string
//DESC:
//		Función utilizada para remplazar los acento en una cadena por su correspondiente en html
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function replaceChar($text){
        $text = nl2br($text);
        $text = str_replace("á","&aacute;",$text);
        $text = str_replace("Á","&Aacute;",$text);
        $text = str_replace("é","&eacute;",$text);
        $text = str_replace("É","&Eacute;",$text);
        $text = str_replace("í","&iacute;",$text);
        $text = str_replace("Í","&Iacute;",$text);
        $text = str_replace("ó","&oacute;",$text);
        $text = str_replace("Ó","&Oacute;",$text);
        $text = str_replace("ú","&uacute;",$text);

        return $text;
}


//Checamos los parametros
if(!isset($_POST["txtUsuario"])){
	header("Location: login.php");
    exit();
}


if(!isset($_POST["txtPassowrd"])){
    header("Location: login.php");
    exit();
}
	
//Obtenemos los datos
$user=$_POST["txtUsuario"];
$pass=$_POST["txtPassowrd"];


//inicamos sesiói no existe
if(!isset($_SESSION)) session_start();

//cremos la conexión 
$cnx = conecta();

//validamos la conexion
if(!$cnx) exit();

//validamos la conexión
if(!$cnx){
	header("Location: ../login.php");
	exit();
}


//Obtenemos los datos del usuario
$res=mysql_query("select usrname, password, user_conec, IdEmpleado, ip_user from cat_usuarios where user_activo = 1 and usrname = \"$user\"",$cnx); 
if(mysql_errno()){
	mysql_close($cnx);
	header("Location: ../login.php");
	exit();
}

//inicamos sesión si no existe
if(!isset($_SESSION)) session_start();

//Obtenemos la ip del usuario
$ip= $_SERVER['REMOTE_ADDR'];

//Verificamos los datos
while($row = mysql_fetch_array($res)){
		//Checamos que los datos coincidan
		$auxPass=md5($row['password'].md5($_SESSION["t_parcial"] .getenv("REMOTE_ADDR")));
		
		if(($row['usrname']==$user)&&($auxPass==$pass)){

            //Checamos que no este conectado un usuario
		//	if(($row['user_conec']==0)||($row['ip_user']==$ip)){

				//Obtenemos la ip y fecha para actualizar los datos del usuario
				$date=getdate();
				$fecha = $date["year"]."-".$date["mon"]."-".$date["mday"];
				
				//Actualizamos los datos del usuario
				$nres=mysql_query("UPDATE cat_usuarios SET fecha_ult_acceso=\"$fecha\", ip_user=\"$ip\" WHERE usrname=\"$user\"",$cnx); 

				//Obtenemos el nombre del usuario
				$nres=mysql_query("select Nombre, Ap_Paterno, Ap_Materno from empleados where IdEmpleado=".$row['IdEmpleado'],$cnx); 
				if(!mysql_errno()){
					while($xrow = mysql_fetch_array($nres)){
						//$_SESSION['msg']="Bienvenido ".replaceChar($xrow['Nombre']." ".$xrow['Ap_Paterno']." ".$xrow['Ap_Materno']);
						$_SESSION['msg']="Bienvenido ".utf8_decode($xrow['Nombre']." ".$xrow['Ap_Paterno']." ".$xrow['Ap_Materno']);
					}
				//}
							
				mysql_close($cnx);

				$_SESSION['user']=$user;
				$_SESSION["IdEmp"]=$row['IdEmpleado'];
				if(($row['IdEmpleado']==7)||($row['IdEmpleado']==10)||($row['IdEmpleado']==11)||($row['IdEmpleado']==12)||($row['IdEmpleado']==30)){
					$_SESSION["grupo"]=5;
				}



				$_SESSION["update"]=0;
				if(($row['IdEmpleado']==7)||($row['IdEmpleado']==10)||($row['IdEmpleado']==11)||($row['IdEmpleado']==12)||($row['IdEmpleado']==30)){
					$_SESSION["update"]=1;
				}

				header("Location: ../menu.php");
				exit();
			}
			else{
				mysql_close($cnx);
				header("Location: ../login.php");
				exit();
			}

		}
}

//Cerramos conexión y o redirigimos a la ventana de login
mysql_close($cnx);
header("Location: ../login.php");
exit();
?>
