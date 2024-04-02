<?php
//Written by Dan Zarrella. Some additional tweaks provided by JP Honeywell
//pear excel package has support for fonts and formulas etc.. more complicated
//this is good for quick table dumps (deliverables)

$conn =  mysql_connect('localhost', 'desa01', 'd0rp3r!6D-');
if (!$conn) {
    die('No pudo conectarse: ' . mysql_error());
	echo 'error en la conexión';
	exit();
}
mysql_select_db("dgireprod", $conn);
$sql = "SELECT nombre, Ap_Paterno, Ap_Materno, usrname, email, idperfil, fecha_alta, fecha_ult_acceso, ip_user, user_conec, cat_usuarios.IdEmpleado
FROM cat_usuarios, empleados
WHERE cat_usuarios.IdEmpleado = empleados.IdEmpleado
GROUP BY cat_usuarios.IdEmpleado";

$result = mysql_query($sql);
$count = mysql_num_fields($result);
$header = "";
$data = "";
for ($i = 0; $i < $count; $i++){
    $header .= mysql_field_name($result, $i)."\t";
}

while($row = mysql_fetch_row($result)){
  $line = '';
  foreach($row as $value){
    if(!isset($value) || $value == ""){
      $value = "\t";
    }else{
# important to escape any quotes to preserve them in the data.
  $value = str_replace('"', '""', $value);
# needed to encapsulate data in quotes because some data might be multi line.
# the good news is that numbers remain numbers in Excel even though quoted.
      $value = '"' . $value . '"' . "\t";
    }
    $line .= $value;
  }
  $data .= trim($line)."\n";
}
# this line is needed because returns embedded in the data have "\r"
# and this looks like a "box character" in Excel
  $data = str_replace("\r", "", $data);


# Nice to let someone know that the search came up empty.
# Otherwise only the column name headers will be output to Excel.
if ($data == "") {
  $data = "\no se encontraron resultados con la opcion seleccionada\n";
}

# This line will stream the file to the user rather than spray it across the screen
header("Content-type: application/octet-stream");

# replace excelfile.xls with whatever you want the filename to default to
header("Content-Disposition: attachment; filename=usuarios.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo $header."\n".$data;
?>
