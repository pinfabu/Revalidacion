<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<LINK media=screen type=text/css rel=stylesheet href="estilos/style_document.css">
<script language="JavaScript" src="javascript/conexion.js"></script>
<script language="JavaScript" src="javascript/clock.js"></script>
<script>

/////////////////////////////////////////////////////////////////////
// Ocultamos el segundo input porque, ala parecer el evento enter no funciona con un solo input
/////////////////////////////////////////////////////////////////////
function ocultar(){
	document.getElementById("no").style.display="none";
}

//Redireccionamos a las estadisticas
function redirec(){
document.formPass.action="../../login/login.php"
document.formPass.submit();
}
	nextfield = "campo1";
	netscape = "";
	ver = navigator.appVersion; len = ver.length;
	for(iln = 0; iln < len; iln++) if (ver.charAt(iln) == "(") break;
	netscape = (ver.charAt(iln+1).toUpperCase() != "C");

	function keyDown(DnEvents) {
		k = (netscape) ? DnEvents.which : window.event.keyCode;
		if (k == 13) validarUsuario();
	}
	
	document.onkeydown = keyDown;
	
	if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
	
</script>
</head>
<body onload="startTimer(); ocultar();">
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
<form id="formPass" name="formPass" method="post">
<table border="0">
    <tr>
      <td>
      <fieldset>
      <table  border="0">
        <tr>
          <td><div align="right">Usuario:</div></td>
          <td>&nbsp;</td>
          <td>
              <div align="left"><input type="password" name="txtUsuario" id="txtUsuario" /></div>

          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
              <div id ="no" align="left"><input type="text" name="txtP" id="txtP" /></div>
          
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

<div id="casa" style="font-size:16pt; color:#cc3333; font-family:verdana,arial,helvetica; font-weight:bold;">
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<div id="reloj" style="font-size:18pt; color:#cc3333; font-family:verdana,arial,helvetica; font-weight:bold;">
</div>
<p align="center">&nbsp;</p>
<center><input name="btnEst" id="btnEst" type="button" value="Estadisticas" onclick="redirec()"/></center>
  
</form>

</div>
<p>&nbsp;</p>
</center>
</body>
</html>
