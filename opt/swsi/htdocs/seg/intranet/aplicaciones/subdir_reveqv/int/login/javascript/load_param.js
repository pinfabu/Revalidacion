//////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		encrypt
//OUTPUT:
//		md5		: string con el passsword encriptado con md5
//DESC:
//		Encripta el password del usuario con el algoritmo de md5
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function encrypt() {
	//Obtenemos el pasword del usuario y lo encriptamos con md5
	var md5_pre=hex_md5(document.formPass.txtPassowrd.value)
	//Le sumamos la fecha la ip del usuario al password encriptado y lo volvemos a encriptar
	/* t = t_parcial + IP cliente */
	//var md5=hex_md5(md5_pre+"<?php echo md5($_SESSION["t_parcial"] .getenv("REMOTE_ADDR")); ?>");
	var md5=hex_md5(md5_pre+auxPass);
	/* md5 es MD5_C */
	//pasword encriptado
	return md5;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		redirec
//DESC:
//		Función utilizada para redireccionar al usuario a la pagina de asistencia
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function redirec(){
	document.formPass.action="asistencia.php"
	document.formPass.submit();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//NAME:
//		keyDown
//DESC:
//		Función que captura el vento presionar tecla, si se presiona enter quiere decir que el usuario quiere
//		registrarse y nvia los datos para validar al usuario
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function keyDown(DnEvents) {
	k = (netscape) ? DnEvents.which : window.event.keyCode;
	if (k == 13) validarUsuario();
}



nextfield = "campo1";
netscape = "";
ver = navigator.appVersion; len = ver.length;
for(iln = 0; iln < len; iln++) if (ver.charAt(iln) == "(") break;
netscape = (ver.charAt(iln+1).toUpperCase() != "C");

//le indicamos al navegador que se capturara el evento presionar tecla, por medio de la funcion keyDown
document.onkeydown = keyDown;
	
//Capturamos el evento
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
	

