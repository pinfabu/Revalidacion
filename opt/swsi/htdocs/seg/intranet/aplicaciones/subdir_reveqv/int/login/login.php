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
<!-- Agregamos los estilos para la cabecera y pie de pagina -->
<LINK media=screen type=text/css rel=stylesheet href="header_tail/style/header.css">
<!-- Agregamos los estilos para la cabecera para el cuerpo -->
<LINK media=screen type=text/css rel=stylesheet href="estilos/screen.css">

<!-- Agregamos codigo javascrpt -->
<script language="JavaScript" src="javascript/checkPass.js"></script>
<script language="JavaScript" src="javascript/md5.js"></script>
<script language="JavaScript" src="javascript/load_param.js"></script>
<script>
var auxPass= "<?php echo md5($_SESSION["t_parcial"] .getenv("REMOTE_ADDR")); ?>";

</script>
<style type="text/css">
<!--
.Estilo4 {color: #FF0000}
input[type=text]:focus,input[type=password]:focus {
	background-color:#fbfbf2;
	border-color:#E1B715;
}
-->
</style>
</head>
<body onload="document.formPass.txtUsuario.focus();">
<!--Agregamos la cabecera-->
<?php include "header_tail/header.html"; ?>

<!-- Cuerpo de la pagina -->

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div id="dvbody">
	<div id="dvLogin">
    	<form name="formPass" id="formPass" method="post">
			<fieldset class="login">
				<legend>Usuario</legend>
				<div><label for="username">Login</label> <input id="txtUsuario" name="txtUsuario" type="text" selected></div>
				<div><label for="password">Password</label> <input id="txtPassowrd" name="txtPassowrd" type="password"></div>
			</fieldset>
   		 	<div id="dvButton" align="center">
	    		<input class="medium button blue" type="button" name="btnAceptar" id="btnAceptar" value="aceptar" onclick="validarUsuario()";/>
    	  </div>
	    </form>
        <div id="dvMsg">
	    </div>
    </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!--Agregamos el pie de pagina-->
<?php include "header_tail/tail.html";?>
</body>
</html>