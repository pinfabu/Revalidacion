<?php


/////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		printXMLResponse
//INPUT:
//		$numError	:	Numero de Error
//		$msgError	:	Mensaje para el error
//		$msgOk		:	Mensaje
//OUTPUR:
//		string		: cabecera del archivo xml
//DEC:
//		Imprime la cabecera del archimo xml xon el que se respondera
/////////////////////////////////////////////////////////////////////////////////////////////
function printXMLResponse($numError,$msgError,$msgOk){
	header("Content-type:text/xml");
	/*
	echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
	*/
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
    
	echo "<respuesta>";
	//if($msgError=="") echo "</error num='0'>";
	//else echo "<error num='".$numError."'>".$msgError."</error>";
	//if($msgOk=="") echo "</sucess>";
	//else echo "<sucess>".$msgOk."</sucess>";
	
	if($msgError=="") echo "<error num=\"0\">no hay mensaje</error>";
	else echo "<error num=\"".$numError."\">".$msgError."</error>";
	if($msgOk=="") echo "<sucess>no hay mensaje</sucess>";
	else echo "<sucess>".$msgOk."</sucess>";
	
	echo "</respuesta>";

}

/////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		printCMLHeader
//OUTPUR:
//		string		: cabecera del archivo xml
//DEC:
//		Imprime la cabecera del archimo xml xon el que se respondera
/////////////////////////////////////////////////////////////////////////////////////////////
function printXMLHeader(){
	header("Content-type:text/xml");
	/*
	echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
	*/
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	
}

/////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		printXMLSucess
//OUTPUR:
//		xml respuesta
//DEC:
//		Imprime un archivo XML de existo
/////////////////////////////////////////////////////////////////////////////////////////////
function printXMLSucess(){
	printXMLHeader();
	echo "<respuesta>";
	echo "<sucess>ok</sucess>";
	echo "</respuesta>";
}

/////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		printXMLMSGSucess
//INPUT:
//		numSol	:	El numero de la solicitud que se inserto
//OUTPUR:
//		xml respuesta
//DEC:
//		Imprime un archivo XML de existo
/////////////////////////////////////////////////////////////////////////////////////////////
function printXMLMSGSucess($numSol){
	printXMLHeader();
	echo "<respuesta>";
	echo "<sucess>".$numSol."</sucess>";
	echo "</respuesta>";
}


?>
