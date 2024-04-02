<div id="main" class="ui-corner-bottom">
	<div id="title_usuario"><b>Usuario : <?php echo utf8_decode($_SESSION['nombre_completo']);?></b></div>
	<div id="btncerrarsesion" style="float:right;">Cerrar sesión</div>
	<?php
		if(isset($regresar)&&($regresar == "menu")){
	?>
	<div id="btnregresar" style="float:right;">Regresar</div>
	<?php
		}
	?>
	
	<?php
		if(isset($anterior)&&($anterior)){
	?>
	<div id="btnAnterior" style="float:right;">Versión Anterior</div>
	<?php
		}
	?>
</div>

<script>
$(function(){
	
	$("#btnAnterior").button({ icons: { primary: 'ui-icon ui-icon-arrowreturnthick-1-w' } });
	$("#btnregresar").button({ icons: { primary: 'ui-icon ui-icon-arrowreturnthick-1-w' } });
	$("#btncerrarsesion").button({ icons: { primary: 'ui-icon ui-icon-power' } });

	$('#btnregresar').click(function(event){ window.location = '../menu/index.php'; });	
	$('#btncerrarsesion').click(function(event){ window.location = '../template/logout.php'; });	
	$('#btnAnterior').click(function(event){ window.location = '../cert/eqv/eqv.php'; });	
		
});	
</script>
