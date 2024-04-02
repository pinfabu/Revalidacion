<?php
function conectar()
{
	mysql_connect("localhost", 'desa01', 'd0rp3r!6D-');
	mysql_select_db("dgireprod");
}

function desconectar()
{
	mysql_close();
}
?>