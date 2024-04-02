<?php
//Inicamos sesión si no existe 
if(!isset($_SESSION)) session_start();
		
//incluimos los archivos necesarios
include_once "./conexion/conexion.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Agregamos los estilos para la cabecera y pie de pagina -->
<LINK media=screen type=text/css rel=stylesheet href="header_tail/style/header.css">
<!-- Agregamos los estilos para el cuerpo -->
<LINK media=screen type=text/css rel=stylesheet href="estilos/slcSistema.css">
</head>
<body>
<!--Agregamos la cabecera-->
<?php include "header_tail/header.html"; ?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!-- Cuerpo de la pagina -->
<?php

//Obtenemos el Id de empleado
$idEmp = $_SESSION["IdEmp"];
	
//cremos la conexión 
$cnx = conecta();

//validamos la conexion
if(!$cnx){
	echo '<p>No se pudo realizar la conexión a la base de datos</p>';
	exit();
}

//validamos la conexión
if(!$cnx){
	header("Location: ../login.php");
	exit();
}

//Obtenemos los sistemas que puede ver el usuario
$query = "select distinct (catsis.idsistema), catsis.nombre as nombre_sis, catsis.url, emp.IdEmpleado as No_emp, grupo.idgrupo as grupo from cat_sistemas catsis, empleados emp, det_grupos_usr grupo, grupo_objs grObj where emp.IdEmpleado=grupo.IdEmpleado and grObj.idgrupo=grupo.idgrupo and grObj.idsistema = catsis.idsistema and catsis.status = 1 and grupo.IdEmpleado = ";	
$query .= $idEmp;
		
//REalizamos la conexion
$res=mysql_query($query,$cnx); 

mysql_close($cnx);
if(mysql_errno()){
	header("Location: login.php");
	exit();
}
?>


<div id="body">
	<div id="dvBtn">
    	<input class="medium button blue" type="button" name="btnExit" id="btnExit" value="Salir" onclick="document.location='conexion/close_conec.php';"/>
    </div>
    <div id="slcSistema">
		<div id="sisTitle">Sistemas</div>
    	<div id="lstSistemas">
		<?php 	
			//REcoremos la lista de sistemas permitidos
			while($row = mysql_fetch_array($res)){
				echo '<a href="'.$row["url"].'?sis='.$row["idsistema"].'"><div>'.utf8_decode($row["nombre_sis"]).'</div></a>';
			}
		?>
    	</div>
	</div>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!--Agregamos el pie de pagina-->
<?php include "header_tail/tail.html";?>
</body>
</html>
