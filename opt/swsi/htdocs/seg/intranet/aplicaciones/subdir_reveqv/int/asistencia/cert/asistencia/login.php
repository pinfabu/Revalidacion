<?php
//Inicamos sesión si no existe 
if(!isset($_SESSION)) session_start();

//Guardamos una varaible con la fecha y hora que utilizaremos para encriptar el password
//cuando lo transfiramos al servidor
$_SESSION["t_parcial"]=md5(date("l dS of F Y h:i:s A"));		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script language="JavaScript" src="javascript/checkPass.js"></script>
<script language="JavaScript" src="javascript/md5.js"></script>
<script>
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
		var md5=hex_md5(md5_pre+"<?php echo md5($_SESSION["t_parcial"] .getenv("REMOTE_ADDR")); ?>");
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

	
	nextfield = "campo1";
	netscape = "";
	ver = navigator.appVersion; len = ver.length;
	for(iln = 0; iln < len; iln++) if (ver.charAt(iln) == "(") break;
	netscape = (ver.charAt(iln+1).toUpperCase() != "C");

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
	
	//le indicamos al navegador que se capturara el evento presionar tecla, por medio de la funcion keyDown
	document.onkeydown = keyDown;
	
	//Capturamos el evento
	if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
	
</script>
<LINK media=screen type=text/css rel=stylesheet href="estilos/style_document.css">
</head>
<body>
<center>

<div id="header">
	<div id="logUNAM">
    	<center><img src="./img/unam.gif" width="101" height="103" /></center>
    </div>
    <div id="txtHeader">
    	<p>REGISTRO DE ASISTENCIA</p>
        <p>PERSONAL ADMINISTRATIVO DE CONFIANZA</p>
        <p>SUBDIRECCIÓN DE CERTIFICACIÓN</p>
        <p>AÑO 2013</p>
    </div>
    <div id="logDGIRE">
    	<center><img src="./img/dgire.gif" width="101" height="103" /></center>
    </div>
</div>

<div id="body">

<form id="formPass" name="formPass" method="post" action="./conexion/create_conec.php">
<table border="0">
    <tr>
      <td>
      <fieldset>
      <table  border="0">
        <tr>
          <td><div align="right">Usuario:</div></td>
          <td>&nbsp;</td>
          <td>
              <div align="left"><input type="text" name="txtUsuario" id="txtUsuario" /></div>

          </td>
        </tr>
        <tr>
          <td><div align="right">Password:</div></td>
          <td>&nbsp;</td>
          <td>
              <div align="left"><input type="password" name="txtPassowrd" id="txtPassowrd" /></div>
          
          </td>
        </tr>
      </table>
      <p>
        <center><input name="btnAcep" id="btnAcep" type="button" value="Aceptar" onclick="validarUsuario()"/></center>
      </p>
      </fieldset>
      </td>
    </tr>
  </table>

<div id="casa">

</div>

<p align="center">&nbsp;</p>

<center><input name="btnEst" id="btnEst" type="button" value="Asistencias" onclick="redirec()"/></center>
</form>

</div>
<p>&nbsp;</p>
</center>
</body>
</html>