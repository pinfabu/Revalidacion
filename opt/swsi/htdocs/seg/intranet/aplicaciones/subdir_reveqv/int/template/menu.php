<script>
	Ext.onReady(function() {
		new Ext.ux.Menu('simple-horizontal-menu', {
			transitionType: 'slide',
			direction: 'horizontal', // default
			delay: 0.2,              // default
			autoWidth: true,         // default
			transitionDuration: 0.5, // default
			animate: true,           // default
			currentClass: 'current', // default
			plain: true,
			});
		});
</script>
<?php
require_once("../common/clsPermsMenu.php");

function rec_menu($children){
	
	$archivo_actual = array_pop(explode('/', dirname($_SERVER['SCRIPT_NAME']))).'/'.basename($_SERVER['PHP_SELF']);
	
	
	$str = '';
	foreach($children as $elem){
		//echo $elem['idScript'].'<br>';
		if(!is_null($elem['idScript']) || isset($elem['children'])){
			//Open tag
			if(isset($elem['children'])){
				$str .= '<li>';
			}else{
				$str .= '<li>';
			}
			//Print title
			if($archivo_actual==$elem['pathScript']){
				
				$str .= '<a class="active" href="'.(is_null($elem['pathScript']) ? '#' : ('../'.$elem['pathScript'])).'"><img src="'.$elem['imgSource'].'" border="0"/>'.'&nbsp;&nbsp;'.$elem['tituloElemento'].' &nbsp;&nbsp;</a>';
				
			}elseif($archivo_actual!=$elem['pathScript']){
				
				$str .= '<a class="inactive" href="'.(is_null($elem['pathScript']) ? '#' : ('../'.$elem['pathScript'])).'"><img src="'.$elem['imgSource'].'" border="0"/>'.'&nbsp;&nbsp;'.$elem['tituloElemento'].' &nbsp;&nbsp;</a>';
			}
			
			//Print children
			if(isset($elem['children'])){
				$str .= "<ul>";
				
				$str .= rec_menu($elem['children']);
				//$str .= '<li><a class="inactive">Equivalencias</a></li>';
				$str .= "</ul>\n";
			}		
			//Close tag
			$str .= "</li>\n";
			
			
			
			
		}
		
	}#Fin del foreach
	
	return $str;
}
?>
<?php
if(isset($_SESSION['userInfo'])){ 
?>
<ul id="simple-horizontal-menu">

<?php
	if(!isset($dbConn)){
		$dbConn = new Perms();
	}
	
	$objMenu = $dbConn->getElementosMenu($_SESSION['userInfo']['idRol']);
	echo rec_menu($objMenu);
?>


</ul>

<?php } ?>