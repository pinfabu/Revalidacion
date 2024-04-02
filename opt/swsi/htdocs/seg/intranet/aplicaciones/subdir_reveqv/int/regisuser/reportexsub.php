<?php include_once (´security.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>consulta subdirecciones</title>
<script type="text/javascript" src="showSubdir.js"></script>
</head>
<body>
<center>
<table>
  <tr>
  	<td>
  		<center><img src="img/unam.jpg" width="101" height="103" /></center>
  	</td>
    <td>
    	<table>
      		<tr>
            	<td align="center">
                	<strong>Universidad Nacional Aut&oacute;noma de M&eacute;xico </strong>
                </td>
            </tr>
      		<tr>
        		<td align="center">
                	<strong>Direcci&oacute;n General de Incorporaci&oacute;n y Revalidaci&oacute;n de Estudios</strong>
                </td>
      		</tr>
      		<tr>
            	<td align="center">
                	<strong>Subdirecci&oacute;n de C&oacute;mputo</strong>
                </td>
      		</tr>
    	</table>
    </td>
    <td>
    	<center><img src="img/dgire.gif" width="81" height="94" /></center>
    </td>
  </tr>
</table>
</center>
<p>&nbsp;</p>
Seleccione la subdirecci&oacute;n para mostrar resultados </ br>
<br />
<a href="consulta.php"><img border=1 src="img/icono_regresar.gif"></a>
<form>
<select name="idsub" onChange="showSubdir(this.value)">
<optgroup label="Subdireccion">
<option value="">Seleccione una subdireccion</option>
<option value = "1">1. Comp&uacute;to</option>
<option value = "2">2. Revalidaci&oacute;n y apoyo Acad&eacute;mico</option>
<option value = "3">3. Certificaci&oacute;n</option>
</optgroup>
</select>
	
</form>
<div id="txtHint"><b>Aqui abajo se mostrar&aacute;n los usuarios con la subdirecci&oacute;n seleccionada</b></div>

</body>
</html>

