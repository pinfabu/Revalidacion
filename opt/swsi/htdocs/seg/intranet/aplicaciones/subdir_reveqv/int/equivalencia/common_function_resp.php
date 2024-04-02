<?php


$lstConceptos = array(
	"1" => array("preposicion" => "del", "text" => "promedio general")
	,"2" => array("preposicion" => "del", "text" => "baremación global")
	,"3" => array("preposicion" => "de la", "text" => "calificación promedio global")
	,"4" => array("preposicion" => "de", "text" => "promedio")
	,"5" => array("preposicion" => "del", "text" => "GPA total de la carrera")
	,"6" => array("preposicion" => "del", "text" => "CUM GPA")
	,"7" => array("preposicion" => "del", "text" => "promedio programa")
	,"8" => array("preposicion" => "de la", "text" => "calificación")
	,"9" => array("preposicion" => "del", "text" => "índice académico")
	,"10" => array("preposicion" => "del", "text" => "promedio general de calificaciones")
	,"11" => array("preposicion" => "del", "text" => "GPA")
);

$num_texto = array(
	'0' => 'cero'
	,'1' => 'uno'
	,'2' => 'dos'
	,'3' => 'tres'
	,'4' => 'cuatro'
	,'5' => 'cinco'
	,'6' => 'seis'
	,'7' => 'siete'
	,'8' => 'ocho'
	,'9' => 'nueve'
	,'00' => 'cero'
	,'01' => 'cero uno'
	,'02' => 'cero dos'
	,'03' => 'cero tres'
	,'04' => 'cero cuatro'
	,'05' => 'cero cinco'
	,'06' => 'cero seis'
	,'07' => 'cero siete'
	,'08' => 'cero ocho'
	,'09' => 'cero nueve'
	,'10' => 'diez'
	,'11' => 'once'
	,'12' => 'doce'
	,'13' => 'trece'
	,'14' => 'catorce'
	,'15' => 'quince'
	,'16' => 'dieciséis'
	,'17' => 'diecisiete'
	,'18' => 'dieciocho'
	,'19' => 'diecinueve'
	,'20' => 'dos'
	,'21' => 'veintiuno'
	,'22' => 'veintidós'
	,'23' => 'veintitrés'
	,'24' => 'veinticuatro'
	,'25' => 'veinticinco'
	,'26' => 'veintiséis'
	,'27' => 'veintisiete'
	,'28' => 'veintiocho'
	,'29' => 'veintinueve'
	,'30' => 'tres'
	,'31' => 'treinta y uno'
	,'32' => 'treinta y dos'
	,'33' => 'treinta y tres'
	,'34' => 'treinta y cuatro'
	,'35' => 'treinta y cinco'
	,'36' => 'treinta y seis'
	,'37' => 'treinta y siete'
	,'38' => 'treinta y ocho'
	,'39' => 'treinta y nueve'
	,'40' => 'cuatro'
	,'41' => 'cuarenta y uno'
	,'42' => 'cuarenta y dos'
	,'43' => 'cuarenta y tres'
	,'44' => 'cuarenta y cuatro'
	,'45' => 'cuarenta y cinco'
	,'46' => 'cuarenta y seis'
	,'47' => 'cuarenta y siete'
	,'48' => 'cuarenta y ocho'
	,'49' => 'cuarenta y nueve'
	,'50' => 'cinco'
	,'51' => 'cincuenta y uno'
	,'52' => 'cincuenta y dos'
	,'53' => 'cincuenta y tres'
	,'54' => 'cincuenta y cuatro'
	,'55' => 'cincuenta y cinco'
	,'56' => 'cincuenta y seis'
	,'57' => 'cincuenta y siete'
	,'58' => 'cincuenta y ocho'
	,'59' => 'cincuenta y nueve'
	,'60' => 'seis'
	,'61' => 'sesenta y uno'
	,'62' => 'sesenta y dos'
	,'63' => 'sesenta y tres'
	,'64' => 'sesenta y cuatro'
	,'65' => 'sesenta y cinco'
	,'66' => 'sesenta y seis'
	,'67' => 'sesenta y siete'
	,'68' => 'sesenta y ocho'
	,'69' => 'sesenta y nueve'
	,'70' => 'setenta'
	,'71' => 'setenta y uno'
	,'72' => 'setenta y dos'
	,'73' => 'setenta y tres'
	,'74' => 'setenta y cuatro'
	,'75' => 'setenta y cinco'
	,'76' => 'setenta y seis'
	,'77' => 'setenta y siete'
	,'78' => 'setenta y ocho'
	,'79' => 'setenta y nueve'
	,'80' => 'ocho'
	,'81' => 'ochenta y uno'
	,'82' => 'ochenta y dos'
	,'83' => 'ochenta y tres'
	,'84' => 'ochenta y cuatro'
	,'85' => 'ochenta y cinco'
	,'86' => 'ochenta y seis'
	,'87' => 'ochenta y siete'
	,'88' => 'ochenta y ocho'
	,'89' => 'ochenta y nueve'
	,'90' => 'nueve'
	,'91' => 'noventa y uno'
	,'92' => 'noventa y dos'
	,'93' => 'noventa y tres'
	,'94' => 'noventa y cuatro'
	,'95' => 'noventa y cinco'
	,'96' => 'noventa y seis'
	,'97' => 'noventa y siete'
	,'98' => 'noventa y ocho'
	,'99' => 'noventa y nueve'
);


