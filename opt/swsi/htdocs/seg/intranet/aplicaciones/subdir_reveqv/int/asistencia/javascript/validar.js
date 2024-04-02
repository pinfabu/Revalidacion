///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		objetoAjax
//OUTPUT:
//		xmlhtttp	:	objeto activexobject o xmlhttprequest
//DES:
//		Referencia a un objeto activexobject o xmlhttpREquest según el navegador, con el que se pueden realizar transferencia de datos
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
//		initPag
//DES:
//		Función utilizada para mostrar las asistencias del dia de hoy
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function initPag(){

	//obtenemos el div que mostrara las asistencias
	var dvReg= document.getElementById('regAsig');
	if(!dvReg) return;
	
	//Obtenemos el objeto para transmitir los datos	
	ajax=objetoAjax();
	ajax.open("POST", "./php/initPag.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostramos en el div la tabla
			dvReg.innerHTML=ajax.responseText;
			dvReg.style.display="block";
		}
	}

	//Mandamos la peticion al servidor
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send();

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		getConsulta
//DES:
//		Función utilizada para enviar al servidor los datos de consulta
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getConsulta(){

	//obtenemos el div que mostrara las asistencias
	var dvReg= document.getElementById('regAsig');
	if(!dvReg) return;
	
	//Obtenemops la cadena de los datos para la consulta
	var cad = strDataQuery()
	
	//Validamos la cadena
	if(!cad) return;
	
	//Obtenemos el objeto para transmitir los datos	
	ajax=objetoAjax();
	ajax.open("POST", "php/consulta.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostramos en el div la tabla
			dvReg.innerHTML=ajax.responseText;
			dvReg.style.display="block";
		}
	}

	//Mandamos la peticion al servidor
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(cad);

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		strDataQuery
//DES:
//		Función para crear la cadena con los datos que se le enviaran al servidor para realizar la consulta
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function strDataQuery(){
	
	var cad="";
	
	//Obtenemos los datos
	txtNom=document.forma.txtNom;
	txtApPat=document.forma.txtApPat;
	txtApMat=document.forma.txtApMat;
	txtIni=document.forma.txtIni;
	txtFin=document.forma.txtFin;
	
	//Quitamos espacios en blanco
	clearText(txtNom);
	clearText(txtApPat)
	clearText(txtApMat);

	//Validamos fechas
	//txtIni
	//txtFin

	//Verificamos que tenemos datos para la consulta, si no es así mandamos error
	if((txtNom.value=="")&&(txtApPat.value=="")&&(txtApMat.value=="")&&(txtIni.value=="")&&(txtFin.value=="")){
		alert("No existen datos para la consulta");
		return false;
	}
	
	//Creamos la cadena que enviaremos al servidor
	cad = "txtNom="+txtNom.value+"&txtApPat="+txtApPat.value+"&txtApMat="+txtApMat.value+"&txtIni="+txtIni.value+"&txtFin="+txtFin.value;
	
	return cad;
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		chFecha
//INPUT:
//		txtF	:	Referencia al objeto que contiene el la fecha
//DES:
//		Función para validar el formato de la fecha
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function chFecha(txtF){
	
	clearText(txtF);
	
	var len=txtF.value.length;		
	var num;
	
	if(len==0) return;
	if(txtF.value==" "){
		txtF.value==""
		return;
	}		
	
	if((len!=10)&&(len!=8)&&(len!=9)){
		alert("FH00: Debes de introducir una fecha en formato: aaaa-mm-dd");
		txtF.value="";
		return;
	}
	
	if(!isFecha(txtF.value)){
		alert("FH01: Debes de introducir una fecha en formato: aaaa-mm-dd");
		txtF.value="";
		return;
	}


	num= parseInt(txtF.value.charAt(0)+txtF.value.charAt(1)+txtF.value.charAt(2)+txtF.value.charAt(3));

	if(2009>=num){
		alert("FH02: Debes de introducir una fecha en formato: aaaa-mm-dd");
		txtF.value="";
		return;
	}
	
	num= parseInt(txtF.value.charAt(5)+txtF.value.charAt(6));
	if(num<1||num>12){
		alert("FH03: Debes de introducir una fecha en formato: aaaa-mm-dd");
		txtF.value="";
		return;
	}
	
	num= parseInt(txtF.value.charAt(8)+txtF.value.charAt(9));
	if(num<1||num>31){
		alert("FH04: Debes de introducir una fecha en formato: aaaa-mm-dd");
		txtF.value="";
		return;
	}
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		clearText
//INPUT:
//		txtF	:	Referencia al objeto que tiene un texto
//DES:
//		Elimina los espacios en blanco al inicio y al final de la palabra
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function clearText(txtF){

	txtF.value=txtF.value.replace(/^\s+/, "");
	txtF.value=txtF.value.replace(/\s+$/, "");
	
	if(txtF.value==" ") txtF.value="";
}
