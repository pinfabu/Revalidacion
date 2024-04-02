<?php
	//incluimos el archivo que inserta folios
	if(!isset($_SESSION)) session_start();
	
	include_once "php/listas.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script language="JavaScript" src="javascript/calendar_db.js"></script>
<script language="JavaScript" src="javascript/table_function.js"></script>
<script language="JavaScript" src="javascript/jsc.js"></script>
<script language="JavaScript" src="SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="estilos/calendar.css">
<link rel="stylesheet" type="text/css" href="estilos/styles_table.css">
<link rel="stylesheet" type="text/css" href="estilos/css.css">

<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

<body onload="initPag(); tabInsert();">

<div id="header">
	<div id="logUNAM">
    	<center><img src="./logos/unam.gif" width="101" height="103" /></center>
    </div>
    <div id="txtHeader">
    	<p>Universidad Nacional Autónoma de México</p>
        <p>Dirección General de Incorporación y Revalidación de Estudios</p>
        <p>Subdirección de Revalidación y Apoyo Académico</p>
    </div>
    <div id="logDGIRE">
    	<center><img src="./logos/dgire.gif" width="101" height="103" /></center>
    </div>
</div>

<div id="body">
    <form name="forma" id="forma" method="post" action="folios.php">
    	<div id="tool">
        	<div id="btn6"><input name="btnSalir" type="button" value="Salir" onclick="document.location='./conexion/close_conec.php';"//></div>
        	<div id="btn3"><input name="btnClear" type="button" value="Limpiar" onclick="clearForm();"/></div>
        	<div id="btnB"><input name="btnSalir" type="button" value="Regresar" onclick="document.location='../../login/menu.php';"//></div>
	    </div>
    
    
    	<div id="TabbedPanels1" class="TabbedPanels">
        	<ul class="TabbedPanelsTabGroup">
            	<li class="TabbedPanelsTab" tabindex="0" onclick="tabInsert()">Insertar</li>
                <li class="TabbedPanelsTab" tabindex="0" onclick="tabConsultar()">Consultar</li>
            </ul>
            
            <div class="TabbedPanelsContentGroup">
            	<div class="TabbedPanelsContent">
                <div id="ss" align="center">  
  		            <div id="a">
        			   <label>Fecha</label><input type="text" name="txtFecha" id="txtFecha" onchange="checkFecha(this)" onKeyDown="pressKey(this)" onblur="changeFoco(this)"/>
					   <script language="JavaScript" type="text/javascript">new tcal ({'formname': 'forma','controlname': 'txtFecha'});</script>
        		    </div>
		            <div id="b">
        			    <label for="txtEstatus">Estatus</label><input type="text" name="txtEstatus" id="txtEstatus" />
		            </div>
        		    <div id="c">
			            <label>Dirigido a</label><input type="text" name="txtDirigido" id="txtDirigido" />
		            </div>
		            <div id="d">
        			    <label>Asunto</label><input type="text" name="txtAsunto" id="txtAsunto" />
		            </div>
        		    <div id="e">
            			<label>Solicitante</label>
		            	<select name="slcSol" id="slcSol">
        		    		<option value="-1"></option> 
            				<?php lstEmpleado();?>
		             	</select>
        		    </div>
                    </div>
                    <div id="btn1"><input name="btnNew" type="button" value="Insertar" onclick="insertDatos()"/></div>
     
				</div>
               	<div class="TabbedPanelsContent">
                	<div id="dvF">
 						<div id="cF1">
							<label>Del folio</label><input name="cFolio1" type="text" id="cFolio1" size="6" maxlength="6" onchange="checkFieldQuery(this)"/>
        		    	</div>
            			<div id="cF2">
							<label>al folio</label><input name="cFolio2" type="text" id="cFolio2" size="6" maxlength="6" onchange="checkFieldQuery(this)"/>
						</div>
					</div>
					<div id="dvFch">
						<div id="cFch1">
							<label>De la fecha</label><input name="cFecha1" type="text" id="cFecha1" size="10" maxlength="10" onchange="checkFecha(this)" onKeyDown="pressKey(this)" onblur="changeFoco(this)"/>
							<script language="JavaScript" type="text/javascript">new tcal ({'formname': 'forma','controlname': 'cFecha1'});</script>
						</div>
						<div id="cFch2">
							<label>a la fecha</label><input name="cFecha2" type="text" id="cFecha2" size="10" maxlength="10" onchange="checkFecha(this)" onKeyDown="pressKey(this)" onblur="changeFoco(this)"/>
							<script language="JavaScript" type="text/javascript">new tcal ({'formname': 'forma','controlname': 'cFecha2'});</script>
						</div>
					</div>
					<div id="dvEs">
						<label for="cEstatus">Estatus</label><input type="text" name="cEstatus" id="cEstatus" onchange="checkFieldQuery(this)"/>
					</div>
					<div id="dvDir">
						<label>Dirigido a</label><input type="text" name="cDirigido" id="cDirigido" onchange="checkFieldQuery(this)"/>
					</div>
					<div id="dvAs">
						<label>Asunto</label><input type="text" name="cAsunto" id="cAsunto" onchange="checkFieldQuery(this)"/>
					</div>
					<div id="dvSlc">
						<label>Solicitante</label>
						<select name="cSol" id="cSol">
							<option value="-1"></option> 
							<?php lstEmpleado();?>
						</select>
					</div>
                    <div id="btn5"><input name="btnQuery" type="button" value="Consultar" onclick="queryFolios()"/></div>
				</div>
                 
			</div>
		</div>
        <div id="lstFolio">
        	<fieldset>
            	<legend>Lista de folios</legend>
            	<div id="tool2">
                	<div id="btn2"><input name="btnReport" type="button" value="Reporte" onclick="document.location='php/createFileExcel.php';"/></div>
	                <div id="btn4"><input name="btnUp" type="button" value="Actualizar" onclick="updateData()"/></div>
                </div>

				<div id="qFolios">
				</div>
        	</fieldset>
        </div>
    </form>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
</body>
</html>