function get_fecha(){
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	
	return date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
}

function get_text_fecha($fecha){

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $lst = explode("-", $fecha);

        $text = $lst[2]." de ". $meses[(int)$lst[1] - 1]." del ".$lst[0];

        return $text;
}
		
function create_oficio(){

	global $num_texto;
	global $lstConceptos;

	$template = "./template/temp_oficio.docx";
	$dir_carta = "./oficios/";
	
	foreach($_POST as $k => $val){
		$var = "\$" . $k . "=0;";
		eval($var);
		$var = "\$ref=&$" . $k . ";";
		eval($var);
		if($k != "lstCalif"){
			$ref = addslashes(utf8_decode($val));
		}
		else{
			$ref = $val;
		}
	}
	
	
	$name = $folio.".docx";

	/*
	Si estas trabajando en el 19 quitas esta linea, pero si estas en el 24 la colocas
	
	Esto es por que la varibale open_basedir  de php tiene los sigeuintes valores
	19: no value
	24: /opt/swsi/htdocs:/usr/local/lib/php:/tmp
	
	La variable open_basedir te restringe los accesos al arbol de directorios en el caso del
	19 no te restringe el acceso, pero en el 24 solo puedes escribir archivos temporales en 
	los directorios /opt/swsi/htdocs:/usr/local/lib/php:/tmp 
	
	y Parece que phpoffice por default el directorio temporal es /var/tmp entonces el 24 no te
	deja crear el archivo, asi que tienes que configurar el archivo temporal, con la sigeuinte linea
	*/
	\PhpOffice\PhpWord\Settings::setTempDir('/tmp');
	
	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template);
	
	///$a_promNal = (string)$promNal;
	$a_promNal = explode(".", $promNal);
	$promNal_text = $num_texto[$a_promNal[0]]." punto ".$num_texto[$a_promNal[1]];
	
	//periodo
	$periodo = "";
	if(($fecha1 == "")&&($fecha2 == "")){

	}
	else if(($fecha1 != "")&&($fecha2 != "")){
		$periodo = "de $fecha1 a $fecha2";
	}
	else if(($fecha1 != "")&&($fecha2 == "")){
		$periodo = "en $fecha1";
	}
	
	$fecha_recep = get_text_fecha($fc_recepcion);
	
	$templateProcessor->setValue('folio', $folio);
	$templateProcessor->setValue('escuela', $escuela);
	$templateProcessor->setValue('solicitante', $solicitante);
	$templateProcessor->setValue('pais', $pais);
	$templateProcessor->setValue('estudios', $estudios);
	$templateProcessor->setValue('preposicion', $lstConceptos[$equivalencia]["preposicion"]);
	$templateProcessor->setValue('equivalencia', $lstConceptos[$equivalencia]["text"]);	
	$templateProcessor->setValue('promExt', $promExt);
	$templateProcessor->setValue('promNal', $promNal." ($promNal_text)");
	$templateProcessor->setValue('today', get_fecha());
	$templateProcessor->setValue('periodo', $periodo);
	$templateProcessor->setValue('extMin', $extMin);
	$templateProcessor->setValue('extMax', $extMax);
	$templateProcessor->setValue('nalMin', $nalMin);
	$templateProcessor->setValue('nalMax', $nalMax);
	$templateProcessor->setValue('numMat', $numMat);
	$templateProcessor->setValue('fc_recepcion', $fecha_recep);
	$templateProcessor->setValue('iniciales', $iniciales);
	$templateProcessor->setValue('code_arch', stripslashes($code_arch));
	
	//echo $dir_template.$name; die();
	
	$templateProcessor->saveAs($dir_carta.$name);
	return (object)array("error" => false, "file" => $dir_carta.$name);
	
}



