//Variables globales
var extMax;
var extMin;
var nalMax;
var nalMin;
var nMat;
var cNMat=150;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Las siguientes fuinciones (alert1,confirm1,acentos) fueron obtenidas de la la pagina http://biomodel.uah.es/pruebas/caracteres/prueba2.htm
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function alert1(x) { alert(acentos(x)) }

function confirm1(x) { confirm(acentos(x)) }

function acentos(x) {
	// version 040623
	// Spanish - Español
	// Portuguese - Portugués - Português
	// Italian - Italiano
	// French - Francés - Français
	// Also accepts and converts single and double quotation marks, square and angle brackets
	// and miscelaneous symbols.
	// Also accepts and converts html entities for all the above.
//	if (navigator.appVersion.toLowerCase().indexOf("windows") != -1) {return x}
	x = x.replace(/¡/g,"\xA1");	x = x.replace(/&iexcl;/g,"\xA1")
	x = x.replace(/¿/g,"\xBF");	x = x.replace(/&iquest;/g,"\xBF")
	x = x.replace(/À/g,"\xC0");	x = x.replace(/&Agrave;/g,"\xC0")
	x = x.replace(/à/g,"\xE0");	x = x.replace(/&agrave;/g,"\xE0")
	x = x.replace(/Á/g,"\xC1");	x = x.replace(/&Aacute;/g,"\xC1")
	x = x.replace(/á/g,"\xE1");	x = x.replace(/&aacute;/g,"\xE1")
	x = x.replace(/Â/g,"\xC2");	x = x.replace(/&Acirc;/g,"\xC2")
	x = x.replace(/â/g,"\xE2");	x = x.replace(/&acirc;/g,"\xE2")
	x = x.replace(/Ã/g,"\xC3");	x = x.replace(/&Atilde;/g,"\xC3")
	x = x.replace(/ã/g,"\xE3");	x = x.replace(/&atilde;/g,"\xE3")
	x = x.replace(/Ä/g,"\xC4");	x = x.replace(/&Auml;/g,"\xC4")
	x = x.replace(/ä/g,"\xE4");	x = x.replace(/&auml;/g,"\xE4")
	x = x.replace(/Å/g,"\xC5");	x = x.replace(/&Aring;/g,"\xC5")
	x = x.replace(/å/g,"\xE5");	x = x.replace(/&aring;/g,"\xE5")
	x = x.replace(/Æ/g,"\xC6");	x = x.replace(/&AElig;/g,"\xC6")
	x = x.replace(/æ/g,"\xE6");	x = x.replace(/&aelig;/g,"\xE6")
	x = x.replace(/Ç/g,"\xC7");	x = x.replace(/&Ccedil;/g,"\xC7")
	x = x.replace(/ç/g,"\xE7");	x = x.replace(/&ccedil;/g,"\xE7")
	x = x.replace(/È/g,"\xC8");	x = x.replace(/&Egrave;/g,"\xC8")
	x = x.replace(/è/g,"\xE8");	x = x.replace(/&egrave;/g,"\xE8")
	x = x.replace(/É/g,"\xC9");	x = x.replace(/&Eacute;/g,"\xC9")
	x = x.replace(/é/g,"\xE9");	x = x.replace(/&eacute;/g,"\xE9")
	x = x.replace(/Ê/g,"\xCA");	x = x.replace(/&Ecirc;/g,"\xCA")
	x = x.replace(/ê/g,"\xEA");	x = x.replace(/&ecirc;/g,"\xEA")
	x = x.replace(/Ë/g,"\xCB");	x = x.replace(/&Euml;/g,"\xCB")
	x = x.replace(/ë/g,"\xEB");	x = x.replace(/&euml;/g,"\xEB")
	x = x.replace(/Ì/g,"\xCC");	x = x.replace(/&Igrave;/g,"\xCC")
	x = x.replace(/ì/g,"\xEC");	x = x.replace(/&igrave;/g,"\xEC")
	x = x.replace(/Í/g,"\xCD");	x = x.replace(/&Iacute;/g,"\xCD")
	x = x.replace(/í/g,"\xED");	x = x.replace(/&iacute;/g,"\xED")
	x = x.replace(/Î/g,"\xCE");	x = x.replace(/&Icirc;/g,"\xCE")
	x = x.replace(/î/g,"\xEE");	x = x.replace(/&icirc;/g,"\xEE")
	x = x.replace(/Ï/g,"\xCF");	x = x.replace(/&Iuml;/g,"\xCF")
	x = x.replace(/ï/g,"\xEF");	x = x.replace(/&iuml;/g,"\xEF")
	x = x.replace(/Ñ/g,"\xD1");	x = x.replace(/&Ntilde;/g,"\xD1")
	x = x.replace(/ñ/g,"\xF1");	x = x.replace(/&ntilde;/g,"\xF1")
	x = x.replace(/Ò/g,"\xD2");	x = x.replace(/&Ograve;/g,"\xD2")
	x = x.replace(/ò/g,"\xF2");	x = x.replace(/&ograve;/g,"\xF2")
	x = x.replace(/Ó/g,"\xD3");	x = x.replace(/&Oacute;/g,"\xD3")
	x = x.replace(/ó/g,"\xF3");	x = x.replace(/&oacute;/g,"\xF3")
	x = x.replace(/Ô/g,"\xD4");	x = x.replace(/&Ocirc;/g,"\xD4")
	x = x.replace(/ô/g,"\xF4");	x = x.replace(/&ocirc;/g,"\xF4")
	x = x.replace(/Õ/g,"\xD5");	x = x.replace(/&Otilde;/g,"\xD5")
	x = x.replace(/õ/g,"\xF5");	x = x.replace(/&otilde;/g,"\xF5")
	x = x.replace(/Ö/g,"\xD6");	x = x.replace(/&Ouml;/g,"\xD6")
	x = x.replace(/ö/g,"\xF6");	x = x.replace(/&ouml;/g,"\xF6")
	x = x.replace(/Ø/g,"\xD8");	x = x.replace(/&Oslash;/g,"\xD8")
	x = x.replace(/ø/g,"\xF8");	x = x.replace(/&oslash;/g,"\xF8")
	x = x.replace(/Ù/g,"\xD9");	x = x.replace(/&Ugrave;/g,"\xD9")
	x = x.replace(/ù/g,"\xF9");	x = x.replace(/&ugrave;/g,"\xF9")
	x = x.replace(/Ú/g,"\xDA");	x = x.replace(/&Uacute;/g,"\xDA")
	x = x.replace(/ú/g,"\xFA");	x = x.replace(/&uacute;/g,"\xFA")
	x = x.replace(/Û/g,"\xDB");	x = x.replace(/&Ucirc;/g,"\xDB")
	x = x.replace(/û/g,"\xFB");	x = x.replace(/&ucirc;/g,"\xFB")
	x = x.replace(/Ü/g,"\xDC");	x = x.replace(/&Uuml;/g,"\xDC")
	x = x.replace(/ü/g,"\xFC");	x = x.replace(/&uuml;/g,"\xFC")
	
	x = x.replace(/\"/g,"\x22")
	x = x.replace(/\'/g,"\x27")
	x = x.replace(/\</g,"\x3C")
	x = x.replace(/\>/g,"\x3E")
	x = x.replace(/\[/g,"\x5B")
	x = x.replace(/\]/g,"\x5D")

	x = x.replace(/¢/g,"\xA2");	x = x.replace(/&cent;/g,"\xA2") 
	x = x.replace(/£/g,"\xA3");	x = x.replace(/&pound;/g,"\xA3")
	x = x.replace(//g,"\u20AC");	x = x.replace(/&euro;/g,"\u20AC") 
	x = x.replace(/©/g,"\xA9");	x = x.replace(/&copy;/g,"\xA9") 
	x = x.replace(/®/g,"\xAE");	x = x.replace(/&reg;/g,"\xAE") 
	x = x.replace(/ª/g,"\xAA");	x = x.replace(/&ordf;/g,"\xAA") 
	x = x.replace(/º/g,"\xBA");	x = x.replace(/&ordm;/g,"\xBA") 
	x = x.replace(/°/g,"\xB0");	x = x.replace(/&deg;/g,"\xB0") 
	x = x.replace(/±/g,"\xB1");	x = x.replace(/&plusmn;/g,"\xB1")
	x = x.replace(/×/g,"\xD7");	x = x.replace(/&times;/g,"\xD7") 
	
		
	return x
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	downloadFile
//input:	
//		
//Desc:
//		Valida todos los campos si estan correctos solicita el archivo doc al servidor 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function downloadFile(){
	//validamos todos los datos
	
	//obtenemos las variables globales
	if(!getVar()) return false;
	
	//obtenemos todos los datos 
	var txtEscuela = document.forma.txtEscuela.value;
	var txtAlumno = document.forma.txtAlumno.value;
	var txtPais = document.forma.txtPais.value;
	var txtNivel = document.forma.txtNivel.value;
	var cad;
	var id;
	var cObj;
	var cArray="";
	
	//Checamos que tengamos todos los datos
	/*
	if(txtEscuela==""){
		document.forma.txtEscuela.focus();
		alert1("Te hace falta el nombre de la Escuela");
		return;
	}
	*/

	if(txtAlumno==""){
		document.forma.txtAlumno.focus();
		alert1("Te hace falta el  nombre del alumno");
		return;
	}

	if(txtPais==""){
		document.forma.txtPais.focus();
		alert1("Te hace falta el País");
		return;
	}

	//Checamos todas las calificaciones
	if(!validAllCalf()) return;
	
	//Creamos el array con las calificaciones
	for(i=0; i<nMat ;i++){
		id= i+1;
		cad="extMat"+id;

		cObj = document.getElementById('extMat'+id);
		if(!cObj) return false;
		
		cArray = cArray +"&"+cad+"="+cObj.value;
	}
	
	//Creamos la cadena que enviaremos
	cad = "escuela="+txtEscuela;
	cad = cad + "&alumn="+txtAlumno
	cad = cad +"&pais="+txtPais;
	cad = cad +"&nivel="+txtNivel;
	cad = cad +"&extMax="+extMax;
	cad = cad +"&extMin="+extMin;
	cad = cad +"&nalMax="+nalMax;
	cad = cad +"&nalMin="+nalMin;
	cad = cad +"&nMat="+nMat;
	
	cad = cad +"&pExt="+document.forma.txtPromExt.value;
	cad = cad +"&pNal="+document.forma.txtPromNal.value;
	cad = cad +cArray;
	
	$.download('getFileRTF.php',cad,"post");

}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////															Funciones para validar datos
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	esNatural
//input:	
//		strNumero			Referencia a una cadena
//Desc:
//		Verifica si una cadena es un numero natural
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function esNatural(strNumero){

	//para el caso que solo se tecleo un unmero o una letra
	if(strNumero.length==1){
		if((strNumero>='1')&&(strNumero<='9')) return true;
		else return false;
	}
	
	regexp = /^[0-9]+$/;
	return regexp.test(strNumero);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	esDecimal
//input:	
//		strNumero			Referencia a una cadena
//Desc:
//		Verifica si una cadena es un numero racional
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function esDecimal(strNumero){
	
	//var x = new String(strNumero);
	//para el caso que solo se tecleo un unmero o una letra
	if(strNumero.length==1){
		if((strNumero>='1')&&(strNumero<='9')) return true;
		else return false;
	}
	
	regexp = /^[0-9]*\.?[0-9]*$/;
		
	return regexp.test(strNumero);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	chTextoNumEsp
//input:	
//		txtF			Referencia al objeto que se validara sus campos
//Desc:
//		Verifiacmos si el texto tieen solo caracteres permitidos
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function chTextoNumEsp(txtF){
  	var i;
	var ch;
	var len;
	var s=txtF.value;
	
	for (len=s.length,i = 0; i < len; i++){
        ch = s.charAt(i);
        if(!((ch >= 'A' && ch <= 'Z')||(ch >= 'a' && ch <= 'z')||(ch >= '0' && ch <= '9')||(ch==' ')||(ch=='.')||(ch=='á')||(ch=='é')||(ch=='í')||(ch=='ó')||(ch=='ú')||(ch=='Á')||(ch=='É')||(ch=='Í')||(ch=='Ó')||(ch=='Ú')||(ch='ñ')||(ch='Ñ'))){
			txtF.value="";
			return false;
		}
      }
		
	txtF.value=txtF.value.toUpperCase();
	return true;
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:	
//			getNChar
//INPUT:
//			cad		:Referencia a una cadena
//			n			:Numero de caractes que queremos de la cadena
//DESC:
//		Obtiene los primeros n caracteres de una cadena, si la cadena es menor a n, regresa la cadena
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function  getNChar(cad,n){
	
	if(cad.length<=n) return cad;
	
	return cad.substring(0,n);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////															Funciones para limpiar
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	esNatural
//input:	
//		strNumero			Referencia a una cadena
//Desc:
//		Verifica si una cadena es un numero natural
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function clearForm(){
	document.forma.reset();
	var divTable = document.getElementById('dTable');
	if(!divTable) return;
	
	divTable.innerHTML = "";
	divTable.style.display="block";
	
}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	clearText
//input:	
//		objRef			Referencia al objeto que se validara sus campos
//Desc:
//		Elimina espacios en blanco al inicio y al final de la cadena, y si solo es un espacio lo quita de la cadena
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function clearText(objRef){
	objRef.value=objRef.value.replace(/^\s+/, "");
	objRef.value=objRef.value.replace(/\s+$/, "");
	
	if(objRef==" ") objRef.value="";
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	getVar
//input:	
//		
//Desc:
//		Obtiene los maximos y minimos de las calificaciones extranjeras y nacionales asi como el numero de casillas
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getVar(){
	
	
	//Obtenemos el calificacion externa minima
	clearText(document.forma.extMin);
	if(document.forma.extMin.value==""){
		document.forma.extMin.value="";
		document.forma.extMin.focus();
		alert1("Debe de introducir un rango de calificaciones estranjeras");
		return false;
	}
	if(!esDecimal(document.forma.extMin.value)){
		document.forma.extMin.value="";
		document.forma.extMin.focus();
		alert1("Debe de introducir un número entero positivo en la Calf mínima extranjera");
		return false;
	}
	else{
		extMin = parseFloat(document.forma.extMin.value);
	}

	//Obtenemos el calificacion externa maxima
	clearText(document.forma.extMax);
	//if((document.forma.extMax.value=="")||(document.forma.extMax.value=="0")){
	if(document.forma.extMax.value==""){
		document.forma.extMax.value="";
		document.forma.extMax.focus();
		alert1("Debe de introducir un rango de calificaciones extranjeras");
		return false;
	}
	if(!esDecimal(document.forma.extMax.value)){
		document.forma.extMax.value="";
		document.forma.extMax.focus();
		alert1("Debe de introducir un número entero positivo en la Calf máxima extranjera");
		return false;
	}
	else{
		extMax = parseFloat(document.forma.extMax.value);
	}

	//Obtenemos el calificacion nacional minima
	clearText(document.forma.nalMin);
	//if((document.forma.nalMin.value=="")||(document.forma.nalMin.value=="0")){
	if(document.forma.nalMin.value==""){
		document.forma.nalMin.value="";
		document.forma.nalMin.focus();
		alert1("Debe de introducir un rango de calificaciones nacionales");
		return false;
	}
	if(!esDecimal(document.forma.nalMin.value)){
		document.forma.nalMin.value="";
		document.forma.nalMin.focus();
		alert1("Debe de introducir un número entero positivo en la Calf mínima nacional");
		return false;
	}
	else{
		nalMin = parseFloat(document.forma.nalMin.value);
	}

	//Obtenemos el calificacion nacional maxima
	clearText(document.forma.nalMax);
	//if((document.forma.nalMax.value=="")||(document.forma.nalMax.value=="0")){
	if(document.forma.nalMax.value==""){
		document.forma.nalMax.value="";
		document.forma.nalMax.focus();
		alert1("Debe de introducir un rango de calificaciones nacionales");
		return false;
	}
	if(!esDecimal(document.forma.nalMax.value)){
		document.forma.nalMax.value="";
		document.forma.nalMax.focus();
		alert1("Debe de introducir un número entero positivo en la Calf máxima nacional");
		return false;
	}
	else{
		nalMax = parseFloat(document.forma.nalMax.value);
	}
	
	//Obtenemos el numero de materias y validamos el campo
	clearText(document.forma.txtNMat);
	//if((document.forma.txtNMat.value=="")||(document.forma.txtNMat.value=="0")){
	if(document.forma.txtNMat.value==""){
		document.forma.txtNMat.value="";
		document.forma.txtNMat.focus();
		alert1("Debe de introducir un número entero positivo en el número de materias");
		return false;
	}
	if(!esNatural(document.forma.txtNMat.value)){
		document.forma.txtNMat.value="";
		document.forma.txtNMat.focus();
		alert1("Debe de introducir un número entero positivo en el número de materias");
		return false;
	}
	else{
		nMat = parseInt(document.forma.txtNMat.value);
	}

	
	return true;
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	getName
//input:	
//		obj		: 		Referencia al bjeto input que tiene la el rango
//Desc:
//		Regresa una cadena con el nombre del campo y si es max, min nal o ext
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getName(obj){
	var name=obj.name
	if(name=="extMin"){
		return "Calf mínima extranjera";
	}
	
	if(name=="extMax"){
		return "Calf máxima extranjera";
	}
	
	if(name=="nalMax"){
		return "Calf máxima nacional";
	}
	
	if(name=="nalMin"){
		return "Calf mínima nacional";
	}
	
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	validField
//input:	
//		objInp			Referencia al objeto que se validara sus campos
//Desc:
//		Verificamos si los datos introducidos corresponden con el campo
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function validField(objInp){
	
	if(objInp==undefined) return false;
	
	var nameAux;
	
	//Validamos que sea un input text
	var type = objInp.type;
	if(type!="text") return false;
	
	var name=objInp.name;
	
	//Eliminamos espacios al inicio y al final del texto
	clearText(objInp);
	
	//Si no tiena nada el campo terminamos
	if(objInp.value=="") return false;
	
	
	//Para el campoo de la escuela
	if(name=="txtEscuela"){
		if(!chTextoNumEsp(objInp)){
			objInp.value="";
			alert1("Solo se aceptan caracteres permitidos en el campo escuela");
			
			return false;
		}
		return true;
	}
	
	//Para el campo del alumno
	if(name=="txtAlumno"){
		if(!chTextoNumEsp(objInp)){
			objInp.value="";
			alert1("Solo se aceptan caracteres permitidos en el campo alumno");
			
			return false;
		}
		return true;

	}
	
	//Para el campo del pais
	if(name=="txtPais"){
		if(!chTextoNumEsp(objInp)){
			objInp.value="";
			alert1("Solo se aceptan caracteres permitidos en el campo país");
			
			return false;
		}
		return true;
	}
	
	//Para el campo del pais
	if(name=="txtNivel"){
		if(!chTextoNumEsp(objInp)){
			objInp.value="";
			alert1("Solo se aceptan caracteres permitidos en el campo nivel de estudios");
			
			return false;
		}
		return true;
	}

	//Para los campos de calificaciones extranjeras
	if((name=="extMin")||(name=="extMax")){
		if(esDecimal(objInp.value)){

			if(document.forma.extMin.value==document.forma.extMax.value){
				objInp.value="";
				alert1("La calificación mínima y máxima extranjeras no pueden ser iguales");
				
				return false;
			}
						
			return true;
		}
		nameAux= getName(objInp);
		objInp.value="";
		alert1("Solo se aceptan números positivos en "+nameAux);
		
		return false;
	}
	
	//Para el caso de calificaciones nacionales
	if((name=="nalMax")||(name=="nalMin")){
		if(esDecimal(objInp.value)) return true;
		nameAux= getName(objInp);
		objInp.value="";
		alert1("Solo se aceptan números positivos en "+nameAux);
		
		return false;
	}
	
	//para el caso de numero de celdas o calificaciones
	if(name=="txtNMat"){
		if(esNatural(objInp.value)){
			var n = parseInt(objInp.value);
			if(n==0){
				objInp.value="";
				return false;
			}
			
			if(n>cNMat){
				objInp.value="";
				alert1("Solo se permite registrar " + cNMat + " calificaciones como máximo");
				
				objInp.focus();
				return false;
			}
			
			if((document.forma.extMin.value=="")||(document.forma.extMax.value=="")||(document.forma.nalMin.value=="")||(document.forma.nalMax.value=="")){
				objInp.value="";
				alert1("Debes de introducir primero todas las escalas");
				
				return false;
			}

			//creamos las tablas
			createTables(objInp.value);
			
			return true;
		}
		
		objInp.value="";
		alert1("Solo se aceptan números positivos en el número de materias");
		
		return false;
	}	
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	chField
//input:	
//		objField			Referencia al objeto que se validara sus campos
//Desc:
//		Verificamos si los datos introducidos corresponden con el campo
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function chField(objField){
	if(objField==undefined) return;
	
	if(!validField(objField)) objField.focus();
}
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	nextField
//input:	
//		obThis			Objeto donde se presiono la tecla
//		netObjch		nombre del objeto al que se tiene que mover
//Desc:
//		Utilizada para moverse entre casillas
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function nextField(e,obThis, nextObj){
	//capturamos la tecla presionada
	var k=null;
	(e.keyCode) ? k=e.keyCode : k=e.which;	

	if (k == "13"){
		//Validamos el campo
		if(!validField(obThis))	return;
		
		//Si no se presiono nada no hacemos nada
		if(obThis.value=="") return;
				
		//Pasamos a la siguiente casilla
		nextI = document.getElementById(nextObj);
		if(!nextI) return;
		nextI.focus();
	}
	
}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	validAllCalf
//input:	
//		
//Desc:
//		Valida que todas las calificaciones sean numeros y que que se realizo la conversion
//		Si es asi obtenemos los promedios
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function validAllCalf(){
	
	var i=0;
	var id;
	var cObj;
	var prom=0;
	

	//Bostenemos cada celda y convertimos los datos para verificarlos
	for(i=0; i<nMat; i++){
		id=i+1;
		cObj= document.getElementById('extMat'+id);
		if(!cObj) return false;

		if(!chCell(cObj)){
			alert1("Te hacen falta calificaciones por registrar");
			cObj.focus();
			return false;
		}
		
		prom +=parseFloat(cObj.value);
	}

	var cad;
	//Colocamos los promedios
	prom = prom/nMat;
	cad = new String(prom);
	document.forma.txtPromExt.value = getNCar(cad);
	
	//Calculamos el equivante, usando una aproximacion lineal y=mx+b
	cad = ((nalMax-nalMin)/(extMax-extMin))*(prom - extMax) + (nalMax);
	//document.forma.txtPromNal.value = getNCar(cad);
	
	//Nuevo redondeo 03 FEB 2015	
	if( cad >= 6.0 ){
		if( cad >= 6.9 && cad < 7 ){
			cad = 7;
		}else if( cad >= 7.9 && cad < 8 ){
			cad = 8;
		}else if( cad >= 8.9 && cad < 9 ){
			cad = 9;
		}else if( cad >= 9.9 && cad < 10 ){
			cad = 10;
		}
	
	}/*else{
		
	}*/
	
	/*//Redondeo de 2da decima 11 MAR 2015
	cad = new String(cad);
	var decimal1;
	var decimal2;
	decimal1 = cad.charAt(2);
	decimal2 = cad.charAt(3);
	if( decimal2 >= 6 ){
		decimal1++;
		decimal2 = 0;
	}else{
		decimal2 = 0;
	}
	
	var newcad;
	newcad = cad.charAt(0) + cad.charAt(1) + decimal1 + decimal2;
	newcad = new String(newcad);
	document.forma.txtPromNal.value = getNCarCorto(newcad);*/
	cad = new String(cad);
	//obtenemos los primeroS 3 caractEres
	//document.forma.txtPromNal.value = getNCar(cad);
	document.forma.txtPromNal.value = getNCarCorto(cad);
	
	return true;
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	getEqv
//input:
//
//Desc:
//		VErifica que todas las calificaciones se entregaron y genera las equivalencias
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function  getEqv(){
	
	if(!getVar()) return;
	
	validAllCalf();
	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	nextCell
//input:	
//		objInp		Objeto donde se presiono la tecla
//		id			Numero de calificacion
//Desc:
//		Utilizado para verificar la calificaion y si es correcta avanzar a la siguiente celda de la calificacion
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function nextCell(e,cObj, id){


	var k=null;
	(e.keyCode) ? k=e.keyCode : k=e.which;	

	if(k!="13") return false;

	//Checamos la celda
	if(!chCell(cObj)){
		return false;
	}

	//pasamos a la siguiente celda
	var name = cObj.name;
	var s =getNumName(name);


	//Calculamos promedio final si llegamos a la ultima celda
	if(nMat==s){	
		//Validamos todas las celdas y colocamos promedios
		validAllCalf();
		return true;
	}

	//Colocamos el cursor en la siguientre celda
	s++;
	var cad = "extMat"+s;
	cellT = document.getElementById('extMat'+s);
	if(!cellT) return false;
	cellT.focus();

	return true;
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	getNCar
//input:	
//		txt			cadena
//Desc:
//		Obtiene los primer 4 caracteres de una cedena
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getNCar(txt){
	var len = txt.length;
	
	if(len<=4) return txt;
	
	var res="";
	
	for(i=0; i<4 ;i++){
		c=txt.charAt(i); 
		res += c;
	}
		

	return parseFloat(res);
}

function getNCarCorto(txt){
	var len = txt.length;
	
	if(len<=3) return txt;
	
	var res="";
	
	for(i=0; i<3 ;i++){
		c=txt.charAt(i); 
		res += c;
	}
		

	return parseFloat(res);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	chRango
//input:	
//		objInp		Referencia al objeto input que contiene el dato
//Desc:
//		Verifica que la calificacion que se va convertir se no sea mañar a la calificacion maxima permitida
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function chRango(objInp){
	
	//Obtenemos los maximos y minumo
	if(!getVar()) return false;
	
	//Ya que existen todas las calificaciones calculamos promedios finales
	var calf = parseFloat(objInp.value);

	//primero verificamos si el maximo realmente es un maximo o un minimo
	//Para el caso de alemania
	//4 equivale a 6 en mexico
	//1 equivale a 10 en mexico
        if(extMax>extMin){
	   if((calf>=extMin)&&(calf<=extMax)) return true;
		else{
			if(calf<=extMin) return true;
			return false;
		}
	}
	else{
		if((calf>=extMax)&&(calf<=extMin)) return true;
		else{
			if(calf>=extMax) return true;
			return false;
		}
	}

	
	return false;
}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	getNumName
//input:	
//		txt			cadena de texto
//Desc:
//		separa la cadena y obtiene el numero que esta al final de esta
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getNumName(txt){
	var len=txt.length;
	var k=0;

	for(n=0; n<len; n++){
		c=txt.charAt(n)
		if(esNatural(c)){
			k = txt.substring(n, len);
			return parseInt(k);
		}
	}
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	chCell
//input:	
//		cObj			Referencia al objeto input de la calificacion extranjera
//Desc:
//		Verifica si el dato introducido es un numero valido, si es asi coloca el cursor en la siguente casilla de lo contrario 
//		muestra un mensaje indicando que no es un numero y debe de introducirlo nuevamente
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function chCell(cObj){

	if(!cObj) return false;

	//Obtenemos las variables globales
	if(!getVar()) return false;

	//Obtenemos el numero de la celda
	var name = cObj.name;
	var s =getNumName(name);

	//Lo colocamos en la ventana
	var lblT = document.getElementById('lblN'+s);
	if(!lblT) return false;

	//Limpiamos el numero
	lblT.innerHTML = "";
	lblT.style.display="block";

	//Eliminamos espacios
	clearText(cObj);
	
	if(cObj.value=="") return false;
	
	//Validamos que sea un numero valido
	if(!esDecimal(cObj.value)){
		cObj.value="";
		alert1("Solo se aceptan números positivos en las calificaciones");
		cObj.focus();
		return false;
	}
		
	//validamos que no sea mayor a la calificacion mayor extranjera
	if(!chRango(cObj)){
		cObj.value="";
		alert1("La calificación " + s +" no se encuentra dentro del rango");
		cObj.focus();
		return false;
	}
	
	
	
	//funto flotante
	//eliminamos ceros al inico del numero
	regexp = /^.*\..*$/;
	if(regexp.test(cObj.value)){
		//Solo se permiten 5 cifras de parte decimal
		cObj.value=parseFloat(cObj.value).toFixed(5);

		//eliminamos los ceros al inicio
		regexp = /^0*[1-9]*/;
		if(regexp.test(cObj.value)) cObj.value=cObj.value.replace(/^0*/, "");
		regexp = /^0*\./;
		if(regexp.test(cObj.value)) cObj.value=cObj.value.replace(/^0*/, "0");
		//eliminamos los ceros al final
		regexp = /0+$/;
		if(regexp.test(cObj.value)) cObj.value=cObj.value.replace(/0+$/, "");
		regexp = /\.0*$/;
		if(regexp.test(cObj.value)) cObj.value=cObj.value.replace(/\.0*$/, "\.0");
		regexp = /\.$/;
		if(regexp.test(cObj.value)) cObj.value=cObj.value.replace(/\.$/, "\.0");		
	}
	
	regexp = /^[0-9]+$/;
	if(regexp.test(cObj.value)){
		//eliminamos los ceros al inicio
		regexp = /^0*/;
		if(regexp.test(cObj.value)) cObj.value=cObj.value.replace(/^0*/, "");
	}
	
	//solo se permiten  cifras de parte entera
	if(parseFloat(cObj.value)>99999){
		cObj.value="";
		alert1("No se permiten calificaciones mayores a 100000");
		cObj.focus();
		return false;
	}
	
		
	//Calculamos el equivante, usando una aproximacion linel y=mx+b
	var eqv = ((nalMax-nalMin)/(extMax-extMin))*(parseFloat(cObj.value) - extMax) + nalMax;
	
	//Nuevo redondeo 3 FEB 2015
	if( eqv >= 6.0 ){
		if( eqv >= 6.9 && eqv < 7 ){
			eqv = 7;
		}else if( eqv >= 7.9 && eqv < 8 ){
			eqv = 8;
		}else if( eqv >= 8.9 && eqv < 9 ){
			eqv = 9;
		}else if( eqv >= 9.9 && eqv < 10 ){
			eqv = 10;
		}
	
	}else{
		
	}
	
	//obtenemos los primeros 4 caractres
	eqv= new String(eqv);
	eqv =getNCar(eqv);
	
	lblT.innerHTML = eqv;
	lblT.style.display="block";

	return true;
}

function numEXPREG(cObj){
	regexp = /....\...../;
	if(regexp.test(cObj.value)) return false;
	regexp = /^0$/;
	if(regexp.test(cObj.value)) return false;
	regexp = /^0\..?.?.?.?$/;
	if(regexp.test(cObj.value)) return true;
	regexp = /....\...../;
	if(regexp.test(cObj.value)) return false;
	regexp = /\..?.?.?.?$/;
	if(regexp.test(cObj.value)) return true;
	regexp = /\.[0-9]{4}?$/;
	if(regexp.test(cObj.value)) return true;
	regexp = /^[0-9]{4}/;
	if(regexp.test(cObj.value)) return false;
	regexp = /[0-9]{4}$/;
	if(regexp.test(cObj.value)) return false;
	return true;exit
	
}


function validarSS(e,cObj) {
    tecla = (document.all) ? e.keyCode : e.which;
	//Tecla de retroceso (para poder borrar)
	//y punto
    if ((tecla==8)||(tecla==0)) return true; 
	if(tecla==46){
		//Verificamos el numero ya tenga decimales
		regexp = /.?\..?/;
		if(regexp.test(cObj.value)) return false;
		else return true;
	}
    patron = /\d/; //Solo acepta números
    te = String.fromCharCode(tecla);
	if(patron.test(te)&&numEXPREG(cObj)) return true;
	else return false;
    return false;
} 







//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//															Creacion de las tablas dinamicas
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////








//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	createTables
//input:	
//		nRows			Numero de calificaciones que se registraran
//Desc:
//		Crea n renglones para introducir las calificaciones extrangeras que se convertiran a nacionales
//		las separa en columnas de 10 calificaciones
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function createTables(nRows){
	var nT;
	var fT;

	//Obtenemos la etiqueta div donde colocaremos las tablas
	divTable = document.getElementById('dTable');
	if(!divTable) return;

	//Numero de renglones de la tabla final
	var fT = nRows%10;
	var nT;
	

	//Numero de tablas de 10 renglones
	if(fT==0) nT = nRows/10;
	else nT = (nRows-fT)/10+1;

	var tTable;
	var cad;
	var id;
	var rows;
	var flag;
	
	//Para el caso de que sea mas de una tabla de 10 elementos
	tTable ="<center><table border=\"0\">";
	tTable +="<tr>";
	for(i=0; i<nT ;i++){
		//if(i==3){
		if(i%3==0){
			tTable +="</tr>";
			tTable +="<tr>";
		}
		tTable +="<td>";
		tTable +="<table border=\"0\" class=\"table\">";
		tTable +="<tr>";
		tTable +="<td>#</td>";
		tTable +="<td class=\"head1\">Calif. Ext.</td>";
		tTable +="<td>Calif. Nac.</td>";
		tTable +="</tr>";
		for(r=0; r<10 ;r++){
			id=i*10+r+1;
			cad="extMat"+id;
			tTable +="<tr>";
			tTable +="<td>"+id+"</td>";
			if((i+1)!=nT){
				tTable +="<td>"+"<input type=\"text\" style=\"text-align:center\" name=\""+cad+"\" id=\""+cad+"\" size=\"5\" onkeypress=\"return validarSS(event,this)\" onkeydown=\"nextCell(event,this,"+id+")\" onchange=\"chCell(this)\"/></td>";
			}
			else if(((i+1)==nT)&&(fT==0)) tTable +="<td>"+"<input style=\"text-align:center\" type=\"text\" name=\""+cad+"\" id=\""+cad+"\" size=\"5\" onkeypress=\"return validarSS(event,this)\" onkeydown=\"nextCell(event,this,"+id+")\"  onchange=\"chCell(this)\"/></td>";
			else if(r<fT) tTable +="<td>"+"<input type=\"text\"  style=\"text-align:center\" name=\""+cad+"\" id=\""+cad+"\" size=\"5\" onkeypress=\"return validarSS(event,this)\" onkeydown=\"nextCell(event,this,"+id+")\"  onchange=\"chCell(this)\"/></td>";
			else tTable +="<td></td>";	
			cad = "lblN"+id;
			tTable +="<td><center><label id=\""+cad+"\"  class=\"Estilo1\" ></label></center></td>";
			tTable +="</tr>";
		}
		tTable +="</table>";
		tTable +="</td>";
	}
	tTable +="</tr>";
	tTable +="</table></center>";
	
	//colocamos la tabla en el div
	divTable.innerHTML = tTable;
	divTable.style.display="block";
	divTable.style.display="block";
	divTable.style.display="block";
	
	
	var cellT = document.getElementById('extMat1');
	if(!cellT) return;
	
	cellT.focus();
}

