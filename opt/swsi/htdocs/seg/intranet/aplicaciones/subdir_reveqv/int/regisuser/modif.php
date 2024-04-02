<?php include_once ('header.php');  include_once ('security.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Actualizar</title>
<script type="text/javascript" src="validayhabilita.js"></script>



</head>
<body>
<?php
$user = $_POST['txtUsername'];
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');

if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexión';
	exit();
}
mysql_select_db("dgireprod", $conn);

$consulta = "SELECT usrname ,idperfil ,user_activo,fecha_alta ,fecha_ult_acceso ,IdEmpleado FROM cat_usuarios
  Where usrname = '$user'";
   
$query = mysql_query($consulta, $conn);
  if (mysql_num_rows($query) == 0) {
    print ("Este usuario $user no existe en nuestra base de datos favor de verificarlo");
	 exit();
}
while ($reg = mysql_fetch_row($query)){
	
	foreach($reg as $cambia){
	
	}

}
$sql = "SELECT Nombre, Ap_Paterno, Ap_Materno, email From empleados where idEmpleado = '$cambia'";
$query = mysql_query($sql, $conn);

while($rs=mysql_fetch_object($query)){
$campo1= $rs->Nombre;
$campo2= $rs->Ap_Paterno;
$campo3= $rs->Ap_Materno;
$campo4= $rs->email;
} 

mysql_close($conn);

?>

<center>
<p align="left">&nbsp;</p>
<h2>Formulario de actualizaci&oacute;n de usuario</h2></ br>
<h3>Instrucciones: Llene los datos a continuaci&oacute;n los campos con * son requeridos</h2></ br>
<h3>Datos que se van a actualizar del usuario</h3>
<a href="modificar.php"><img border=0 src="img/icono_regresar.gif"></a>
<br></br>
<form id="formu" onsubmit="return validacion(this)" name="FormValidacion" action="alter.php" method="POST">
     
     
	<table width="200" cellspacing="1" cellpadding="1" border="2" >
    <tr>
        <td width="10%" height="40" nowrap="nowrap">Usuario
        </td>
        <td><input type ="text" name ="usr" readonly="readonly" value="<?php echo $user;?>" size="15" />

        </td>
    </tr>
<tr>
 <tr>
        <td width="10%" height="40" nowrap="nowrap">ID-Empleado
        </td>
        <td><input type ="text" name ="idempleado" readonly="readonly" value="<?php echo $cambia; ?>" size="3" />

        </td>
    </td>
<tr>
<tr>
        <td width="10%" height="40" nowrap="nowrap">*Nombre
        </td>
        <td><input type='text' name='nombre' size="20" value="<?php echo $campo1;?>" maxlength="20"/>

        </td>
    </tr>
    <tr>
        <td width="10%" height="40" nowrap="nowrap">*Apellido Paterno
        </td>
        <td><input type='text' name='appat' size="20" value="<?php echo $campo2;?>" maxlength="20"/>

        </td>
    </tr>
    <tr>
        <td width="10%" height="40" nowrap="nowrap">*Apellido Materno
        </td>
        <td><input type='text' name='apmat' size="20" value="<?php echo $campo3;?>" maxlength="20"/>

        </td>
    </tr>
<tr>
        <td width="10%" height="40" nowrap="nowrap">Correo electr&oacute;nico
        </td>
        <td><input type ="text" name ="email" value="<?php echo $campo4;?>" size="20" />

        </td>
    </tr>
    <tr><td>¿Desea cambiar los siguientes campos del usuario? si<input type="checkbox" value="false" name="nombre_checkbox" onClick="habilitarCondicion()" />
    <tr>
<td width="10%" height="40" nowrap="nowrap">password
        </td>
        <td>
<input type = "password"  id="pass[]" name ="password" maxlength="12" value ="" size = "15" disabled="true"/>
        </td>
    </tr>
	<tr>
        <td width="10%" height="40" nowrap="nowrap">confirme el password
        </td>
        <td><input type = "password"  id="pass[]" name ="password1" maxlength="12" value ="" size = "15" disabled="true"/>
        </td>
    </tr>
<tr>
        <td width="10%" height="40" nowrap="nowrap">El Perfil del usuario es de:
        <?php   
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-'); 
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexión';
	exit();
}
mysql_select_db("dgireprod", $conn); 
$sql3 = "SELECT perfiles.idperfil, descripcion
FROM cat_usuarios, perfiles
WHERE idEmpleado ='$cambia'
AND cat_usuarios.idperfil = perfiles.idperfil";