function create_oficio_f69(){

	global $num_texto;
	global $lstConceptos;

	foreach($_POST as $k => $val){
		$var = "\$" . $k . "=0;";
		eval($var);
		$var = "\$ref=&$" . $k . ";";
		eval($var);
		if($k != "lstCalif"){
			$ref = addslashes(utf8_decode($val));
		}
		else{
			$ref = $val;
		}
	}
	
	
	$template = "./template/F69_".$tramite.".docx";
	$name = $folio.".docx";
	$dir_carta = "./oficios/";
	
	
	
	/*
	Si estas trabajando en el 19 quitas esta linea, pero si estas en el 24 la colocas
	
	Esto es por que la varibale open_basedir  de php tiene los sigeuintes valores
	19: no value
	24: /opt/swsi/htdocs:/usr/local/lib/php:/tmp
	
	La variable open_basedir te restringe los accesos al arbol de directorios en el caso del
	19 no te restringe el acceso, pero en el 24 solo puedes escribir archivos temporales en 
	los directorios /opt/swsi/htdocs:/usr/local/lib/php:/tmp 
	
	y Parece que phpoffice por default el directorio temporal es /var/tmp entonces el 24 no te
	deja crear el archivo, asi que tienes que configurar el archivo temporal, con la sigeuinte linea
	*/
	\PhpOffice\PhpWord\Settings::setTempDir('/tmp');
	
	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template);
	
	///$a_promNal = (string)$promNal;
	$a_promNal = explode(".", $promNal);
	$promNal_text = $num_texto[$a_promNal[0]]." punto ".$num_texto[$a_promNal[1]];


	$templateProcessor->setValue('solicitante', $solicitante);
	$templateProcessor->setValue('folio', $folio);
	$templateProcessor->setValue('promNal', $promNal);
	$templateProcessor->setValue('promText', $promNal_text);
	$templateProcessor->setValue('today', get_fecha());
	$templateProcessor->setValue('code_arch', stripslashes($code_arch));
	$templateProcessor->setValue('iniciales', $iniciales);

	$templateProcessor->saveAs($dir_carta.$name);
	return (object)array("error" => false, "file" => $dir_carta.$name);
	
}






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


