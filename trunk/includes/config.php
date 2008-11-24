<?php
	include_once("rcon.class.php");

	session_start();

	define("LIVE", 1);
	
	if(LIVE){
		//webroot
		define("ROOT_URL","http://rcon.xcesweb.com/");
	}else{
		//webroot
		define("ROOT_URL","http://rcommand.xcesweb.com/");
	}
	
	function setNotice($title,$location="",$permanent=0){
		if(isset($_POST)){
			$_SESSION['form'] = $_POST;
		}
		$_SESSION['notice_type'] = 1;
		$_SESSION['notice_title']=$title;
		$_SESSION['notice_permanent']=$permanent;

		if(!empty($location)){
			header("Location: ".rtrim(ROOT_URL,"/").$location);
			exit();
		}
	}
	
	function setError($title="An error occured",$location="",$permanent=0){
		if(isset($_POST)){
			$_SESSION['form'] = $_POST;
		}
		$_SESSION['notice_type'] = 0;
		$_SESSION['notice_title']=$title;
		$_SESSION['notice_permanent']=$permanent;

		if(!empty($location)){
			header("Location: ".rtrim(ROOT_URL,"/").$location);
			exit();
		}
	}

?>
