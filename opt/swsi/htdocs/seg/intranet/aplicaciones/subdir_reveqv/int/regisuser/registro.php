<?php
require_once ('index_top.php');

require_once ('header.php'); 
require_once ('security.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type= "text/css" href = "validate.css" />
  <link rel="stylesheet" type="text/css" href="select_dependientes.css" />


<title>Registro</title>
</head>

<body onload="setFocus();">
  <script type="text/javascript" src="json2.js"></script>
  <script type="text/javascript" src="xhr.js"></script>
  <script type="text/javascript" src="validate.js"></script>
  <script type="text/javascript" src="select_dependientes.js"></script>
  <script type="text/javascript" src="validacion.js"></script>

<?php
$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	
	echo 'error en la conexion';
	exit();
}

mysql_select_db("dgireprod", $conn);
$consulta = "select max(IdEmpleado) from empleados";
$query = mysql_query($consulta, $conn);
while ($reg = mysql_fetch_row($query)){
	echo "<tr>";
	echo "<br />";
	foreach($reg as $cambia){
	
	}
}

$cambia = $cambia + 1;

mysql_close($conn);
?>

<center>
<p align="left">&nbsp;</p>
<h3>Formulario de registro de usuario</h3> <br />
<h4><p>Instrucciones: Llene los datos a continuación los campos con * son obligatorios.</p></h4><br/>
<a href="bienvenida.php"><img border=1 src="img/icono_regresar.gif"></a>
<form onsubmit="return validacion(this)" name="FormValidacion" action="alta.php"  method="POST">
<table width="200" border="1">
<tr>
<td>*Nombre: </td>         <td> <input type ="text" name ="nombre" value="" maxlength="30" size="30" /></td>
</tr>
<tr>
<td>*Apellido Paterno :</td> <td><input type ="text" name ="ap_paterno" value="" maxlength="30" size="30" /></td>
</tr>
<tr>
<td>*Apellido Materno  :</td> <td><input type ="text" name ="ap_materno" value="" maxlength="30" size= "30" /></td>
</tr>
<tr>
<td>E-mail :</td>           <td><input type ="text" name ="email" value="" maxlength="50"size="50" /></td>
</tr>
<tr>
<td>ID_Empleado</td> <td><input type ="text" name ="idempleado" readonly="readonly" value=<?php echo $cambia; ?> size="6" /></td>
</tr>

<?php
function generaSubdir()
{ // en esta parte llamo al archivo conexion.php para conectar a la base para los selects
	include 'conexion.php';
	conectar();
	$consulta=mysql_query("SELECT IdSubdir, Nombre FROM subdirecciones");
	desconectar();

	// Voy imprimiendo el primer select compuesto por las subdirecciones
	echo "<select name='idsubdir' id='subdir' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>* Selecciona una subdirección</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
	
}
?>

<tr>
<td>

			<div id="demoDer">
			  <div id="demoIzq"><?php generaSubdir(); ?></div> </div></td>
	</div>
				
                <td>
                    <select disabled="disabled" name="iddepto" id="deptos">
						<option value="0">* Selecciona un departamento</option>
					</select>
  </div></td>


</tr>
	
<tr>
<td>*Login</td>     :   
               
              <td> <input id="txtUsername" name="txtUsername" type="text" 
                onblur="validate(this.value, this.id)" 
                value="<?php echo $_SESSION['values']['txtUsername'] ?>" maxlength="15" size = "20" />
                <span id="txtUsernameFailed"
                class="<?php echo $_SESSION['errors']['txtUsername'] // error.hand.php?>">
               Este usuario ya esta registrado, o el campo esta vacio.
               </span><br></br></td>
</tr>
<tr>
<td>*password  :</td> <td><input type = "password" name ="password" value ="" maxlength="12" size = "15"/></td>
</tr>
<tr>        
<td>*confirme el password    :</td> <td><input type = "password" name ="password1" value ="" maxlength="12" size = "15"/></td>
</tr>
<tr>
<td>
*Seleccione el perfil de la cuenta de usuario</td>
        <td><p> 
        <select name="idperfil" id="perfil"  onChange="listaBox()">
        <optgroup label="perfil">
            <option value=""> Seleccione una opci&oacute;n,</option>
        	<option value = "1">  Administrador(Todos los privilegios)</option> 
            <option value = "2">  Consultas</option>   
            <option value = "3">  Asistencia</option>
			</optgroup>
			</select>
			</p></td>
    </tr>
    <tr>
        <td>*Seleccione el Sistema </td>
     
        <td><p>Seleccione una opci&oacute;n, o varias opciones<br /> 
        <input type="checkbox" name="grupo" id="grupo" value="1">Sistema de Control de solicitudes
        <br>
        <input type="checkbox" name="grupo2" id="grupo2" value="2" >Sistema de Consultas de asistencia
        <br>
        <input type="checkbox" name="grupo3" id="grupo3" value="3">Sistema de Equivalencias
        <br>
        <input type="checkbox" name="grupo4" id="grupo4" value="4">Sistema de Registro de folios
        <br>
        <input type="checkbox" name="grupo5" id="grupo5" disabled="disabled" value="5">Sistema de Registro de usuarios
			</p> </td>
            </tr>
            </table>
<input type="submit" value="Registrar" /><input type="reset" value="Limpiar"/>

</form>
<p>&nbsp;</p>


</center>
</body>
</html>
     
