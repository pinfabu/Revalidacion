<?PHP

//include_once "securiy.php";

//Librerias para la creacion de archivos rtf
require_once "./rtf/Rtf.php";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:	
//			getNChar
//INPUT:
//			$cad		:Referencia a una cadena
//			$n			:Numero de caractes que queremos de la cadena
//DESC:
//		Obtiene los primeros n caracteres de una cadena, si la cadena es menor a n, regresa la cadena
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getNChar(&$cad,$n){
	//Obtenemos longitud de la cena
	$len = strlen($cad);

	//verificamos la longitud;
	if($len<$n) return;

	//obtenemos los n caracteres
	$cad = substr($cad , 0 , $n);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:	
//			setHeaderTable
//INPUT:
//			$table		:Referencia a la tabla donde se colocaran las cabeceras
//			$col		:Numero de columnas de 10 calificaciones
//DESC:
//		Coloca las cabeceras (No, E, N) en una tabla que se dividira en n tablas de de 11 renglones incluyendo la cabecera
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function setHeaderTable(&$table,$col){

	for($i=0; $i<$col ;$i++){
		//Agreamos las columnas al bloque
		$table->addColumn(1);
		$table->addColumn(1.5);
		$table->addColumn(1.5);
		$table->addColumn(0.5);
	
		//Colocamos las cabeceras del bloque
		$table->setBackgroundOfCells('#CCCCCC', 1, $i*4+1, 1, $i*4+3);
		$table->writeToCell(1, $i*4+1, '<b>No</b>', $fontCell, new ParFormat('center'));
		$table->writeToCell(1, $i*4+2, '<b>E</b>', $fontCell, new ParFormat('center'));
		$table->writeToCell(1, $i*4+3, '<b>N</b>', $fontCell, new ParFormat('center'));
	
		//Modificamos el borde de la tabla
		$table->setBordersOfCells(new BorderFormat(2), 1, $i*4+1, 11, $i*4+3);
	}
}


//$i=-1;
$i=0;
//Obtenemos las variables y las contamos
foreach($_POST as $nombre_campo => $valor){
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
   eval($asignacion);
   
   //Metemos en un array cada calificacion para acceder a ellas de una forma mas facil
   if(strpos($nombre_campo, "xtMat")!=false){
		$miArray[$i]=$valor;
		$i++;
   }
}

//Tipo de letra que utilizaremos para el encabezado

/*
$fontTitle = new Font(20, 'Times New Roman');
$fontPar = new Font(14, 'Times New Roman');
$fontHead = new Font(12, 'Times New Roman');
$fontCell = new Font(12, 'Times New Roman');
*/

$fontTitle = new Font(20, 'Garamond');
$fontPar = new Font(12, 'Garamond');
$fontParB = new Font(1, 'Garamond');
$fontHead = new Font(12, 'Garamond');
$fontCell = new Font(12, 'Garamond');



//Creamos el documento 
$rtf = new Rtf();

//Creamos una hoja
$sect = &$rtf->addSection();

//parafo en blanco
$sect->writeText(' ', $fontParB, new ParFormat());

//Creamos una tabla para insertar el encabezado con las imagenes
$table = &$sect->addTable('center');
$table->addRows(3);
$table->addColumn(2);
$table->addColumn(0.5);
$table->addColumn(12);
$table->addColumn(0.5);
$table->addColumn(2);

//Unimos celdas y colocamos el logo de la unam en la celda
$table->mergeCells(1, 1, 3, 1);
$cell = &$table->getCell(1, 1);
$cell->addImage('./img/unam.jpg', $null,2,2);

//Unimos celdas y colocamos el logo de la dgire en la celda
$table->mergeCells(1, 5, 3, 5);
$cell = &$table->getCell(1, 5);
$cell->addImage('./img/dgire.jpg', $null,2,2);

//Colocamos el encabezado
$table->writeToCell(1, 3, '<b>Universidad Nacional Autónoma de México</b>', $fontHead, new ParFormat('center'));
$table->writeToCell(2, 3, '<b>Dirección General de Incorporación y Revalidación de Estudios</b>', $fontHead, new ParFormat('center'));
$table->writeToCell(3, 3, '<b>Subdirección de Revalidación y Equivalencia</b>', $fontHead, new ParFormat('center'));

//Colocamos el titulo del documento
$sect->writeText('<b>Equivalencia de calificaciones</b>', $fontTitle, new ParFormat('center'));


//Colocamos los datos del alumno
$sect->writeText(' ', $fontParB, new ParFormat());
if($escuela!="") $sect->writeText('<b>Nombre de la escuela: </b>'.utf8_encode($escuela), $fontPar, new ParFormat());
$sect->writeText('<b>Nombre del alumno: </b>'.utf8_encode($alumn), $fontPar, new ParFormat());
$sect->writeText('<b>País de origen de los estudios: </b>'.utf8_encode($pais), $fontPar, new ParFormat());
if($nivel!="") $sect->writeText('<b>Nivel de estudios: </b>'.utf8_encode($nivel), $fontPar, new ParFormat());
$sect->writeText(' ', $fontPar, new ParFormat());

//Creamos una tabla para colocar las escalas
$table = &$sect->addTable();
$table->addRows(3);
$table->addColumn(4);
$table->addColumn(2);
$table->addColumn(0.5);
$table->addColumn(4);
$table->addColumn(2);


//unimos celdas y marcamos el borde de la celda de titulo "Escala extranjera" y colocamos la escala
$table->mergeCells(1, 1, 1, 2);
$table->setBordersOfCells(new BorderFormat(2), 1, 1, 3, 2);
$table->writeToCell(1, 1, '<b>Escala extranjera (E)</b>', $fontPar, new ParFormat('center'));
$table->writeToCell(2, 1, 'Calif. mínima', $fontPar, new ParFormat());
$table->writeToCell(2, 2, $extMin, $fontPar, new ParFormat('center'));
$table->writeToCell(3, 1, 'Calif. máxima', $fontPar, new ParFormat());
$table->writeToCell(3, 2, $extMax, $fontPar, new ParFormat('center'));

//unimos celdas y marcamos el borde de la celda de titulo "Escala nacional" y colocamos la escala
$table->mergeCells(1, 4, 1, 5);
$table->setBordersOfCells(new BorderFormat(2), 1, 4, 3, 5);
$table->writeToCell(1, 4, '<b>Escala nacional (N)</b>', $fontPar, new ParFormat('center'));
$table->writeToCell(2, 4, 'Calif. mínima', $fontPar, new ParFormat());
$table->writeToCell(2, 5, $nalMin, $fontPar, new ParFormat('center'));
$table->writeToCell(3, 4, 'Calif. máxima', $fontPar, new ParFormat());
$table->writeToCell(3, 5, $nalMax, $fontPar, new ParFormat('center'));
 
//parramo en blanco
$sect->writeText(' ', $fontParB, new ParFormat());

//Creamos otra tabla para total de materias
$table = &$sect->addTable();
$table->addRows(1);
$table->addColumn(4);
$table->addColumn(1);

//unimos celdas y colocamos total de materias
$table->setBordersOfCells(new BorderFormat(2), 1, 2, 1, 2);
$table->writeToCell(1, 1, '<b>Total de materias</b>', $fontPar, new ParFormat());
$table->writeToCell(1, 2, $nMat, $fontPar, new ParFormat('center'));

//parrafo en blanco
$sect->writeText(' ', $fontParB, new ParFormat());

//Creamos tabla para el promedio 
$table = &$sect->addTable();
$table->addRows(1);
$table->addColumn(5);
$table->addColumn(2);
$table->addColumn(1);
$table->addColumn(5);
$table->addColumn(2);

//colocamos el promedio nacional y extranjero
getNChar($pExt,5);
getNChar($pNal,5);
$table->setBordersOfCells(new BorderFormat(2), 1, 2, 1, 2);
$table->writeToCell(1, 1, '<b>Promedio extranjero</b>', $fontPar, new ParFormat());
$table->writeToCell(1, 2, $pExt, $fontPar, new ParFormat('center'));
$table->setBordersOfCells(new BorderFormat(2), 1, 5, 1, 5);
$table->writeToCell(1, 4, '<b>Promedio nacional</b>', $fontPar, new ParFormat());
$table->writeToCell(1, 5, $pNal, $fontPar, new ParFormat('center'));

//Inicaamos la relacion de calificaciones
$sect->writeText('<b>Relación de calificaciones</b>', $fontPar, new ParFormat());
$sect->writeText(' ', $fontParB, new ParFormat());


//////////////////////////////////////////////////////
//			Tabla de equivalencias
//////////////////////////////////////////////////////

$txtNMat=$i;
//Numero de tablas que contiene 30 calificaciones
$nMat30 = ($txtNMat - $txtNMat%30)/30;

//Numero de columnas de 10 materias
$nCol10 =  ($txtNMat - $txtNMat%10)/10;

//Almenos debe existir una columna
if($txtNMat%10!=0) $nCol10++;
//alemenos debe de existir una tabla
if($txtNMat%30!=0) $nMat30++;


$cCol=0;
$cM=0;
$iMat=0;


for($i=0; $i<$nMat30 ;$i++){
	//Creamos tabla para la relacion de calificaciones
	$table = &$sect->addTable();

	//renglones por default
	$table->addRows(11);

	//Numero de columnas de 10 calificaciones para la tabla
	if((($nCol10-$cCol)-3)>=0){
		$col=3;
		$cCol+=3;
	}
	else{
		$col=$nCol10-$cCol;
	}
	
	//Numero de materias para la tabla
	if((($txtNMat-$cM)-30)>=0){
		$nMat=30;
		$cM+=30;
	}
	else{
		$nMat=$txtNMat-$cM;
	}

	//Colocamos las cabeceras
	setHeaderTable($table,$col);
	
	//LLenamos las columnas
	for($z=0; $z<$nMat ;$z++){

		//Obtenemos el bloque el que colocomos la calificacion	
		$m = $z%10;
		$col = ($z-$m)/10;
		$col *=4;
		$id=$z+1;
		//Colocamos el numero de la calificacion
		$table->writeToCell($m+2, $col+1, ($iMat+1).'.-', $fontCell, new ParFormat('center'));
		//$cell = &$table->getCell($m+2, $col+2);	
		//Obtenemos oslo los priemros 5 número de la calificación
		getNChar($miArray[$iMat],5);
		//Mostramos la califiaion
		$table->writeToCell($m+2, $col+2, $miArray[$iMat], $fontCell, new ParFormat('center'));
		//Calculamos la equivalencia
		$eqv = (($nalMax-$nalMin)/($extMax-$extMin))*($miArray[$iMat] - $extMax) + $nalMax;
		//Obtenemos los primeros 5 caracteres de la eqv y la mostramos
		getNChar($eqv,5);
		$table->writeToCell($m+2, $col+3, $eqv, $fontCell, new ParFormat('center'));
		$iMat++;
	}

	$sect->writeText(' ', $fontParB, new ParFormat());
}

//creamos el documento y los regresamos
$rtf->prepare();
$rtf->sendRtf("equivalencia");

?>
