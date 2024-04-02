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
	
	//Obtenemos el div donde mostraremos los datos
	d= document.getElementById('casa'); 
	if(!d){ 
		alert("Error J001: Error en la conexión intente nuevamente");
		return;
	}

	//ncriptamos el  password para una transferencia segura
	var pass= encrypt();
	var user = document.formPass.txtUsuario.value;
	
	//obtenemos el objeto que permite la transferencia de información
	ajax=objetoAjax();
	ajax.open("POST", "./conexion/svalidUser.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//obtenemos la respuesta del server
			var aux=ajax.responseText;
			//mostramos la respuesra del server 
			document.getElementById("casa").innerHTML=aux;
			document.getElementById("casa").style.display="block";
			var si=document.getElementById('dato').value; 
			//si existe el usuario y concuerda el pasword, retransmitimos los datos y permtimos que 
			//el usuario se registre en el sistema
			if(si==0){
				document.formPass.txtPassowrd.value=encrypt();
				document.formPass.submit(); 
			}
			//De lo contrario mostramos el error indicado
			else if(si==2){
				d.innerHTML = "<center><p class=\"Estilo4\">Se ha detectado que ya existe una conexi&oacute;n con este usuario</p></center>";
				d.style.display="block";
			}
			else {
				d.innerHTML = "<center><p class=\"Estilo4\">Usuario o password incorrectos</p></center>";
				d.style.display="block";
			}
			document.formPass.txtPassowrd.value="";
			document.formPass.txtUsuario.value="";
		}
	}

	//envimos los datos del usuario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("user="+user+"&pass="+pass);

}