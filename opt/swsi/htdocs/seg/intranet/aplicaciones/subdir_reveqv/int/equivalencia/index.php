<?php

require_once '../common/security.php';

$regresar = "menu";


$anterior = true;


$rd = rand();
$aditionalHeader = <<<ADDHEAD
<script type="text/javascript" src="js/validate/jquery.bvalidator.js" ></script>
<link href="js/validate/themes/bvalidator.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/blockUI/jquery.blockUI.js" ></script> 
<script type="text/javascript" src="js/jquery.mask.min.js" ></script>
<script type="text/javascript" src="js/eqv.js?$rd" ></script>

ADDHEAD;

require_once '../template/header.php';
?>
<div id="permisos_memu">
<?php 
require_once '../template/banda.php';

?>
</div>
<div style="text-align: center;">
	<h3 style="Padding-left:15px; color:#2e82c4;">Equivalencia de calificaciones</h3>
</div>
<div style="margin-top:30px;">
<div id="formulario" name="formulario" method="post">

	<form id="frmData">
	<fieldset style="width:95%; margin-left:10px;" class="ui-widget-content ui-corner-all">
		<legend style="font-size:16px; font-weight:bold;">Datos de solicitud</legend>
		<table border="0" class="tabla_search" cellpadding="0" cellspacing="0" width="950">
			<tr id="trFolio">
				<td width="130">Folio trámite:</td>
				<td width="380">
					<input name="folio" type="text" id="folio" data-bvalidator="required" class="folio">
					<input name="code_arch" type="text" id="code_arch"style="display:none;">
				</td>
			</tr>
			<tr>
				<td width="180">Tipo de trámite:</td>
				<td width="500">
					<select id="tramite" name="tramite">
						<option value="0">Seleccione tipo de tramite</option>
						<option value="eqv">Equivalencia de promedio</option>
						<option value="sec">F-69 Secundaria</option>
						<option value="bach">F-69 Bachillerato</option>
						<option value="mov">Equivalencia de Calificaciones para Movilidad</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="180">Nombre de la escuela:</td>
				<td width="380"><input class="clsText" name="escuela" type="text" id="escuela"></td>
			</tr>
			<tr>
				<td width="180">Nombre del solicitante:</td>
				<td width="380"><input class="clsText" name="solicitante" type="text" id="solicitante"></td>
			</tr>
			<tr>
				<td width="180">Estado y/o país de origen de los estudios:</td>
				<td width="380"><input class="clsText" name="pais" type="text" id="pais"></td>
			</tr>
			<tr>
				<td width="180">Estudios realizados:</td>
				<td width="380"><input class="clsText" name="estudios" type="text" id="estudios"></td>
			</tr>
			<tr id="trEqv" style="display:none;">
				<td width="180">Tipo de equivalencia:</td>
				<td width="500">
					<select id="equivalencia" name="equivalencia">
					</select>
				</td>
			</tr>
			<tr id="trPer" style="display:none;">
				<td width="180">Periodo de estudios:</td>
				<td width="380">
					<input type="text" id="fecha1" name="fecha1" size="6" class="year"> a
					<input type="text" id="fecha2" name="fecha2" size="6" class="year">
				</td>
			</tr>
			
		</table>
	</fieldset>
	<br>
	<fieldset style="width:95%; margin-left:10px;" class="ui-widget-content ui-corner-all">
		<legend style=" font-weight:bold; font-size:16px;">Escala</legend>
		<table id="tMinMax" border="0" class="tabla_search" cellpadding="0" cellspacing="0" width="950">
			<tr>
            	<td colspan="2" style="text-align: center">Extranjera</td>
				<td></td>
				<td colspan="2" style="text-align: center">Nacional</td>
        	</tr>
			<tr>
				<td>Calf. mínima:</td>
				<td><input type="text" name="extMin" id="extMin" size="6" maxlength="6" class="numRng"/></td>
				<td></td>
          		<td>Calf. mínima:</td>
				<td><input type="text" name="nalMin" id="nalMin" value="6" size="6" maxlength="6" class="numRng"/></td>
			</tr>
			<tr>
				<td>Calf. máxima:</td>
				<td><input type="text" name="extMax" id="extMax" size="7" maxlength="7" class="numRng2"/></td>
				<td></td>
				<td>Calf. máxima:</td>
				<td><input type="text" name="nalMax" id="nalMax" value="10" size="6" maxlength="6" class="numRng"/></td>
			</tr>
		</table>
	</fieldset>
	</form>
	<br>
	<fieldset style="width:95%; margin-left:10px;" class="ui-widget-content ui-corner-all">
		<legend style=" font-weight:bold; font-size:16px;">Promedio</legend>
		<table id="tPromedios" border="0" class="tabla_search" cellpadding="0" cellspacing="0" width="950">
			<tr>
				<td width="110">Total de materias:</td>
				<td width="380"><input type="text" name="numMat" id="numMat" size="6" maxlength="3" class="numMat"></td>
			</tr>
			<tr>
				<td width="110">Promedio extranjero:</td>
				<td width="380"><input type="text" name="promExt" id="promExt" size="6" maxlength="6" disabled></td>
			</tr>
			<tr>
				<td width="110">Promedio nacional:</td>
				<td width="380"><input type="text" name="promNal" id="promNal" size="6" maxlength="6" disabled></td>
			</tr>
		</table>
    </fieldset>
	
	<br>
	
	<fieldset style="width:95%; margin-left:10px;" class="ui-widget-content ui-corner-all">
		<legend style=" font-weight:bold; font-size:16px;">Materias</legend>
		<br>
		
		<div id="lstCalif"></div>
		
		<br>
    </fieldset>
	
	<div id="ligas" style="display:none;">
	<fieldset style="width:95%; margin-left:10px;" class="ui-widget-content ui-corner-all" >
		<legend style=" font-weight:bold; font-size:16px;">Ligas</legend>
		<br>
		<a target="_blank" href="http://escolares.arq.unam.mx/movilidad/">http://escolares.arq.unam.mx/movilidad/</a>
		<br>
		<a target="_blank" href="http://escolares.quimica.unam.mx/dgire/cae_pass.php4">http://escolares.quimica.unam.mx/dgire/cae_pass.php4</a>

		<br>
    </fieldset>
	</div>
	
	

 
 
    <br>
	<div align="center">
		<button id="btnAceptar">Aceptar</button>
		<button id="btnFile">Descargar archivo</button>
		<button id="btnClear">Limpiar</button>
	</div>
	
	<br><br> 
</div>
   </div> 


<!--/***********OK*******************/ -->
<div id="ok" title="OK" class="ok" style="display:none;">
    <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
    A continuación será registrada la solicitud.</p>
    <p style="margin-left:20px;">Si está de acuerdo presionar <b>Registrar</b>.</p>
    <p style="margin-left:20px;">Para realizar alguna corrección seleccionar <b>Cancelar</p>
</div>
<!--/***********Fin de OK*******************/ -->

<!--/***********ERROR*******************/ -->
<div id="error" title="Error" class="error"></div>
<!--/***********FIN DE ERROR*******************/ -->

<!--/***********OK*******************/ -->
<div id="ok2" title="OK" class="ok2"></div>
<!--/***********Fin de OK*******************/ -->

<div id="modMessage" name="modMessage" title="Mensaje" class="ok2">
	<br>
	<div id="modMessage_msg">
	</div>
</div>

<div id="modClear" name="modClear" title="Mensaje" class="ok2">
	<br><div>¿Es&aacute; seguro que quiere limpiar el formulario?</div>
</div>

<?php
require_once '../template/footer.php';
?>
