<?php
require_once("../common/config.php");
require_once("../common/clsUser.php");

$login = $_POST["txtLogin"];
$pwd = $_POST["txtPwd"];

$resp = (object)array(
	"error" => true
	,'success' => false
	,"message" => 'Usuario o password incorrectos'
);

if($login == ""){
	die(json_encode($resp));
}

if($pwd == ""){
	die(json_encode($resp));
}

$user = new clsUser();
if(!$user->connect()){
	$resp->message = "Error #001: Error en la conexión comuniquese con el administrador";
	die(json_encode($resp));
}

$dataUser = $user->validUser($login, $pwd);
if(!$dataUser){
	die(json_encode($resp));
}

$resp->error = false;
$resp->success = true;
$resp->message = 'Usuario valido';

session_start();

$idEmpleado = $dataUser->idEmpleado;

$_SESSION["activo"] = 1;
$_SESSION["nombre_completo"] = $dataUser->nombre_completo;
$_SESSION["idEmpleado"] = $dataUser->idEmpleado;

$_SESSION['user'] = $login;
$_SESSION["IdEmp"] = $idEmpleado;
$_SESSION["update"]=0;
if(($idEmpleado==7)||($idEmpleado==10)||($idEmpleado==11)||($idEmpleado==12)||($idEmpleado==30)){
	$_SESSION["grupo"]=5;
	$_SESSION["update"]=1;
}
				
die(json_encode($resp));


?>