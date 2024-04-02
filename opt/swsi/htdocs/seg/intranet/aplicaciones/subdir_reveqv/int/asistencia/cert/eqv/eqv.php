<?php include "security.php"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Equivalencias</title>
<LINK media=screen href="css.css" type=text/css rel=stylesheet>

<script language="JavaScript" src="jsc.js"></script>
<script language="JavaScript" src="jquery.js"></script>
<script language="JavaScript" src="download.jquery.js"></script>
</head>
<body>
<div id="header">
	<div id="logUNAM">
    	<center><img src="./img/unam.gif" width="101" height="103" /></center>
    </div>
    <div id="txtHeader">
    	<p>Universidad Nacional Autónoma de México</p>
        <p>Dirección General de Incorporación y Revalidación de Estudios</p>
        <p>Subdirección de Revalidación y Apoyo Académico (SRAA)</p>
    </div>
    <div id="logDGIRE">
    	<center><img src="./img/dgire.gif" width="101" height="103" /></center>
    </div>
</div>
<div id="main">
<form id="forma" name="forma" action="post">
	<div id="dvTool">
		<div id="btnExit">
    		<input type="button" name="btnExit" id="btnExit" value="Salir" onclick="document.location='close_conec.php';"/>
    	</div>
    	<div id="btnBack">
    		<input type="button" name="btnBack" id="btnBack" value="Regresar" onclick="document.location='../../login/menu.php';"/>
    	</div>
    </div>
	<div id="dtAlumno">
  	  <fieldset>
  	  <legend>Datos del Alumno</legend>
		  <p><label>Nombre de la escuela: </label><input type="text" name="txtEscuela" id="txtEscuela" onchange="chField(this)" onKeyDown="nextField(event,this,'txtAlumno');"/></p>
          <p><label>Nombre del alumno: </label><input type="text" name="txtAlumno" id="txtAlumno" onchange="chField(this)" onKeyDown="nextField(event,this,'txtPais');"/></p>
          <p><label>País de origen de los estudios: </label><input type="text" name="txtPais" id="txtPais" onchange="chField(this)" onKeyDown="nextField(event,this,'txtNivel');"/></p>
          <p><label>Nivel de estudios: </label><input type="text" name="txtNivel" id="txtNivel" onchange="chField(this)" onKeyDown="nextField(event,this,'extMin');"/></p>
  	  </fieldset>
    </div>
    <div id="dtEscala">
    	<fieldset>
	 	<legend>Escala</legend>
        	<div id="ext">
            	<p>Extranjera</p>
                <p><label>Calf. miníma: </label><input name="extMin" type="text" id="extMin" size="6" maxlength="6" onchange="chField(this)" onKeyDown="nextField(event,this,'extMax');"/>
              </p>
          		<p><label>Calf. máxima: </label><input type="text" name="extMax" id="extMax" size="6" maxlength="6" onchange="chField(this)" onKeyDown="nextField(event,this,'txtNMat');"/></p>
        	</div>
            <div id="nal">
            	<p>Nacional</p>
              	<p><label>Calf. miníma: </label><input name="nalMin" type="text" id="nalMin" onchange="chField(this)" value="6" size="6" maxlength="6"/></p>
          		<p><label>Calf. máxima: </label><input name="nalMax" type="text" id="nalMax" onchange="chField(this)" value="10" size="6" maxlength="6"/></p>
        	</div>
	  	</fieldset>
    </div>
    <div id="dtPromedio">
    	<fieldset>
	 	<legend>Promedio</legend>
        	<div id="nMat">
            	<p><label>Total de materias: </label><input type="text" name="txtNMat" id="txtNMat" size="3" maxlength="3" onchange="chField(this)" onKeyDown="nextField(event,this,'extMat1');"/></p>
            </div>
            <div id="promExt">
            	<p><label>Promedio extranjero: </label><input type="text" name="txtPromExt" id="txtPromExt"/></p>
            </div>
            <div id="promNal">
                <p><label>Promedio nacional: </label><input type="text" name="txtPromNal" id="txtPromNal"/></p>
            </div>
	  	</fieldset>
    </div>
    <div id="dtMaterias">
    	<fieldset>
	 	<legend>Materias</legend>
        	<div id="dTable">
            </div>
  	  </fieldset>
    </div>
    <div id="dtButton">
    <center>
    	<input type="button" name="btnAcept" id="btnAcept" value="Aceptar" onclick="getEqv()"/>
        <input type="button" name="btnAcept" id="btnDown" value="Descargar archivo" onclick="downloadFile()"/>
        <input type="button" name="btnClear" id="btnClear" value="Limpiar" onclick="clearForm()"/>
        </center>
    </div>
</form>
  
</div>


</body>
</html>
