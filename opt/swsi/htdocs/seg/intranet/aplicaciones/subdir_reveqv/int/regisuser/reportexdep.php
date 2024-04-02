<?php include_once ('security.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<script type="text/javascript" src="select_dependientes.js"></script>
<script language="javascript" type="text/javascript">
function validacion(formulario) {
	
	 //verifica si se selecciono una subdireccion
	 	 if (document.FormValidacion.idsubdir.selectedIndex== ""){ 
       alert("Debe seleccionar una subdireccion.") 
       document.FormValidacion.focus() 
       return false
       } 
         //comprueba que se seleccione un departamento
        	 if (document.getElementById('deptos').selectedIndex== 0){ 
       alert("Debe seleccionar un departamento.") 
       document.FormValidacion.focus() 
       return false
       } 
	   
	   	
	return true		
}
</script>
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
<H1>Seleccione la subdirecci&oacute;n y el Departamento para mostrar resultados</H1>
<a href="consulta.php"><img border=1 src="img/icono_regresar.gif"></a>
<form onsubmit="return validacion(this)" name="FormValidacion" action="nueva.php" method="POST">
<?php
function generaSubdir()
{
	include 'conexion.php';
	conectar();
	$consulta=mysql_query("SELECT IdSubdir, Nombre FROM subdirecciones");
	desconectar();

	// Voy imprimiendo el primer select compuesto por las subdirecciones
	
	echo "<select name='idsubdir' id='subdir' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Seleccione la subdirecci&oacute;n</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
	
}
?>

<div id="demo" style="width:600px;">
				<div id="demoDer">
                
			  <select disabled="disabled" name="iddepto" id="deptos">
						<option value="0">Seleccione el departamento...</option>
					</select>
	</div>
				<div id="demoIzq"><?php generaSubdir(); ?></div>
  </div>

<p><input type="submit" value="Enviar" /></p>
	
</form>



</body>
</html>
