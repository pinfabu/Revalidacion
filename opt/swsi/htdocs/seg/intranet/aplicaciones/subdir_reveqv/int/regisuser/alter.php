<?php include_once ('header.php'); include_once ('security.php'); 
      ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Modificacion usuario</title>
</head>
<body>

<?php


//variables para actualización
$user = $_POST['usr'];

$idempleado = $_POST['idempleado'];

$nom = $_POST['nombre'];

$appat = $_POST['appat'];

$apmat = $_POST['apmat'];

$em = $_POST['email'];


//conexion
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexion';
	exit();
}
mysql_select_db("dgireprod", $conn);

// se inicia el start transaction
$inicio = "Start transaction";
mysql_query($inicio, $conn);
//primera parte del formulario que se actualiza con nombres, apellidos y correo electronico
$sql = "Update empleados\n"
    . "set Nombre= '$nom',\n"
	. "Ap_Paterno= '$appat',\n"
	. "Ap_Materno= '$apmat',\n"
    . "email = '$em'\n"
    . "where idEmpleado = '$idempleado'";



mysql_query($sql, $conn);

//si existe el password  hace un update
if (isset($_POST['password'])) 
{
	$pass = $_POST['password'];
	// si el password es distinto de espacios en blanco hace el update
	if ($pass != ""){
	$sql2 ="UPDATE cat_usuarios\n"
    . "set password = MD5('$pass')\n"
    . "where usrname = '$user' ";
	mysql_query($sql2, $conn);
	}
	
}
//si existe cambia el perfil del usuario
if (isset ($_POST['idperfil']))
{
 $perfil = $_POST['idperfil'];
 
 $sql3 = "Update cat_usuarios
    set idperfil = '$perfil'
    where usrname = '$user' ";
	mysql_query($sql3, $conn);
	
}
//si existe el estado activo del usaurio lo cambia
if (isset($_POST['validar']))
{
	$estado = $_POST['validar'];
	$sql4 = "Update cat_usuarios\n"
    . "set user_activo = '$estado'\n"
    . "where usrname = '$user' ";
	mysql_query($sql4, $conn);
	
}
//si existe por lo menos un grupo seleccionado, se cambia
if (isset ($_POST['grupo1']) || isset ($_POST['grupo2']) || isset($_POST['grupo3']) || isset ($_POST['grupo4']) || isset ($_POST['grupo5']))
{ //como en la tabla det grupos usr son llaves primarias tengo que borrar todas las referencia del empelado de esta tabla
	$sql5 = "Delete from det_grupos_usr\n"
    . "where idEmpleado = '$idempleado'";
	mysql_query($sql5, $conn);
	
}

if (isset($_POST['grupo1']))
{
  // existe!!!
  
$grupoa = $_POST['grupo1'];

$sql6= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupoa', '$idempleado')";
mysql_query($sql6, $conn);

}

if (isset($_POST['grupo2']))
{
  // existe!!!
  $grupob= $_POST['grupo2'];
$sql7= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupob', '$idempleado')";
mysql_query($sql7, $conn);

}

if (isset($_POST['grupo3']))
{
  $grupoc = $_POST['grupo3'];
  $sql8= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupoc', '$idempleado')";
mysql_query($sql8, $conn);

} 

if (isset($_POST['grupo4']))
{
  // existe!!!
  $grupod = $_POST['grupo4'];
  $sql9= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUES ('$grupod', '$idempleado')";
mysql_query($sql9, $conn);

} 


if (isset($_POST['grupo5']))
{
  // existe!!!
  $grupoe = $_POST['grupo5'];
  $sql10= "INSERt INTO det_grupos_usr (idgrupo ,IdEmpleado) 
VALUEs ('$grupoe', '$idempleado')";
mysql_query($sql10, $conn);

} 




echo "<br />";
echo "<br />";
echo "Se ha actualizado al Usuario $user correctamente";
echo "<br />";
echo "<a href='modificar.php'><img border=0 src='img/usericon.jpg'></a>Actualizar otro usuario<br />";
echo "<br />";
echo "<a href='bienvenida.php'><img border=0 src='img/home_icon.gif'></a>Menu Principal";
echo "<br />";
echo "<br />";

//finalizo la transacción 
$fintransaction = "commit";
mysql_query($fintransaction, $conn);

mysql_close($conn);
?>
</body>
</html>
