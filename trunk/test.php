<?php
include_once("includes/config.php");
/*
$test='"hostname" = "FXHome Left4Dead 4-slot coop" ( def. "" ) - Hostname for server. ';

	function parseSetting($text){
		$text=eregi_replace('^(.*) \=\ "(.*)" \(.*\).*-(.*)','\\2', $text);
		return $text;
	}

echo parseSetting($test);
*/

$rcon= new RCon($_SESSION['server'], $_SESSION['port'], $_SESSION['password']);
$success=$rcon ->authenticate();

echo $rcon->rconCommand("status");

?>