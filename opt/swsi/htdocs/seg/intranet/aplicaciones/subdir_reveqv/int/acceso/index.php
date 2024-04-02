<?php

session_start();
$_SESSION = array();
session_destroy();

$aditionalHeader = <<<ADHEAD
<script type="text/javascript" src="../src/blockUI/jquery.blockUI.js" ></script> 
<script type="text/javascript" src="../src/validate/jquery.bvalidator.js" ></script>
<link href="../src/validate/themes/bvalidator.css" rel="stylesheet" type="text/css" />

ADHEAD;
?>
<?php
require_once("../template/header.php");
?>

<!--<div style="position:absolute; padding-top:20px; padding-bottom:15px; border:solid 0px #009; width:580px; height:464px; text-align:center; background-image:url(../img/logotipo.png); background-repeat:no-repeat; background-position:center;">
</div> -->

<div id="divLogin" align="right">
   	<form id="frmLogin" name="frmLogin">
		<div class="ui-widget-header ui-corner-top" align="center" style="padding-top:10px; padding-bottom:10px; font-size:16px; ">Ingresar</div>
        
		<div class="ui-widget-content ui-corner-bottom" id="acces">
        	<table border="0" class="tabla_search" cellpadding="2" cellspacing="0">
				<tr><td align="right">Usuario&nbsp;:&nbsp;</td>
					<td><input type="text" name="txtLogin" id="txtLogin" maxlength="15" data-bvalidator="required"/></td></tr>
                <tr><td colspan="2" height="10"></td></tr>
				<tr><td align="right">Contraseña:&nbsp;</td>
					<td><input type="password" name="txtPwd" id="txtPwd" maxlength="15" data-bvalidator="required"/></td></tr>
				<tr><td colspan="2" align="right" height="25"><div id="lblLoginMsj"></div></td></tr>
				<tr><td colspan="2" align="right"><input type="submit" name="btnIngresar" id="btnIngresar" value="&nbsp;&nbsp;&nbsp;Ingresar" /></td></tr>
                <tr><td colspan="2" height="10"></td></tr>
			</table>
		</div>
	</form>
</div>

<script>
$(document).ready(function() {
	
	$("#btnIngresar").button();
	$("input:text").addClass("ui-corner-all ui-widget-content");
	$("input:password").addClass("ui-corner-all ui-widget-content");
	document.getElementById("txtLogin").focus();
	$('#frmLogin').bValidator();
	
});

var bValidatorOptions = {
		showCloseIcon: false,
        lang: 'hr',
        errorMessages: {
        	hr: { 'required': 'Campo obligatorio.' }
        }
    };

jQuery("#btnIngresar").click(function() {

	if($('#frmLogin').data('bValidator').isValid()){

		document.getElementById("lblLoginMsj").innerHTML="";
		$.blockUI({ theme: true, title: 'Precesando información',  message: '<table><tr><td valign=\"middle\" width=\"230\">Espere un momento . . .</td><td><img src=\"../img/loading.gif\" border=\"0\"></td></tr></table>' }); 

		$('#frmLogin').ajaxSubmit({
			url: 'login.php',
			dataType: 'json',
			type: 'POST',
			success: function(resp){
				if(resp.error){

					$('#lblLoginMsj').text(resp.message).addClass('error').show();
					$.unblockUI();
					$('#lblLoginMsj').fadeOut(4600, "linear");
					document.getElementById("txtLogin").focus();

				}else{

					$.blockUI({ theme: true, title: 'Acceso permitido',  message: '<table><tr><td valign=\"middle\" width=\"150\">'+resp.message+'</td><td><img src=\"../img/security-open.png\" border=\"0\"></td></tr></table>' });  
					setTimeout("window.location.href='../menu';",1000);

				}
			}
		});
	}
});
	
</script>
<?php  require_once("../template/footer.php"); ?>