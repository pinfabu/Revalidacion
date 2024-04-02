<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
<title>..:: SRAA-DGIRE ::..</title>
<link rel="stylesheet" type="text/css" href="../style/<?php 
$rd=rand();
$slashpos = strrpos($_SERVER['PHP_SELF'], "/");
$slashpos0 = strrpos($_SERVER['PHP_SELF'], '/', - strlen(basename($_SERVER['PHP_SELF'])) - 2);
echo substr($_SERVER['PHP_SELF'], (int) $slashpos0 + 1, (int) $slashpos - $slashpos0 -1);
?>.css?<?php echo $rd; ?>" />
<link rel="stylesheet" type="text/css" href="../style/main.css?<?php echo $rd; ?>" />

<!--THEMES-->
<link rel="stylesheet" href="../src/humanity/jquery-ui.css">
<!--FIN DE THEMES-->

<!--MENU-->
<link href="../style/menu.css" rel="stylesheet" />
<script src="../src/js/ext-core-debug.js"></script>
<script src="../src/js/menu.js"></script>
<!--FIN DE MENU-->

<script src="../src/js/jquery-1.7.2.js"></script>
<script src="../src/js/jquery-ui-1.8.21.js"></script>
<script src="../src/form/jquery.form.js"></script>

<?php echo  isset($aditionalHeader) ? $aditionalHeader : "" ?>
</head>
<body onLoad="location.reload">
<div id="mainWrapper">
	<div id="headWrapper" class="ui-corner-top">
		<div id="titulo2">Universidad Nacional</div>
		<div id="subtitulo2">Autónoma de México</div>
		<div id="titulo">Dirección General de Incorporación y Revalidación de Estudios</div>
		<div id="subtitulo">Subdirección de Revalidación y Apoyo Acadámico (SRAA)</div>
	</div>
<div id="contentWrapper">
<div id="headLine"></div>
