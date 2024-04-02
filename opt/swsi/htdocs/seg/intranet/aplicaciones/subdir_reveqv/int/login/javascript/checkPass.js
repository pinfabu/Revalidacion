///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		objetoAjax
//OUTPUT:
//		xmlhtttp	:	objeto activexobject o xmlhttprequest
//DES:
//		Referencia a un objeto activexobject o xmlhttpREquest seg�n el navegador, con el que se pueden realizar transferencia de datos
//		entre el cliente y el servidor en segundo plano
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		processXML
//INPUT:
//		docXML		:	Respuesta en formato xml
//		dvMsg		:	objeto donde se mostraran los mensajes
//OUTPUT
//		bool		: 	true no hay error, false existe error
//DES:
//		Se encarga de procesar la respuesta xml y mostrar los mensajes si existen
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function processXML(docXML,dvMsg){

	//IObtenemos la raiz de la respuesta XML
	var root= docXML.getElementsByTagName("respuesta")[0];

	//Verificamos is existe el error	

	var xError = root.getElementsByTagName("error")[0];//.getAttributeNode("num");
	if(xError!=null){
		//Obtenemos el mensaje
		xError = root.getElementsByTagName("error")[0].firstChild.nodeValue;		
		//mostramos el error
		dvMsg.innerHTML = "<center><p class=\"Estilo4\">"+acentos(xError)+"</p></center>";
		dvMsg.style.display="block";
		document.formPass.txtPassowrd.value="";
		document.formPass.txtUsuario.value="";
		document.formPass.txtUsuario.focus();
		return;
	}
	
	
	document.formPass.txtPassowrd.value=encrypt();
	document.formPass.action="./conexion/create_conec.php";
	document.formPass.submit(); 
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		validarUsuario
//DES:
//		Funci�n utilizada para calidar un usuario en segundo plano, le enviamos los datos al servidor y este responde si conoce o no
//		al usuario
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function validarUsuario(){
	
	//Obtenemos el div donde mostraremos los datos
	d= document.getElementById('dvMsg'); 
	if(!d){ 
		alert("Error J001: Error en la conexi�n intente nuevamente");
		return;
	}

	//ncriptamos el  password para una transferencia segura
	var pass= encrypt();
	var user = document.formPass.txtUsuario.value;
	
	//obtenemos el objeto que permite la transferencia de informaci�n
	ajax=objetoAjax();
	ajax.open("POST", "./conexion/validUser.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4){
			//obtenemos la respuesta del server
            //var aux=ajax.responseText;

			//mostramos la respuesra del server 
            //document.getElementById("dvMsg").innerHTML=aux;
            //document.getElementById("dvMsg").style.display="block";
			var z =ajax.responseXML;

			processXML(z,d);
		}
	}

	//envimos los datos del usuario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("user="+user+"&pass="+pass);

}



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
	x = x.replace(/¡/g,"\xA1");	x = x.replace(/&iexcl;/g,"\xA1");
	x = x.replace(/¿/g,"\xBF");	x = x.replace(/&iquest;/g,"\xBF");
	x = x.replace(/À/g,"\xC0");	x = x.replace(/&Agrave;/g,"\xC0");
	x = x.replace(/à/g,"\xE0");	x = x.replace(/&agrave;/g,"\xE0");
	x = x.replace(/Á/g,"\xC1");	x = x.replace(/&Aacute;/g,"\xC1");
	x = x.replace(/á/g,"\xE1");	x = x.replace(/&aacute;/g,"\xE1");
	x = x.replace(/Â/g,"\xC2");	x = x.replace(/&Acirc;/g,"\xC2");
	x = x.replace(/â/g,"\xE2");	x = x.replace(/&acirc;/g,"\xE2");
	x = x.replace(/Ã/g,"\xC3");	x = x.replace(/&Atilde;/g,"\xC3");
	x = x.replace(/ã/g,"\xE3");	x = x.replace(/&atilde;/g,"\xE3");
	x = x.replace(/Ä/g,"\xC4");	x = x.replace(/&Auml;/g,"\xC4");
	x = x.replace(/ä/g,"\xE4");	x = x.replace(/&auml;/g,"\xE4");
	x = x.replace(/Å/g,"\xC5");	x = x.replace(/&Aring;/g,"\xC5");
	x = x.replace(/å/g,"\xE5");	x = x.replace(/&aring;/g,"\xE5");
	x = x.replace(/Æ/g,"\xC6");	x = x.replace(/&AElig;/g,"\xC6");
	x = x.replace(/æ/g,"\xE6");	x = x.replace(/&aelig;/g,"\xE6");
	x = x.replace(/Ç/g,"\xC7");	x = x.replace(/&Ccedil;/g,"\xC7");
	x = x.replace(/ç/g,"\xE7");	x = x.replace(/&ccedil;/g,"\xE7");
	x = x.replace(/È/g,"\xC8");	x = x.replace(/&Egrave;/g,"\xC8");
	x = x.replace(/è/g,"\xE8");	x = x.replace(/&egrave;/g,"\xE8");
	x = x.replace(/É/g,"\xC9");	x = x.replace(/&Eacute;/g,"\xC9");
	x = x.replace(/é/g,"\xE9");	x = x.replace(/&eacute;/g,"\xE9");
	x = x.replace(/Ê/g,"\xCA");	x = x.replace(/&Ecirc;/g,"\xCA");
	x = x.replace(/ê/g,"\xEA");	x = x.replace(/&ecirc;/g,"\xEA");
	x = x.replace(/Ë/g,"\xCB");	x = x.replace(/&Euml;/g,"\xCB");
	x = x.replace(/ë/g,"\xEB");	x = x.replace(/&euml;/g,"\xEB");
	x = x.replace(/Ì/g,"\xCC");	x = x.replace(/&Igrave;/g,"\xCC");
	x = x.replace(/ì/g,"\xEC");	x = x.replace(/&igrave;/g,"\xEC");
	x = x.replace(/Í/g,"\xCD");	x = x.replace(/&Iacute;/g,"\xCD");
	x = x.replace(/í/g,"\xED");	x = x.replace(/&iacute;/g,"\xED");
	x = x.replace(/Î/g,"\xCE");	x = x.replace(/&Icirc;/g,"\xCE");
	x = x.replace(/î/g,"\xEE");	x = x.replace(/&icirc;/g,"\xEE");
	x = x.replace(/Ï/g,"\xCF");	x = x.replace(/&Iuml;/g,"\xCF");
	x = x.replace(/ï/g,"\xEF");	x = x.replace(/&iuml;/g,"\xEF");
	x = x.replace(/Ñ/g,"\xD1");	x = x.replace(/&Ntilde;/g,"\xD1");
	x = x.replace(/ñ/g,"\xF1");	x = x.replace(/&ntilde;/g,"\xF1");
	x = x.replace(/Ò/g,"\xD2");	x = x.replace(/&Ograve;/g,"\xD2");
	x = x.replace(/ò/g,"\xF2");	x = x.replace(/&ograve;/g,"\xF2");
	x = x.replace(/Ó/g,"\xD3");	x = x.replace(/&Oacute;/g,"\xD3");
	x = x.replace(/ó/g,"\xF3");	x = x.replace(/&oacute;/g,"\xF3");
	x = x.replace(/Ô/g,"\xD4");	x = x.replace(/&Ocirc;/g,"\xD4");
	x = x.replace(/ô/g,"\xF4");	x = x.replace(/&ocirc;/g,"\xF4");
	x = x.replace(/Õ/g,"\xD5");	x = x.replace(/&Otilde;/g,"\xD5");
	x = x.replace(/õ/g,"\xF5");	x = x.replace(/&otilde;/g,"\xF5");
	x = x.replace(/Ö/g,"\xD6");	x = x.replace(/&Ouml;/g,"\xD6");
	x = x.replace(/ö/g,"\xF6");	x = x.replace(/&ouml;/g,"\xF6");
	x = x.replace(/Ø/g,"\xD8");	x = x.replace(/&Oslash;/g,"\xD8");
	x = x.replace(/ø/g,"\xF8");	x = x.replace(/&oslash;/g,"\xF8");
	x = x.replace(/Ù/g,"\xD9");	x = x.replace(/&Ugrave;/g,"\xD9");
	x = x.replace(/ù/g,"\xF9");	x = x.replace(/&ugrave;/g,"\xF9");
	x = x.replace(/Ú/g,"\xDA");	x = x.replace(/&Uacute;/g,"\xDA");
	x = x.replace(/ú/g,"\xFA");	x = x.replace(/&uacute;/g,"\xFA");
	x = x.replace(/Û/g,"\xDB");	x = x.replace(/&Ucirc;/g,"\xDB");
	x = x.replace(/û/g,"\xFB");	x = x.replace(/&ucirc;/g,"\xFB");
	x = x.replace(/Ü/g,"\xDC");	x = x.replace(/&Uuml;/g,"\xDC");
	x = x.replace(/ü/g,"\xFC");	x = x.replace(/&uuml;/g,"\xFC");
	
	x = x.replace(/\"/g,"\x22");
	x = x.replace(/\'/g,"\x27");
	x = x.replace(/\</g,"\x3C");
	x = x.replace(/\>/g,"\x3E");
	x = x.replace(/\[/g,"\x5B");
	x = x.replace(/\]/g,"\x5D");

	x = x.replace(/¢/g,"\xA2");	x = x.replace(/&cent;/g,"\xA2");
	x = x.replace(/£/g,"\xA3");	x = x.replace(/&pound;/g,"\xA3");
	x = x.replace(//g,"\u20AC");	x = x.replace(/&euro;/g,"\u20AC");
	x = x.replace(/©/g,"\xA9");	x = x.replace(/&copy;/g,"\xA9");
	x = x.replace(/®/g,"\xAE");	x = x.replace(/&reg;/g,"\xAE"); 
	x = x.replace(/ª/g,"\xAA");	x = x.replace(/&ordf;/g,"\xAA"); 
	x = x.replace(/º/g,"\xBA");	x = x.replace(/&ordm;/g,"\xBA"); 
	x = x.replace(/°/g,"\xB0");	x = x.replace(/&deg;/g,"\xB0"); 
	x = x.replace(/±/g,"\xB1");	x = x.replace(/&plusmn;/g,"\xB1");
	x = x.replace(/×/g,"\xD7");	x = x.replace(/&times;/g,"\xD7") ;
	
		
	return x;
}