function create_equivalencia(){

	//die("dfwerw");
	
	
	//$i=-1;
	$i=0;
	

	//Obtenemos las variables y las contamos
	foreach($_POST as $k => $val){
		$var = "\$" . $k . "=0;";
		eval($var);
		$var = "\$ref=&$" . $k . ";";
		eval($var);
		if($k != "lstCalif"){
			$ref = addslashes(utf8_decode($val));
		}
		else{
			$ref = json_decode($val);
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
	$table->writeToCell(3, 3, '<b>Subdirección de Revalidación y Apoyo Académico (SRAA)</b>', $fontHead, new ParFormat('center'));
	
	//Colocamos el titulo del documento
	$sect->writeText('<b>Equivalencia de calificaciones</b>', $fontTitle, new ParFormat('center'));
	
	
	//Colocamos los datos del alumno
	$sect->writeText(' ', $fontParB, new ParFormat());
	if($escuela!="") $sect->writeText('<b>Nombre de la escuela: </b>'.utf8_encode($escuela), $fontPar, new ParFormat());
	$sect->writeText('<b>Nombre del alumno: </b>'.utf8_encode($solicitante), $fontPar, new ParFormat());
	$sect->writeText('<b>País de origen de los estudios: </b>'.utf8_encode($pais), $fontPar, new ParFormat());
	if($estudios!="") $sect->writeText('<b>Nivel de estudios: </b>'.utf8_encode($estudios), $fontPar, new ParFormat());
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
	$table->writeToCell(1, 2, $numMat, $fontPar, new ParFormat('center'));
	
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
	//getNChar($pExt,5);
	//getNChar($pNal,5);
	$table->setBordersOfCells(new BorderFormat(2), 1, 2, 1, 2);
	$table->writeToCell(1, 1, '<b>Promedio extranjero</b>', $fontPar, new ParFormat());
	$table->writeToCell(1, 2, $promExt, $fontPar, new ParFormat('center'));
	$table->setBordersOfCells(new BorderFormat(2), 1, 5, 1, 5);
	$table->writeToCell(1, 4, '<b>Promedio nacional</b>', $fontPar, new ParFormat());
	$table->writeToCell(1, 5, $promNal, $fontPar, new ParFormat('center'));
	
	//Inicaamos la relacion de calificaciones
	$sect->writeText('<b>Relación de calificaciones</b>', $fontPar, new ParFormat());
	$sect->writeText(' ', $fontParB, new ParFormat());
	
	
	//////////////////////////////////////////////////////
	//			Tabla de equivalencias
	//////////////////////////////////////////////////////
	
	
	//Numero de tablas que contiene 30 calificaciones
	$nMat30 = ($numMat - $numMat%30)/30;
	
	//Numero de columnas de 10 materias
	$nCol10 =  ($numMat - $numMat%10)/10;
	
	//Almenos debe existir una columna
	if($numMat%10!=0) $nCol10++;
	//alemenos debe de existir una tabla
	if($numMat%30!=0) $nMat30++;
	
	
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
		if((($numMat-$cM)-30)>=0){
			$nMat=30;
			$cM+=30;
		}
		else{
			$nMat=$numMat-$cM;
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
			//getNChar($miArray[$iMat],5);
			//Mostramos la califiaion
			$table->writeToCell($m+2, $col+2, $lstCalif[$iMat]->ext, $fontCell, new ParFormat('center'));
			//Calculamos la equivalencia
			//$eqv = (($nalMax-$nalMin)/($extMax-$extMin))*($miArray[$iMat] - $extMax) + $nalMax;
			//Obtenemos los primeros 5 caracteres de la eqv y la mostramos
			//getNChar($eqv,5);
			$table->writeToCell($m+2, $col+3, $lstCalif[$iMat]->nal, $fontCell, new ParFormat('center'));
			$iMat++;
		}
	
		$sect->writeText(' ', $fontParB, new ParFormat());
	}
	
	
	//creamos el documento y los regresamos
	//$rtf->prepare();
	if(isset($tramite)&&($tramite=="mov")){
                $name = "oficios/equivalencia.rtf";
        }else{
                $name = "oficios/".$folio."_equivalencia.rtf";
        }
        $rtf->save($name);
	
	return (object)array("error" => false, "file" => $name);

}

?>
