<?php
include_once("../includes/config.php");

if(!isset($_SESSION['server'])){
	echo '({"command": "", "responseSuccess": "failure", "responseText": "Connection with server lost. Please log in again"})';
	exit();
}

//concat full command
$command="";

if (!empty($_POST['prefix']) && strlen(trim($_POST['prefix']))){
	$command.= trim(addslashes($_POST['prefix']))." ";
}

//check for content, trim and crap-strip fields
if (!empty($_POST['command']) && strlen(trim($_POST['command']))){
	$command.= trim(addslashes($_POST['command']));
}else{
	 echo '({"command": "", "responseSuccess": "failure", "responseText": "Invalid command"})';
}

$rcon= new RCon($_SESSION['server'], $_SESSION['port'], $_SESSION['password']);
$success=$rcon ->authenticate();

echo '({"command": '.json_encode($command).', "responseSuccess": "","responseText": '.json_encode($rcon->rconCommand($command)).'})';
?>