<?php include_once ('header.php'); include_once ('security.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="validate.css" rel="stylesheet" type="text/css" />

<title>Alta de usuario</title>
</head>

<body>

<?php
//variables para insercion de datos
$nombre = $_POST['nombre'];

$appat = $_POST['ap_paterno'];

$apmat = $_POST['ap_materno'];

$email = $_POST['email'];

$login = $_POST['txtUsername'];

$idempleado = $_POST['idempleado'];

$subdireccion = $_POST['idsubdir'];

$departamento = $_POST['deptos'];

$password = $_POST['password'];

$perfil = $_POST['idperfil'];




//conexión
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	    echo 'errorde conexion';
		exit();
}
echo "<br /><hr>";

mysql_select_db("dgireprod", $conn);
//se verifica nuevamente si el usaurio no existe
$user = "Select usrname from cat_usuarios
         where usrname = '$login'";
		 
		 $userexist = mysql_query($user, $conn);
     if (mysql_num_rows($userexist) == 1){
	     echo "el usuario '$login' ya existe en la base de datos, los datos introducidos fueron ignorados.";
		 echo "<br />";
echo "<a href='registro.php'><img border=0 src='img/usericon.jpg'></a>Volver al formulario de registro<br />";
echo "<br />";
echo "<a href='bienvenida.php'><img border=0 src='img/home_icon.gif'></a>Menu Principal";
mysql_close($conn);
		 exit();
	 }
   //inicia el start transaction         
$transaction = "Start transaction";

$sql1= "INSERT INTO empleados (IdEmpleado ,Ap_Paterno ,Ap_Materno ,Nombre ,Telefono ,email ,numEmpleado ,IdDepto ,IdSubdir,IdHorario,IdPuesto)
VALUES ('$idempleado', '$appat', '$apmat', '$nombre', NULL, '$email',NULL,'$departamento',  '$subdireccion', 0,0 )";

$sql2= "INSERT INTO cat_usuarios (usrname ,idperfil ,password ,fecha_alta ,fecha_ult_acceso ,ip_user ,user_conec ,IdEmpleado)
VALUES ('$login', '$perfil', MD5('$password'), CURDATE() ,CURRENT_TIMESTAMP , NULL , 0, '$idempleado')";

$inicio = mysql_query($transaction, $conn);
$query = mysql_query($sql1, $conn);
$query2 = mysql_query($sql2, $conn);

if (isset($_POST['grupo']))
{
  // existe!!!
$grupoa = $_POST['grupo'];
$sql3= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupoa', '$idempleado')";
mysql_query($sql3, $conn);
}


if (isset($_POST['grupo2']))
{
  //si existe!!!
  $grupob= $_POST['grupo2'];
$sql4= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupob', '$idempleado')";
mysql_query($sql4, $conn);
}

if (isset($_POST['grupo3']))
{
  $grupoc = $_POST['grupo3'];
  $sql5= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupoc', '$idempleado')";
mysql_query($sql5, $conn);
} 

if (isset($_POST['grupo4']))
{
  
  $grupod = $_POST['grupo4'];
  $sql6= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupod', '$idempleado')";
mysql_query($sql6, $conn);
} 

if (isset($_POST['grupo5']))
{
 
 $grupoe = $_POST['grupo5'];
 $sql7 = "INSERT INTO det_grupos_usr (idgrupo, IdEmpleado)
 VALUES ('$grupoe', '$idempleado')";
 mysql_query($sql7, $conn);
 }
 
 $transactionend = "commit";
 mysql_query($transactionend, $conn); //finaliza el start transaction los datos se guardan ya en la base de datos
 
mysql_close($conn);
echo "<br />";
echo "<br />";
echo "Se ha Agregado al Usuario $login correctamente";
echo "<br />";
echo "<a href='registro.php'><img border=0 src='img/usericon.jpg'></a>Registrar nuevo usuario<br />";
echo "<br />";
echo "<a href='bienvenida.php'><img border=0 src='img/home_icon.gif'></a>Menu Principal";
echo "<br />";
echo "<br />";

?>
</body>
</html>
