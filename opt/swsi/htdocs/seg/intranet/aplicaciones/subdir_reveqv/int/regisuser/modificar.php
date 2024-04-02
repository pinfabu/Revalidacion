<?php include_once ('header.php'); include_once ('security.php');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


<title>Actualizar</title>
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>
<script type="text/javascript" src="validacion.js"></script>
<script type="text/javascript" src="lookup.js"></script>

<style type="text/css">
	body {
		font-family: Helvetica;
		font-size: 11px;
		color: #000;
	}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 30px;
		margin: 10px 0px 0px 0px;
		width: 200px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
</head>

<body>


<a href="bienvenida.php"><img border=0 src="img/icono_regresar.gif"></a>
<center>
<p align="left">&nbsp;</p>
<H3>"Si sabe el usuario por favor escr&iacute;balo"</H3>
<form onsubmit="return validacion(this)" name="FormValidacion" action="modif.php" method="POST">
<div>
		
			<div>
				
				<br />
				<input type="text" name="txtUsername" size="30" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
			</div>
			
			<div class="suggestionsBox" id="suggestions" style="display: none;">
				<img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
				</div>
			</div>
		
	</div>
        
<input name="enviar" type=submit value="enviar" />
</form>

<p>&nbsp;</p>


</center>


</body>
</html>
