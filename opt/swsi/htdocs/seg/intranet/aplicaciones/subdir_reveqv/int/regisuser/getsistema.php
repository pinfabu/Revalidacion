
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php

$q=$_REQUEST["q"];
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexión';
	exit();
}
mysql_select_db("dgireprod", $conn);
$sql = "Select nombre, Ap_Paterno, Ap_Materno, usrname, email, empleados.IdEmpleado\n"
    . "FROM det_grupos_usr, empleados, cat_usuarios\n"
    . " Where idgrupo = '$q' AND det_grupos_usr.idEmpleado = empleados.idEmpleado AND \n"
    . "empleados.idEmpleado = cat_usuarios.idEmpleado";
$query = mysql_query($sql, $conn);
$result = mysql_query($sql);



echo "<table border='1'>
<tr>
<th>Nombre</th>
<th>Ape_Paterno</th>
<th>Ap_Materno</th>
<th>usuario</th>
<th>Correo Electrónico</th>
<th>Id_empleado</th>
</tr>";

while($row = mysql_fetch_array($result))
 {
  echo "<tr>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['Ap_Paterno'] . "</td>";
  echo "<td>" . $row['Ap_Materno'] . "</td>";
  echo "<td>" . $row['usrname'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['IdEmpleado'] . "</td>";
  echo  "</tr>";
}

echo "</table>";




mysql_close($conn);


?>
</body>
</html>