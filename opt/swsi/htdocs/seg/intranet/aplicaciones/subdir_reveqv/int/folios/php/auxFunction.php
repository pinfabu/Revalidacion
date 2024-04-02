<?php


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		cadWhere
//INPUT:
//
//OUTPUT:
//		string :	cadena que representa una consulta en formato mysql
//DESC:	
//		Obtienen los datos enviados por el metodo post del formulario folios.php y crea la cadena de consulta
//		a ladb dgireprod en la tabla reg_folios
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function cadWhere(){
	
	//Obtenemos los campos
	foreach($_POST as $nombre_campo => $valor){
		$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
		eval($asignacion);
	}

	//armamos la cadena de condicion
	$where = "";

	//Validamos folio
	if(($cFolio1!="")&&($cFolio2!="")){
	
		//Validamos que esten ordenados, si no es asi los ordenamos
		if($cFolio1>$cFolio2){
			$aux=$cFolio2;
			$cFolio2=$cFolio1;
			$cFolio1=$aux;
		}
	
		//Creamos la condicion para el folio
		$where = " folio >= '$cFolio1' and folio <= '$cFolio2' ";	
	}
	
	//Conicion cuando solo se coloco el priemr folio
	else if(($cFolio1!="")&&($cFolio2=="")){	
		//Creamos la condicion para el folio
		$where = " folio = '$cFolio1' ";	
	}
	//Condicion cuando solo se coloco el segundo folio
	else if(($cFolio1=="")&&($cFolio2!="")){
		//Creamos la condicion para el folio
		$where = " folio = '$cFolio2' ";	
	}

	//Validamos la fecha
	if(($cFecha1!="")&&($cFecha2!="")){	
		//Creamos la condicion para el folio
		if($where=="")	$where = " fecha >= '$cFecha1' and fecha <= '$cFecha2' ";	
		else $where .= " and fecha >= '$cFecha1' and fecha <= '$cFecha2' ";	
	}
	//Conicion cuando solo se coloco el priemr folio
	else if(($cFecha1!="")&&($cFecha2=="")){	
		//Creamos la condicion para el folio
		if($where=="") $where = " fecha = '$cFecha1' ";	
		else $where .= " and fecha = '$cFecha1' ";	
	}
	//Condicion cuando solo se coloco el segundo folio
	else if(($cFecha1=="")&&($cFecha2!="")){
		//Creamos la condicion para el folio
		if($where=="")	$where = " fecha = '$cFecha2' ";
		else $where .= " and fecha = '$cFecha2' ";
	}

	//Validamos el estatus
	if($cEstatus!=""){	
		if($where=="") $where = " status like '%".$cEstatus."%' ";
		else $where .= " and status like '%".$cEstatus."%' ";
	}

	//validamos  dirigido a 
	if($cDirigido!=""){	
		if($where=="") $where = " dirigido_a like '%".$cDirigido."%' ";
		else $where .= " and dirigido_a like '%".$cDirigido."%' ";
	}

	//validamos  Asunto 
	if($cAsunto!=""){	
		if($where=="") $where = " asunto like '%".$cAsunto."%' ";
		else $where .= " and asunto like '%".$cAsunto."%' ";
	}

	//validamos el solicitante
	if($txtH!=""){	
		if($where=="") $where = " IdSolicitante = $txtH ";
		else $where .= " and IdSolicitante = $txtH ";
	}

	//Validamos que tengamos condiciones de busqueda
	if($where==""){
		echo "<p>No existen condiciones de busqueda</p>";
		return;
	}

	//Creamos la cadena de consulta
	$sql='select reg.*, concat(emp.Nombre," ",emp.Ap_Paterno," ",emp.Ap_Materno) as nombre from empleados emp, reg_folios reg where reg.IdSolicitante = emp.IdEmpleado and '.$where.' ORDER BY folio DESC';

	return $sql;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		printTable
//INPUT:
//		$res	:	Array que contiene la consulta a la db dgireprod
//OUTPUT:
//		string html :	imprime la cadena en html de la tabla
//DESC:	
//		A partir de un arreglo que contiene la consulta a la db crea el documento en html de la tabla que se mostrara en el navegador
//		con los datos de la consulta
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function printTable($res){
	
//creamos la cabecera de tabla con los folios
	echo "<center>";
	echo "<table>";
	echo "<thead>";
	echo "<tr>";
		echo "<th>";
			echo "Folio";
		echo "</th>";
		echo "<th>";
			echo "Actualizar";
		echo "</th>";
		echo "<th>";
			echo "Fecha";
		echo "</th>";
		echo "<th>";
			echo "Dirigido a";
		echo "</th>";
		echo "<th>";
			echo "Asunto";
		echo "</th>";
		echo "<th>";
			echo "Solicitante";
		echo "</th>";
		echo "<th>";
			echo "Estatus";
		echo "</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	$cont=0;
	//insertamos renglones mientras existan folios
	while($xRow = mysql_fetch_array($res)){
		if(($cont%2)==0) echo "<tr class=\"even\">";
		else echo "<tr class=\"odd\">";
		$cont++;
		
		echo "<td>";
			echo $xRow["folio"];
		echo "</td>";
		echo "<td>";
        //echo "<input type=\"checkbox\" onClick=\'viewInput(this,\"fl".$xRow["folio"]."\",\"txtFl".$xRow["folio"]."\")\'/>"; 
		//id=\"chkb'.$xRow["folio"].'\"
			echo '<input type="checkbox" name="chkb" id="'.$xRow["folio"].'" onClick="viewInput(this,'.'\'fl'.$xRow["folio"].'\','.'\'txtFl'.$xRow["folio"].'\')"/>';
		echo "</td>";
		echo "<td>";
			echo $xRow["fecha"];
		echo "</td>";
		echo "<td>";
			echo $xRow["dirigido_a"];
		echo "</td>";
		echo "<td>";
			echo $xRow["asunto"];
		echo "</td>";
		echo "<td>";
			//echo htmlentities($xRow["nombre"]);
			echo $xRow["nombre"];
		echo "</td>";
		echo "<td>";
			echo "<label id=\"fl".$xRow["folio"]."\">".$xRow["status"]."</label><input style=\"display:none;\" type=\"text\" id=\"txtFl".$xRow["folio"]."\" value=\"".$xRow["status"]."\"/>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<center>";
}

?>
