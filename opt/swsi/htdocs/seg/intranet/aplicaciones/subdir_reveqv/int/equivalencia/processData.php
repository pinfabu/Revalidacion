<?php
require_once "common_function.php";
require_once "../common/config.php";
require_once "rtf/Rtf.php";
require_once "../libs/phpoffice/bootstrap.php";


$opt = $_POST["opt"];

if($opt == "getIni"){
	
	$data = [];
	$i=0;
	foreach($lstConceptos as $id => $xConp){
		$data[] = array("value" => $id, "text" => $xConp["text"]);
		$i++;
	}
	
	$resp = array(
		"error" => 0
		,"cont" => $i
		,"data" => $data);
	
	die(json_encode($resp));
	
}

if($opt == "getFolio"){
	
	$dcnx = $CONFIG->db2;
	
	$folio = $_POST["folio"];
	
	$cnx = new mysqli($dcnx->host, $dcnx->user, $dcnx->pass, $dcnx->db_name);
	if ($cnx->connect_errno) {
		$resp = array(
			"error" => true
			,"msg" => "Error 1: No se pudo conectar al servidor comuniquese con el administrador"
			,"debug" => $cnx->connect_error );
		die(json_encode($resp));
	}
	

	$query = "
		select idSolicitud, IdFolio, code_arch, Nombre_sol
		, Ap_Paterno_sol, Ap_Materno_sol, IdTurnado, Fec_Recibe_Docs, Turnado
		from vw_solicitudes_vent where depto = 'rev' AND IdFolio = '$folio'";
	
	//s.vmfecingreso
	
	//die($query); 
	$resp = $cnx->query($query);
	if(!$resp){
		$resp = array(
			"error" => true
			,"msg" => "Error 2:No se pudo conectar al servidor comuniquese con el administrador"
			,"debug" => $cnx->errno . " " . $cnx->error );
		die(json_encode($resp));
	}
	
	$data = array();
	$row = $resp->fetch_object();
	$i = $resp->num_rows;
	$resp->close();
	mysqli_close($cnx);
	
	if($i==0){
		$resp = array(
			"error" => 0
			,"cont" => $i
			,"data" => null);
		
		die(json_encode($resp));
	}
	
	$mat = $row->Ap_Materno_sol != "" ? " ".$row->Ap_Materno_sol : "";
	$nombre_completo = $row->Nombre_sol." ".$row->Ap_Paterno_sol.$mat;
	
	$turnado = normaliza(utf8_encode($row->Turnado));
	//die($turnado);
	
	$lst = explode(" ", $turnado);

	$iniciales = "";
	foreach($lst as $l => $str){
		$iniciales .= $str[0];
	}
	
	if($row->IdTurnado != 18){
		$iniciales = strtolower($iniciales);
	}
	
	//print_r($row); exit;
	
	$data = (object)array(
		"idSolicitud" => $row->idSolicitud
		,"IdFolio" => $row->IdFolio
		,"code_arch" => $row->code_arch
		,"Fec_Recibe_Docs" => $row->Fec_Recibe_Docs
		,"nombre_completo" => utf8_encode($nombre_completo)
		,"turnado" => $turnado
		,"iniciales" => $iniciales
	);
	
	//print_r($data); exit;
	
	$resp = array(
		"error" => 0
		,"cont" => $i
		,"data" => $data);
	
	die(json_encode($resp));
	
}

if($opt == "getOficio"){
	//print_r('hola');
	$tramite = $_POST["tramite"];
	
	$eqv = create_equivalencia();
	
	if($tramite == "mov"){
				
		$resp = array(
			"error" => false
			,"equivalencia" => $eqv->file);
		
		die(json_encode($resp));
	
		
	}
	
	$oficio = "";
	
	switch($tramite){
		case "sec":
		case "bach":
		
			$oficio = create_oficio_f69();
			break;
		case "eqv":
			$oficio = create_oficio();
			break;
	}
	
	
	$resp = array(
		"error" => false
		,"oficio" => $oficio->file
		,"equivalencia" => $eqv->file);
	
	die(json_encode($resp));
	
}

?>
