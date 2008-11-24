<?php
include_once("../includes/config.php");

if(!isset($_SESSION['server'])){
	echo '({"responseSuccess": "failure", "responseText": "Connection with server lost. Please log in again"})';
	exit();
}

$post_var_list = array(
	'command' => 'command'
);

//check for content, trim and crap-strip fields
while(list($var,$param) = @each($post_var_list)){
	if (!empty($_POST[$param]) && strlen(trim($_POST[$param]))){
		$_POST[$param]= strtolower(trim(addslashes($_POST[$param])));
	}else{
		 echo '({"responseSuccess": "failure", "responseText": "Invalid command"})';
	}
}

$rcon= new RCon($_SESSION['server'], $_SESSION['port'], $_SESSION['password']);
$success=$rcon ->authenticate();

echo '({"responseSuccess": "","responseText": '.json_encode($rcon->rconCommand($_POST['command'])).'})';

?>