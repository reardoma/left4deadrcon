<?php
function setNotice($title,$location="",$permanent=0){
	if(isset($_POST)){
		$_SESSION['form'] = $_POST;
	}
	$_SESSION['notice_type'] = 1;
	$_SESSION['notice_title']=$title;
	$_SESSION['notice_permanent']=$permanent;

	if(!empty($location)){
		header("Location: ".rtrim("http://".$_SERVER['HTTP_HOST'],"/").$location);
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
		header("Location: ".rtrim("http://".$_SERVER['HTTP_HOST'],"/").$location);
		exit();
	}
}
?>