$consulta1 = mysql_query($sql3, $conn);

if ($row = mysql_fetch_array($consulta1)){ 

do { 
echo ''.$row["descripcion"].'';
} while ($row = mysql_fetch_array($consulta1)); 


}
mysql_close($conn);
?>
 </td>
<td><p>Seleccione una opci&oacute;n,<br /> 

        <select name="idperfil" id="perfil" disabled="disabled" onChange="habilitarCondicion()">
        <optgroup label="">
            <option value=""> Elige una opci&oacute;n</option>
        	<option value = "1">  Administrador(Todos los privilegios)</option> 
            <option value = "2">  Consultas</option>   
            <option value = "3">  Asistencia</option>
			</optgroup>
			</select>
			
        </td>
    </tr>
 <tr>
 
        <td width="10%" height="40" nowrap="nowrap">El usuario tiene acceso a los sig. Sistemas : <br />
               <?php   
			   
function cheSis($idsis,$iduser){
//esta consulta tiene la finalidad de mostrar que sistemas tiene un usuario  de los cinco
//ya mencionados	
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');  //conexion a mysql
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexión';
	exit();
}

mysql_select_db("dgireprod", $conn); 
$sql4 = "SELECT idEmpleado, idgrupo
FROM det_grupos_usr
WHERE idEmpleado = $iduser
AND idgrupo = $idsis";

$consulta = mysql_query($sql4, $conn);

while ($row1 = mysql_fetch_array($consulta)) {

	//echo 

if (mysql_num_rows($consulta) == 0) { //no imprime el check
   
}
else {	

}
//aqui imprime los checkbox de la consulta anterior con la paloma
echo "<input type='checkbox' checked  value='$row1[idgrupo].'" ;

}	
		
mysql_close($conn);	
	
}
function cheEstado($valor, $iduser){
//esta funcion tiene como finalidad checar el estado actvo del usaurio	
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');  //conexion a mysql
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexión';
	exit();
}

mysql_select_db("dgireprod", $conn); 
$sql = "SELECT idEmpleado, user_activo
FROM cat_usuarios
WHERE idEmpleado = $iduser AND
user_activo = $valor";
$consulta = mysql_query($sql, $conn);
while ($row = mysql_fetch_array($consulta)) {
	
	if (mysql_num_rows($consulta) == 0) { //no imprime el check
   
}
else {	

}
//aqui imprime los checkbox de la consulta anterior con la paloma
echo "<input type='radio' checked  value='$row[user_activo].'" ;

}	
		
mysql_close($conn);	
	
}

	

?>
        </td>
       <td width="10%" height="40" nowrap="nowrap"><p>Seleccione una opci&oacute;n, o varias opciones<br /> 

      
       <input type="checkbox" id="grupo1" disabled="true" name="grupo1" value="1" <?php cheSis(1, $cambia) ?> >Sistema de Control de Solicitudes
        <br />
<input type="checkbox" id="grupo2" disabled="true" name="grupo2" value="2" <?php cheSis(2, $cambia) ?>  >Sistema de Consultas de Asistencia
        <br />
<input type="checkbox" id="grupo3"  disabled="true" name="grupo3" value="3" <?php cheSis(3, $cambia)  ?>  >Sistema de Equivalencias
		<br />
<input type="checkbox" id="grupo4" disabled="true"  name="grupo4" value="4" <?php cheSis(4, $cambia) ?>  >Sistema de Registro de Folios
		<br />
        <input type="checkbox" id="grupo5" disabled="true"  name="grupo5" value="5" <?php cheSis(5, $cambia) ?>    >Sistema de Registro de Usuarios
		<br />
        </td>
        
        
        
    </tr>
    <tr>
        <td width="10%" height="40" nowrap="nowrap">Seleccione el estado
        </td>
        <td width="10%" height="40" nowrap="nowrap">
        <input type="radio" disabled="true" name="validar" value="1"  <?php cheEstado(1, $cambia) ?>>Activo
        <br>
        <input type="radio" disabled="true" name="validar" value="0"  <?php cheEstado(0, $cambia) ?>>Inactivo



        </td>
    </tr>
</table>
        <p><input type="submit" value="Actualizar" /></p>
	
</form>
<p>&nbsp;</p>


</center>
</body>
</html>
