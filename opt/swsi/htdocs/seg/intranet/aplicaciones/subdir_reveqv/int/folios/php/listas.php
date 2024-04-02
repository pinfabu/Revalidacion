<?php

//este solo es punto, porque se carga directamente sobre folios y se llama desde hay y folios esta al mismo nivel que la carpeta conexion
include_once "./conexion/conexion.php";



function replaceChar($text){
//return htmlentities($text);
return $text;
	$text = nl2br($text);
	$text = str_replace("á","&aacute;",$text);
	$text = str_replace("é","&eacute;",$text);
	$text = str_replace("í","&iacute;",$text);
	$text = str_replace("ó","&oacute;",$text);
	$text = str_replace("ò","&oacute;",$text);
	$text = str_replace("ú","&uacute;",$text);
	$text = str_replace("ñ","&ntilde;",$text);
	return $text; 
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME: 	
//		lstEmpleado
//INPUT:
//
//DESC:
//		Obtiene de la tabla de empleados el campo Idempleado y nombre completo, y coloca cada empleado en el combobox con
//		su respectivo IdEmpleado, para que se uedan seleccionar
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function lstEmpleado(){

	//Cremos la conexion y la validamos
	$cnx= conecta();
	if(!$cnx){
		echo "<option value=0>"."no exiten empleados"."</option> \n";		
		return;
	}

	//Creamos la cadena de consulta 
	$sql='SELECT IdEmpleado, concat(Nombre, " ", Ap_Paterno, " ", Ap_Materno) as nombre FROM empleados WHERE IdSubdir =2 ORDER BY nombre';
	$query=mysql_query($sql,$cnx); 
	mysql_close($cnx);
	if(mysql_errno()){
		echo "<option value=0>"."no exiten empleados"."</option> \n";		
		return;
	}

	//Colocamos los empleados en el combobox
	while($row = mysql_fetch_array($query)){
		echo "<option value=\"".$row['IdEmpleado']."\">".replaceChar($row['nombre'])."</option>";
//		echo "<p>".$row['IdEmpleado']."</p>";
	}
	
}

?>
