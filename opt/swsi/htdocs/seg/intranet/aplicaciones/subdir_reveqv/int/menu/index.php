<?php
require_once '../common/security.php';
require_once '../common/config.php';
require_once '../common/clsUser.php';

$aditionalHeader = <<<ADDHEAD
ADDHEAD;

require_once '../template/header.php';
require_once '../template/banda.php';

$user = new clsUser();
if(!$user->connect()){
	//header('Location: ../');
	die("dfdf");
}

$data = $user->lstApp($_SESSION["idEmpleado"]);


?>
<br><br><br><br><br>
<div id="slcSistema">
	<div id="sisTitle">Sistemas</div>
   	<div id="lstSistemas">
	<?php 	
		foreach($data->app as $id => $val){	
			echo '<a href="'.$val->url.'?sis='.$val->idsistema.'"><div>'.utf8_decode($val->nombre_sis).'</div></a>';
		}
	?>

   	</div>
</div>
	

<?php
require_once '../template/footer.php';
?>
