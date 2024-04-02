<?php
include_once "conexion.php";

//validamos que recibimos una clave
if(!isset($_POST["clave"])){
	echo "<p>No existe el usuario</p>";
	exit();
}

//Obtenemos la clave
$clave=$_POST["clave"];

//Creamos la conexión
$conec = conecta();

//validamos la conexión
if(!$conec){
	echo '<p>No se pudo realizar la conexión a la base de datos</p>';
	exit();
}

//Creamos la cadena de consulta
//$sqlQuery = "select * from vw_empleados where usrname= \"$clave\" and IdSubdir = 3 and IdDepto =1";
$sqlQuery= "select emp.IdSubdir, emp.IdDepto, emp.IdEmpleado, cat.usrname from cat_usuarios cat, empleados emp where emp.IdEmpleado = cat.IdEmpleado and cat.idperfil=3 and";
$sqlQuery.=" cat.usrname='".$clave."'";


//Realizamos la consulta
$res=mysql_query($sqlQuery,$conec); 
if(mysql_errno()){
	mysql_close($conec);
	echo '<p>no se pudieron insertar los datos</p>';
	exit();
}

//Contamos los registros de la consulta
$resRows=mysql_num_rows($res);

//Si no hay registros el empleado no esta registrado
if($resRows==0){
	mysql_close($conec);
	echo "<p>No existe el empleado</p>";
	exit();
}



/*
La cadena de formato, se crea combinando con simbolos, letras, numeros y caracteres de formato: a - am/pm
A - AM/PM
B - Hora swatch de internet
d - Dia del mes 01 a 31
g - Hora de 1 a 12
G - Hora de 0 a 23
h - Hora de 01 a 12
H - Hora de 00 a 23
i - Minutos 00 a 59
j - Dia del mes de 1 a 31
m - Numero de mes de 01 a 12
n - Numero de mes de 1 a 12
s - Segundos de 00 a 59
t - Dias del mes de 28 a 31
U - Fecha Unix
w - Dia de la semana de 0 a 6 empezando por Domingo
W - Semana del año ej: 42
y - Año ej: 99
Y - Año ej: 1999
z - Dia del año de 0 a 366 Si queremos escribir 5 del 10 de 1999 haremos:

<?
echo date ( "j del n de Y" );
?> 
*/

date_default_timezone_set('America/Mexico_City');

//Recorremos los registros hasta encontrar al usuario
while($row = mysql_fetch_array($res)){
	//Comparamos el usrname con la clave tecleada
	if($row['usrname']==$clave){
		$id=$row['IdEmpleado'];
		$fecha =date("Y-m-d");
		$hora =date("G:i:s");
		
		//verificar que no se ha registrado el usuasio
		$chReg="select Entrada from registro_asistencia where IdEmpleado=$id and Fecha=\"$fecha\"";
		$res2=mysql_query($chReg,$conec); 
		if(mysql_errno()){
			mysql_close($conec);
			echo '<p>no se pudo registrar tu entrada 001</p>';
			exit();
		}
		
		//Contamos los registros de la consulta
		$resRows2=mysql_num_rows($res2);
		//Si existen registros quiere decir que el usuario ya se registro
		if($resRows2!=0){
			mysql_close($conec);
			while($row = mysql_fetch_array($res2)){  
				echo "<p>&nbsp;</p>";
				echo "<p>Ya has registrado tu entrada hoy a las ".$row["Entrada"]."</p>";
			}	
			exit();
		}
		
		//Registramos la entrada del usuario
		$sqlInsert="insert into registro_asistencia (IdEmpleado, Fecha, Entrada) values ($id, CURDATE(), CURTIME())";
		$res=mysql_query($sqlInsert,$conec); 
		if(mysql_errno()){
			mysql_close($conec);
			echo '<p>no se pudo registrar tu entrada</p>';
			exit();
		}
		
		//Obtenemos la hora en la que se registro el usuario
		//Debido a que estamos usando funciones de ysql para obtener la ora necesitamos recuper la hora
		$sqlHora ="select Hora_Entrada, Nombre, Paterno, Materno from vw_asistencia where IdEmpleado=$id and Fecha=\"$fecha\"";
		$res=mysql_query($sqlHora,$conec); 
		$resRows=mysql_num_rows($res);
		mysql_close($conec);
		if($resRows!=0){
			while($row = mysql_fetch_array($res)) {
				$hora = $row["Hora_Entrada"];
				$nom = ucfirst(strtolower(utf8_decode($row["Nombre"])))." ".ucfirst(strtolower(utf8_decode($row["Paterno"])))." ".ucfirst(strtolower(utf8_decode($row["Materno"])));
				}
		}
		
		//Remplazamos acentos
		$nom = str_replace('Á', 'A', $nom);
		$nom = str_replace('É', 'E', $nom);
		$nom = str_replace('Í', 'I', $nom);
		$nom = str_replace('Ó', 'O', $nom);
		$nom = str_replace('Í', 'U', $nom);

		//mensaje de bienvenida
		echo "<p>Bienvenido: $nom</p>";
		echo "<p>Se registro tu entrada a las: $hora</p>";
		exit();
	
	}
	//Si el usuario no existe quiere decir qu el usuaio no esta registrado en la db o no puede loguearse en el sistema
	else{
		mysql_close($conec);
		echo "<p>No existe el Empleado</p>";
		exit();
	}
}

?>
