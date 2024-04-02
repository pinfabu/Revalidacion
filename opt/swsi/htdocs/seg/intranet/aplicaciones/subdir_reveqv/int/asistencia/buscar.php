<?php

//Si no existe la sesión la inicializamoss
if(!isset($_SESSION)) session_start();

//Si no existe la variable user, quiere decir que el usuario no se logueado
//lo redireccionamos para que se logue
if(!isset($_SESSION["user"])){
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<script language="JavaScript" src="javascript/table_function.js"></script>
<script language="JavaScript" src="javascript/calendar_db.js"></script>
<script language="JavaScript" src="javascript/validar.js"></script>
<link rel="stylesheet" href="estilos/calendar.css">
<link rel="stylesheet" type="text/css" href="estilos/styles_table.css">
<LINK media=screen type=text/css rel=stylesheet href="estilos/style_document.css">
</head>
<body onload="initPag();">

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
 <center>
<form id="forma" name="forma" method="post" >

<table border="0">
  <tr>
    <td>
      <div Style="float:right;">
      <input type="button" name="btnSalir" id="btnSalir" value="Salir"  onclick="document.forma.action='../acceso'; document.forma.submit();"/>
      </div>
      <div Style="float:right;">
      <input type="button" name="btnBack" id="btnBack" value="Regresar"  onclick="document.location='../menu/index.php';"/>
      </div>
    </td>
  </tr>
  <tr>
    <td><fieldset>
    <legend>Buscar</legend>
    <table border="0">
      <tr>
        <td>&nbsp;</td>
        <td><fieldset>
        <legend>Por empleado</legend>
        <table border="0">
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input name="txtNom" type="text" id="txtNom" onChange="clearText(this)"/>
            </label>            </td>
            <td>&nbsp;</td>
            <td><label>
              <input type="text" name="txtApPat" id="txtApPat" onChange="clearText(this)"/>
            </label></td>
            <td>&nbsp;</td>
            <td><label>
              <input type="text" name="txtApMat" id="txtApMat" onChange="clearText(this)"/>
            </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center"><label>Nombre</label></div></td>
            <td>&nbsp;</td>
            <td><div align="center"><label>Apellido Paterno</label></div></td>
            <td>&nbsp;</td>
            <td><div align="center"><label>Apellido Materno</label></div></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        </fieldset>
        </td>
        <td>&nbsp;</td>
        <td><fieldset>
        <legend>Por fecha</legend>
        <table border="0">
          <tr>
            <td>&nbsp;</td>
            <td>
            <div align="left">
              <input name="txtIni" type="text" id="txtIni" onchange="chFecha(this)"  size="8" maxlength="10"/>
              <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'forma','controlname': 'txtIni'});</script>
            </div>           
            </td>
            <td>&nbsp;</td>
            <td><div align="left">
              <input name="txtFin" type="text" id="txtFin" size="10" onchange="chFecha(this)"/>
              <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'forma','controlname': 'txtFin'});</script>
            </div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center"><label>Fecha Inicio</label></div></td>
            <td>&nbsp;</td>
            <td><div align="center"><label>Fecha Fin</label></div></td>
            <td>&nbsp;</td>
          </tr>
        </table>

        </fieldset>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="right">
          <input type="button" name="btnBuscar" id="btnBuscar" value="Buscar" onclick="getConsulta()"/>
        </div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </fieldset>
    </td>
  </tr>
  <tr>
    <td><fieldset>
    <legend>Resultados</legend>
    <center>
    <table border="0">
      <tr>
        <td>
        
        <div id="regAsig">
        </div>
        
        </td>
      </tr>
      <tr>

        <td><div align="right"><input type="button" name="btnFile" id="btnFile" value="Descargar Archivo" onclick="document.location='./php/createFileExcel.php';"/></div></td>

      </tr>
    </table>
    </center>

    </fieldset>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</form>
</div>
</body>
</html>
