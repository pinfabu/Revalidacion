<?php
	
	$db = new mysqli('localhost', 'desa01', 'd0rp3r!6D-','dgireprod' );
	
	if(!$db) {
		// si no se conecta manda el error
		echo 'ERROR: No se puede conectar con la base de datos.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			// Is the string length greater than 0?
			
			if(strlen($queryString) >0) {
				
				//si queristring = a mostrará a usuarios que empiecen con esa letra
				
				$query = $db->query("SELECT usrname FROM cat_usuarios WHERE usrname LIKE '$queryString%' LIMIT 10");
				if($query) {
				
					while ($result = $query ->fetch_object()) {
					
	         			echo '<li onClick="fill(\''.$result->usrname.'\');">'.$result->usrname.'</li>'; //aqui solo obtiene el resultado de la columna usrname que es el que nos interesa
	         		}
				} else {
					echo 'ERROR: problemas en realizar la consulta.';
				}
			} else {
				
			} // queryString.
		} else {
			
		}
	}
?>
