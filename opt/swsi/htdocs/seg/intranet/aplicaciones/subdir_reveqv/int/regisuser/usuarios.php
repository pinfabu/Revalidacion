<?php include_once ('header.php'); include_once ('security.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consulta de usuarios.</title>



</head>
<body>

<H1>Aqui se muestran todos los usuarios registrados</H1></ br>
<a href="consulta.php"><img border=0 src="img/icono_regresar.gif"></a><br />
<a href="excelusuarios.php"><img border=0 src="img/icono_excel.gif"></a>(windows)<br  />
<a href="excelusuarioslin.php"><img border=0 src="img/icono_excel.gif"></a>(linux)
<?php
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexion';
	exit();
}
mysql_select_db("dgireprod", $conn);
$consulta = "SELECT nombre, Ap_Paterno, Ap_Materno, usrname, email, idperfil, fecha_alta, fecha_ult_acceso, ip_user, user_conec, cat_usuarios.IdEmpleado
FROM cat_usuarios, empleados
WHERE cat_usuarios.IdEmpleado = empleados.IdEmpleado
GROUP BY cat_usuarios.IdEmpleado";
$query = mysql_query($consulta, $conn);
$result = mysql_query($consulta);

echo "<table border='1'>
<tr>
<th>nombre</th>
<th>Ap_Paterno</th>
<th>Ap_Materno</th>
<th>usrname</th>
<th>E-mail</th>
<th>idperfil</th>
<th>Fecha_Alta</th>
<th>fecha_ult_acceso,</th>
<th>Dirección IP</th>
<th>Conectado</th>
<th>Id_Empleado</th>
</tr>";

while($row = mysql_fetch_array($result))
 {
  echo "<tr>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['Ap_Paterno'] . "</td>";
  echo "<td>" . $row['Ap_Materno'] . "</td>";
  echo "<td>" . $row['usrname'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['idperfil'] . "</td>";
  echo "<td>" . $row['fecha_alta'] . "</td>";
  echo "<td>" . $row['fecha_ult_acceso'] . "</td>";
  echo "<td>" . $row['ip_user'] . "</td>";
  echo "<td>" . $row['user_conec'] . "</td>";
  echo "<td>" . $row['IdEmpleado'] . "</td>";
  echo  "</tr>";
}

echo "</table>";




mysql_close($conn);
?>
</body>
</html>

