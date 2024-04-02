//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Name:	esNatural
//input:	
//		strNumero			Referencia a una cadena
//Desc:
//		Verifica si una cadena es un numero natural
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function esNatural(strNumero){
	regexp = /^[0-9]*$/;
	return regexp.test(strNumero);
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
	
	//Si solo tiene un espacio lo eliminamos
	if(objRef==" ") objRef.value="";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		isDigit
//INPUT:
//		ch		:	Caracter
//OUTPUT:
//		bool	:	True si es un numero de lo contrario false
//DEC:
//		Funcion que valida si un caracte es un numero
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function isDigit(ch) {
   if (ch >= '0' && ch <= '9')
      return true;
   return false;
}









////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		isFecha
//INPUT:
//		s		:	string donde esta la cadena
//OUTPUT:
//		bool	:	True si es un numero decha valida de lo contrario false
//DEC:
//		Funcion que valida si la fecha tiene el formato solicitado
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function isFecha(s){
	
	var len= s.length;
	
	if(len==10){
		if(!isDigit(s.charAt(0))) return false;
		if(!isDigit(s.charAt(1))) return false;
		if(!isDigit(s.charAt(2))) return false;
		if(!isDigit(s.charAt(3))) return false;
		if(s.charAt(4)!='-') return false;
		if(!isDigit(s.charAt(5))) return false;
		if(!isDigit(s.charAt(6))) return false;
		if(s.charAt(7)!='-') return false;
		if(!isDigit(s.charAt(8))) return false;
		if(!isDigit(s.charAt(9))) return false;
		
		return true;
	}

	if(len==9){
		if(!isDigit(s.charAt(0))) return false;
		if(!isDigit(s.charAt(1))) return false;
		if(!isDigit(s.charAt(2))) return false;
		if(!isDigit(s.charAt(3))) return false;
		if(s.charAt(4)!='-') return false;
		if(!isDigit(s.charAt(5))) return false;
		
		if((s.charAt(6)!='-')&&(!isDigit(s.charAt(6)))){
		return false;
		}
		
		if(s.charAt(6)=='-'){
			if(!isDigit(s.charAt(7))){return false;}
			if(!isDigit(s.charAt(8))){ return false;}
			return true;
		}
		
		if(isDigit(s.charAt(6))){
			if(s.charAt(7)!='-'){return false;}
			if(!isDigit(s.charAt(8))){return false;}
			return true;		 
		}
		
		return false;
	}


	if(len==8){
		if(!isDigit(s.charAt(0))) return false;
		if(!isDigit(s.charAt(1))) return false;
		if(!isDigit(s.charAt(2))) return false;
		if(!isDigit(s.charAt(3))) return false;
		if(s.charAt(4)!='-') return false;
		if(!isDigit(s.charAt(5))) return false;
		if(s.charAt(6)!='-') return false;
		if(!isDigit(s.charAt(7))) return false;
		
		return true;
	}

	return false;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		checkFecha
//INPUT:
//		obj		:	referencia al objeto input que tiene la fecha
//DEC:
//		Valida si en un objeto input se a escrito una fecha valida
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function checkFecha(obj){
	
	//Eliminamos espacios en blanco
	clearText(obj);
	
	//validamos que tenga algo el campo
	//si no tiene nada ponemos en grsi aaaa-mm-dd
	if(obj.value==""){
		obj.value="aaaa-mm-dd";
		obj.style.color="#CCC";
		obj.focus();
		return;
	}
	
	//Validamos la fecha
	//si no es una fecha valida mandamos mensaje
	//ponemos en gris aaaa-mm-dd
	if(!isFecha(obj.value)){
		obj.value="aaaa-mm-dd"
		obj.style.color="#CCC";
		alert("El formato de la fecha debe de ser aaaa-mm-dd");
		obj.focus();
		return;
	}
	
	//Si es valida cambiamos el color de la fuente
	obj.style.color="#000";
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		changeFoco
//INPUT:
//		obj		:	referencia al objeto input que tiene la fecha
//DEC:
//		Funcion que se llama cuando el input de la fecha a perdido el foco, si no tiene nada, pone en gris el formato de la fecha
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function changeFoco(obj){
	if(obj.value==""){
		obj.value="aaaa-mm-dd";
		obj.style.color="#CCC";
		return;
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		pressKey
//INPUT:
//		obj		:	referencia al objeto input que tiene la fecha
//DEC:
//		Si se presiono una tecla sobre el input y este tiene "aaaa-mm-dd" lo borra y cambia el color de la letra a negro
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function pressKey(obj){
	
	//vaida que el texto del input se "aaaa-mm-dd"
	if(obj.value=="aaaa-mm-dd"){
		obj.value="";
		obj.style.color="#000";
		return;
	}
	
	obj.style.color="#000";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		objetoAjax
//DEC:
//		Funcion utilizada para crear un onjeto con el que realizas una conexion en segundo plano con el servidor
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		initPag
//DEC:
//		Funcion utilizada cargar los ultimos n folios de la tabla
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function initPag(){

	//Obtenemos el div donde se mostraran los folios 
	//document.forma.qFolios;
	var dvF = document.getElementById("qFolios");
	if(!dvF) return;
	
	//inicializamos las fechas
	initFecha();
	
	//Creamos el objeto de ajax
	ajax=objetoAjax();
	ajax.open("POST", "php/getFolios.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {

			dvF.innerHTML = ajax.responseText
			dvF.style.display="block";

		}
	}

	//muy importante este encabezado ya que hacemos uso de un formulario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	//Solicitamos los folios
	ajax.send();

}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		queryFolios
//DEC:
//		Funcion utilizada realizar una consulta de los folios
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function queryFolios(){
	
	//Obtenemos el div donde se mostraran los folios 
	var dvF = document.getElementById('qFolios');
	if(!dvF) return;
	
	//creamos la cadena en la que estab los datos que enviaremos
	var cad =strDataQuery();
	
	//Validamos la cadena
	if(!cad) return;
	
	//Creamos el objeto de ajax
	ajax=objetoAjax();
	ajax.open("POST", "php/consultas.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			dvF.innerHTML = ajax.responseText
			dvF.style.display="block";
		}
	}
	
	//muy importante este encabezado ya que hacemos uso de un formulario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	//Solicitamos los folios
	ajax.send(cad);
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		strDataQuery
//
//OUTPUT:
//		string		: string
//DEC:
//		Funcion que obtiene los datos que se enviaran a la servidor y los coloca en el formato para enviarse en una cadena
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function strDataQuery(){
	
	//Obtenemos los campos 
	cFolio1=document.forma.cFolio1.value;
	cFolio2=document.forma.cFolio2.value;
	cFecha1=document.forma.cFecha1.value;
	cFecha2=document.forma.cFecha2.value;
	cEstatus=document.forma.cEstatus.value;
	cDirigido=document.forma.cDirigido.value;
	cAsunto=document.forma.cAsunto.value;
	txtH=document.forma.cSol.value;
	if(cFecha1=="aaaa-mm-dd")cFecha1="";
	if(cFecha2=="aaaa-mm-dd")cFecha2="";
	
	//Validamos que tengamos algun dato de consulta
	if((cFolio1=="")&&(cFolio2=="")&&(cFecha1=="")&&(cFecha2=="")&&(cEstatus=="")&&(cDirigido=="")&&(cAsunto=="")&&(txtH==-1)){
		alert("No existen condiciones para realizar una busqueda");
		return false;
	}
	
	//Checamos que se selecciono algun nombre en solitante
	if(txtH==-1) txtH="";
	
	//Creamos la cadena con los datos que enviaremos
	cad = "cFolio1=" + cFolio1 + "&cFolio2=" + cFolio2 + "&cFecha1=" + cFecha1 + "&cFecha2=" + cFecha2 + "&cEstatus=" + cEstatus;
	cad = cad + "&cDirigido=" + cDirigido + "&cAsunto=" + cAsunto + "&txtH=" + txtH;

	return cad;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		validFieldInsert
//
//OUTPUT:
//		bool		: true si todos los campos son validos de lo contrario false
//DEC:
//		valida que los datos de los campos de insercion concuerden con el campo, de lo contrario manda una alerta y termina con false
//		si todo esta bien termina con true
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function validFieldInsert(){
	
	var cad=""
	//Validamos el campo de la fecha
	if(!isFecha(document.forma.txtFecha.value)){
		cad="Debes de poner una fecha valida\n";
	}
	
	//Quitamos espacios enblanco
	clearText(document.forma.txtEstatus);
	//Validamos el campo
	if(document.forma.txtEstatus.value==""){
		cad= cad + "Debes de poner un estatus\n";
	}
	
	//Quitamos espacios enblanco
	clearText(document.forma.txtDirigido);
	//Validamos el campo
	if(document.forma.txtDirigido.value==""){
		cad= cad + "Debes de poner algun destinatatio\n";
	}
	
	//Quitamos espacios enblanco
	clearText(document.forma.txtAsunto);
	//Validamos el campo
	if(document.forma.txtAsunto.value==""){
		cad= cad + "Debes de poner un Asunto\n";
	}

	//if(document.forma.slcSol.selectedIndex==0){
	if(document.forma.slcSol.value==-1){
		cad= cad + "Debes de seleccionar un solicitante\n";
	}
	
	if(cad!=""){
		alert(cad);
		return false;
	}

	return true;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		strDataInsert
//
//OUTPUT:
//		string		: string
//DEC:
//		Funcion que obtiene los datos que se enviaran al servidor para ser insertados
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function strDataInsert(){
						
	//Obtenemos los campos 
	txtFecha=document.forma.txtFecha.value;
	txtEstatus=document.forma.txtEstatus.value;
	txtDirigido=document.forma.txtDirigido.value;
	txtAsunto=document.forma.txtAsunto.value;
	txtH=document.forma.slcSol.value;
	if(txtFecha=="aaaa-mm-dd")txtFecha="";
	
	//Aqui deberiamos de comprobar los datos
	txtEstatus=txtEstatus.toUpperCase();
	txtDirigido=txtDirigido.toUpperCase();
	
	//Creamos la cadena con los datos que enviaremos
	cad = "txtFecha=" + txtFecha + "&txtEstatus=" + txtEstatus + "&txtDirigido=" + txtDirigido + "&txtAsunto=" + txtAsunto + "&txtH=" + txtH;
	
	return cad;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		strDataUpdate
//
//OUTPUT:
//		string		: string
//DEC:
//		Busca los checkbox seleccionados y obtiene el input relacionado a este y crea una cadena con el numero de registro a actualizar
//		el valor del estatus que se actualizara y crea una cadena de la siguiente forma #Folio|valor_de_estatus
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function strDataUpdate(){

	//obteenmos una lista de todos los chbox
	var chkb = document.forma.chkb;
	var cad="";
	var aux="";
	var errCad="";

	//Para el caso de que no existan checkbox
	if(!chkb) return;
	
	//Cuando solo hay un registro no tenemos un array
	//asi que tenemos que hacer la condicional para un solo caso
	else if(chkb.length==undefined){
		if(chkb){
			//Obtenemos los input del estatus a actualizar
			aux="txtFl"+chkb.id;
			aux=document.getElementById(aux);
			
			//Condicion para continuar o salir
			//ya que no me funciona el break para terminar el if
			if(aux){
				//quitamos espacios en blanco
				clearText(aux);
			
				//Validamos que no este vacio el campo
				if(aux.value==""){
					if(errCad=="") errCad="Debes de introducir algun dato en el estatus\n";
				}
			
				if(cad=="") cad="up"+chkb.id+"=" + chkb.id + "|" + aux.value; 
				else cad=cad + "&up"+chkb.id+"=" + chkb.id + "|" + aux.value; 
			}
		}
	}
	else {
	//Buscamos los checkbox seleccionados
	for(var i=0; i<chkb.length ;i++){
		if(chkb[i].checked==true){
			//Obtenemos los input del estatus a actualizar
			aux="txtFl"+chkb[i].id;
			aux=document.getElementById(aux);
			if(!aux) continue;
			
			//quitamos espacios en blanco
			clearText(aux);
			
			//Validamos que no este vacio el campo
			if(aux.value==""){
				if(errCad=="") errCad="Debes de introducir algun dato en el estatus\n";
				continue;
			}
			
			if(cad=="") cad="up"+chkb[i].id+"=" + chkb[i].id + "|" + aux.value; 
			else cad=cad + "&up"+chkb[i].id+"=" + chkb[i].id + "|" + aux.value; 
		}
	}
	}
	
	//si te nemos eerrores los mostramos y terminamos
	if(errCad!=""){
		alert(errCad);
		return false;
	}
	//Si tenemos cadena quiere decir que no hemos cambiado nada
	if(cad==""){
		alert("No hay folios a actualizar");
		return false;
	}
	
	//regresamos los datos en una cadena
	return cad;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		insertDatos
//
//DEC:
//		Manda los datos de un nuevo folio al archivo insertFolio.php para que este los inserte en la base de datos, una vez echo esto
//		muestra todos los folios que existen
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function insertDatos(){
	
	var dv= document.getElementById("lstFolio");
	if(dv==undefined){
		alert("Problemas");
		return;
	}
		
	//Validmos todos los campos de insercion
	if(!validFieldInsert())	return;

	//creamos la cadena en la que estab los datos que enviaremos
	var cad =strDataInsert();

	//Validamos la cadena
	if(!cad){
		alert("No  se pueden enviar los datos compruebelos");
		return;
	}
	
	//Creamos el objeto de ajax
	ajax=objetoAjax();
	ajax.open("POST", "php/insertFolio.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {		
			//dv.innerHTML = ajax.responseText
			//dv.style.display="block";
			document.forma.reset();	
			
			//llamamos a la funcion que muestra todos los folios
			initPag();
		}
	}
	

	//muy importante este encabezado ya que hacemos uso de un formulario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	//Solicitamos los folios
	ajax.send(cad);

}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		updateData
//
//DEC:
//		Manda los datos de los folios que se actualizaran al achivo updateFolio.php y l actualiza la ventana
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function updateData(){

	//creamos la cadena en la que estan los datos que enviaremos
	var cad =strDataUpdate();

	//Validamos la cadena
	if(!cad) return;
	
	//document.forma.qFolios;
	var dvF = document.getElementById("qFolios");
	if(!dvF) return;
			
	//Creamos el objeto de ajax
	ajax=objetoAjax();
	ajax.open("POST", "php/updateFolio.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {		
			//dvF.innerHTML = ajax.responseText
			//dvF.style.display="block";
			document.forma.reset();	
			//llamamos a la funcion que muestra todos los folios
			getLastQuery();
		}
	}
	

	//muy importante este encabezado ya que hacemos uso de un formulario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	//Solicitamos los folios
	ajax.send(cad);
	
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		getLastQuery
//
//DEC:
//		obtiene la ultima consuta que se realizo y la muestra en las consultas
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getLastQuery(){
	
	//document.forma.qFolios;
	var dvF = document.getElementById("qFolios");
	if(!dvF) return;
			
	//Creamos el objeto de ajax
	ajax=objetoAjax();
	ajax.open("POST", "php/lastQueryFolio.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {		
			dvF.innerHTML = ajax.responseText
			dvF.style.display="block";
		}
	}
	
	//muy importante este encabezado ya que hacemos uso de un formulario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	//Solicitamos los folios
	ajax.send();
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		viewInput
//
//OUTPUT:
//		obj		: objeto checkbox
//		lbl		: objeto label
//		inp		: objeto input 
//DEC:
//		Oculta una etiqueta y mustra un input para editarlo
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function viewInput(obj,lbl,inp){
	
	var txtInp = document.getElementById(inp);
	if(!txtInp) return;

	var lblObj = document.getElementById(lbl);
	if(!lblObj) return;

	if(obj.checked){
		txtInp.style.display='block';
		lblObj.style.display='none';
		txtInp.focus();
	}
	else{
		txtInp.style.display='none';
		lblObj.style.display='block';
	}

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		clearForm
//
//OUTPUT:
//
//DEC:
//		Utilizada para limpiar la forma e inicializar los campos de fecha
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function clearForm(){
	
	//Si existen input de estatus visibles los ocultamos
	var chkb = document.forma.chkb;
	var aux;
	
	if(chkb){
	//Para el caso cuando solo hya un checkbox
	//Cuando solo hay un registro no tenemos un array
	//asi que tenemos que hacer la condicional para un solo caso
	if(chkb.length==undefined){
		if(chkb){
			//Obtenemos los input del estatus a actualizar
			aux="txtFl"+chkb.id;
			aux=document.getElementById(aux);
			
			//Condicion para continuar o salir
			//ya que no me funciona el break para terminar el if
			if(aux){
				//quitamos espacios en blanco
				clearText(aux);
			
				//Validamos que no este vacio el campo
				if(aux.value==""){
					if(errCad=="") errCad="Debes de introducir algun dato en el estatus\n";
				}
			
				if(cad=="") cad="up"+chkb.id+"=" + chkb.id + "|" + aux.value; 
				else cad=cad + "&up"+chkb.id+"=" + chkb.id + "|" + aux.value; 
			}
		}
		//return;
	}

	if(chkb.length!=undefined)
	//Buscamos los checkbox seleccionados
	for(var i=0; i<chkb.length ;i++){
		if(chkb[i].checked==true){

			//lo deseleccionamos
			chkb[i].checked=false;
			
			//Obtenemos los input del estatus a actualizar
			aux="txtFl"+chkb[i].id;
			aux=document.getElementById(aux);
			if(!aux) continue;
			
			//lo ocultamos
			aux.style.display='none';
			
			//Obtenemos el label
			aux="fl"+chkb[i].id;
			aux=document.getElementById(aux);
			if(!aux) continue;
			
			//lo ocultamos
			aux.style.display='block';
		}
	}

	}
	document.forma.reset()
	initFecha();

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		initFecha
//
//OUTPUT:
//
//DEC:
//		Coloca en las casillas de la fecha, la fecha en color gris, debido a que el archivo calendar_db.js se encarga de manejar el calendario
//		es necesario modificar la funcion function "f_tcalShow", para que cuando se presione en el calendario se borre el fromato de la fecha
//		de lo contrario marcara error
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function initFecha(){
	//Obtenemos las casillas de fecha
	document.forma.txtFecha.value="aaaa-mm-dd";
	document.forma.cFecha1.value="aaaa-mm-dd";
	document.forma.cFecha2.value="aaaa-mm-dd";
	document.forma.txtFecha.style.color="#CCC";
	document.forma.cFecha1.style.color="#CCC";
	document.forma.cFecha2.style.color="#CCC";
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		checkFieldQuery
//
//OUTPUT:
//
//INPUT:
//		obj		: 	rferencia al objeto input que se validara
//DEC:
//		valida los campos de consulta, si los datos concuerdan con el cambio seleccionado
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function checkFieldQuery(obj){
	
	//validamos si existe el objeto
	if(!obj) return;
	
	
	//Validamos los campos de folio
	if((obj.name=="cFolio1")||(obj.name=="cFolio2")){
		//quitamos espacios en blanco
		clearText(obj);
		//validamos que sea un numero entero positivo
		if(!esNatural(obj.value)){
			obj.focus();
			alert("El folio debe de ser un numero entero positivo");
			obj.value="";
			obj.focus();
			return;
		}
		return;
	}
	
	//Los campos de fecha se validan
	
	//Los campos de Estatus, dirigido a y asunto pueden meter cualquier caracter, por lo que 
	//solo se elimina los espacios en blanco
	if((obj.name=="cEstatus")||(obj.name=="cDirigido")||(obj.name=="cAsunto")){
		//quitamos espacios en blanco
		clearText(obj);
		return;
	}
	
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		tabInsert
//
//DEC:
//		Funcion que se llama cunado se selecciona la pestaña insertar, y oculta el boton de consulta
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function tabInsert(){

	//Ocultamos el boton consultar
	document.forma.btnQuery.style.display="none";
	
	//Mostramos el boton insertar
	document.forma.btnNew.style.display="block";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		tabconsultar
//
//DEC:
//		Funcion que se llama cunado se selecciona la pestaña consultar y oculta el boton de insertar
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function tabConsultar(){
	//mostramos el boton consultar
	document.forma.btnQuery.style.display="block";
	
	//ocultamos el boton insertar
	document.forma.btnNew.style.display="none";
}