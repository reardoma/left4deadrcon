<?php
	include_once("../includes/config.php");
	
	if(isset($_SESSION['connected']) && $_SESSION['connected']){
		//find some status information
		$rcon= new RCon($_SESSION['server'], $_SESSION['port'], $_SESSION['password']);
		$rcon ->authenticate();
		$status=$rcon->getStatus();		
								
		echo '({
			"ip": '.json_encode($status['ip']).',
			"hostname": '.json_encode($status['hostname']).',
			"map": '.json_encode($status['map']).',
			"difficulty": '.json_encode($status['difficulty']).',
			"players": '.json_encode($status['players']).',
			"playercount": '.$status['playercount'].',
			"playerinfo": [';
				for($i = 1; $i <= $status['playercount']; $i++){
					echo '{
						"id": '.json_encode($status['player'.$i]['id']).',
						"name": '.json_encode($status['player'.$i]["name"]).',
						"uniqid": '.json_encode($status['player'.$i]["uniqid"]).',
						"connected": '.json_encode($status['player'.$i]["connected"]).',
						"ping": '.json_encode($status['player'.$i]["ping"]).',
						"state": '.json_encode($status['player'.$i]["state"]).',
						"ip": '.json_encode($status['player'.$i]["ip"]).'
					}';
					if($i != $status['playercount']) echo ',';
				}

		echo '
			]
		})';
		
	}
?>