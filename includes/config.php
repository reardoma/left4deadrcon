<?php
	include_once("rcon.class.php");

	session_start();

	define("ROOT_URL","http://l4dcommander.com/");
	
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
