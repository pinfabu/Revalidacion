<?php
require_once "../common/permission.php"; 
$aditionalHeader = <<<ADDHEAD
ADDHEAD;
?>
<?php 
require_once '../template/header.php';
?>
<div id="permisos_memu">
<?php 
require_once '../template/banda.php';
require_once '../template/menu.php';
?>
</div>
<!--<div id="contentInicio"></div> -->
<?php
require_once '../template/footer.php';
?>