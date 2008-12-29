<?php
include_once("../includes/config.php");

$post_var_list = array(
	'server' => 'server',
	'password' => 'password'
);

//check for content, trim and crap-strip fields
while(list($var,$param) = @each($post_var_list)){
	if (!empty($_POST[$param]) && strlen(trim($_POST[$param]))){
		$_POST[$param]= strtolower(trim(addslashes($_POST[$param])));
	}else{
		setError("Connection failed: invalid server/authentication details","../index.php");
	}
}

//find port from server post var
$serverInfo=explode(":",$_POST['server']);

if(count($serverInfo)<2 || strlen($serverInfo[1]) < 1){
	$port=27015;
}else{
	$port=$serverInfo[1];
}

$_SESSION['server']=$_POST['server'];
$_SESSION['port']=$port;
$_SESSION['password']=$_POST['password'];

$rcon= new RCon($_SESSION['server'], $_SESSION['port'], $_SESSION['password']);

//abort if no connection is possible at all
if($rcon->_Sock==null){
	setError("Connection failed: cannot connect to that server","../index.php");
}

//attempt to authenticate with rcon password
$success=$rcon ->authenticate();

if($success){
	$_SESSION['connected']=true;
	setNotice("Connection made","../index.php");
}else{
	$_SESSION['connected']=false;
	setError("Connection failed: incorrect rcon password","../index.php");
}

?>