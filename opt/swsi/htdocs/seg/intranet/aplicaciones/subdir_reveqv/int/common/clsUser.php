<?php
	
class clsUser{
		
	protected $host="dd";
	protected $user;
	protected $pass;
	protected $db;
	protected $link;

		
	public function __construct($hst = false, $pss = false, $usr = false, $dbn = false){
		global $CONFIG;
		
		$this->host = $hst ? $hst : $CONFIG->db1->host;
		$this->user = $usr ? $usr : $CONFIG->db1->user;
		$this->pass = $pss ? $pss : $CONFIG->db1->pass;
		$this->db = $dbn ? $dbn : $CONFIG->db1->db_name;
		
	}
		
	public function connect(){
				
		$this->link = mysql_connect($this->host, $this->user, $this->pass, true);
		if(!$this->link){
			return false;
		}
		
		if(!mysql_select_db($this->db, $this->link)){
			return false;
		}
		
		return true;
		
	}
	
	public function validUser($login, $pwd){
				
		$query = "
			SELECT u.idEmpleado, e.Nombre, e.Ap_Paterno, e.Ap_Materno, 
			u.usrname, u.password, u.user_conec, u.ip_user, u.user_activo 
			FROM cat_usuarios u, empleados e 
			WHERE u.IdEmpleado = e.IdEmpleado AND usrname = '$login'
		";
		
		$result = mysql_query($query, $this->link);
		
		if(mysql_num_rows($result)!=1){
			return false;
		}
		
		$row = mysql_fetch_object($result);
		
		if($row->password != md5($pwd)){
			return false;
		}
		
		$resp = (object)array(
			"idEmpleado" => $row->idEmpleado
			,"nombre_completo" => $row->Nombre." ".$row->Ap_Paterno." ".$row->Ap_Materno
		);
				
		return $resp;
		
	}
	
	public function updateIp($user, $ip){
	
		$date=getdate();
		$fecha = $date["year"]."-".$date["mon"]."-".$date["mday"];
				
		$query ="
			UPDATE cat_usuarios SET fecha_ult_acceso='$fecha', ip_user='$ip' WHERE usrname='$user'
		";

		if(!mysql_query($query, $this->link)){
			return false;
		}
		
		return true;

	}
	
	
	public function lstApp($idEmpleado){
		
		$query = "
			SELECT distinct (catsis.idsistema), catsis.nombre as nombre_sis
			,catsis.url , emp.IdEmpleado as No_emp, grupo.idgrupo as grupo 
			FROM cat_sistemas catsis, empleados emp, det_grupos_usr grupo
			, grupo_objs grObj 
			WHERE emp.IdEmpleado=grupo.IdEmpleado and grObj.idgrupo=grupo.idgrupo
			and grObj.idsistema = catsis.idsistema and catsis.status = 1 
			and grupo.IdEmpleado = $idEmpleado
		";
		
		$result = mysql_query($query, $this->link);
		
		$lst = [];
		$i = 0;
		while($row = mysql_fetch_object($result)){
			$lst[] = $row;
			$i++;
		}
		
		$resp = (object)array(
			"count" => $i
			,"app" => $lst
		);
				
		return $resp;
	}
}

?>
