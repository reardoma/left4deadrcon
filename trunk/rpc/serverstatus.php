<?php
	include_once("../includes/config.php");
	
	if(isset($_SESSION['connected']) && $_SESSION['connected']){
		//find some status information
		$rcon= new RCon($_SESSION['server'], $_SESSION['port'], $_SESSION['password']);
		$rcon ->authenticate();
		$status=$rcon->getStatus();
				
		echo '({"ip": '.json_encode($status['ip']).', "hostname": '.json_encode($status['hostname']).', "map": '.json_encode($status['map']).', "difficulty": '.json_encode($status['difficulty']).', "players": '.json_encode($status['players']).' })';
		
	}
?>