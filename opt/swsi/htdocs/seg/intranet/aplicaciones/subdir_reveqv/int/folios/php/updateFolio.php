<?php
include_once "../conexion/conexion.php";

//iniciamos sesion
if(!isset($_SESSION)) session_start();

$i=0;
//arreglo donde estan los folios a actualizar
$val[$i]=0;

//Obtenemos los campos que vamos actualizar
foreach($_POST as $nombre_campo => $valor){
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
   //recimos los folios que vamos a actualizar en formato
   //#folio|valor_columna_estatus
   //porloque separamos la cadena, para obtener el folio y el valor del estatus
   $strExp = explode('|',$valor);
   $val[$i]=$strExp[0]; $i++;
   $val[$i]=$strExp[1]; $i++;
   eval($asignacion);
}

//contamos el numero de folios a actualizar
$cont = count($val);

//Creamos la conexion a la db
$cnx=conecta();

//Validamos la conexion
if(!$cnx){
	$errorVar="No se pudieron insertar los los datos en la db";
	return;
}

//ciclo de actualizacion
for($i=0; $i<$cont ;$i+=2){
	
	//Creamos la cadena de actualizacion
	$sql = "UPDATE reg_folios SET status = '".$val[$i+1]."' WHERE folio =".$val[$i];
	
	//realizamos la actualizacion
	$res=mysql_query($sql,$cnx);
	if(mysql_errno()){
		mysql_close($cnx);
		echo '<p>No se pudieron insertar los los datos en la db</p>';
		return;
	}
}

//cerramos la conexion
mysql_close($cnx);

?>