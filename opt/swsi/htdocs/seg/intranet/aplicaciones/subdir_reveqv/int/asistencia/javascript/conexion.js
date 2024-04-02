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
//		validarUsuario
//DES:
//		Función utilizada para calidar un usuario en segundo plano, le enviamos los datos al servidor y este responde si conoce o no
//		al usuario
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function validarUsuario(){
	
	d= document.getElementById('casa'); 
	if(!d){ 
		alert("Error J001: Error en la conexión intente nuevamente");
		return;
	}
	
	var user = document.formPass.txtUsuario.value;

	if(user==""){
		document.getElementById("casa").innerHTML="<p>Debes de introducir tu clave de empleado</p>";
		return;
	}
	
	ajax=objetoAjax();
	ajax.open("POST", "./conexion/validUser.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			var aux=ajax.responseText;
			//if(aux=="") alert("No recibio");
			document.getElementById("casa").innerHTML=aux;
			document.getElementById("casa").style.display="block";

			document.formPass.txtUsuario.value="";
			document.formPass.txtUsuario.select;
		}
	}

	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("clave="+user);

}