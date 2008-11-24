<?php

if(isset($_SESSION['notice_type'])){
	if($_SESSION['notice_type']){
		$type="success";
	}else{
		$type="failure";
	}
?>
	<div id="notice" class="<?php echo $type ?>"><?php echo $_SESSION['notice_title'] ?></div>

<?php
	session_unregister('notice_type');
	session_unregister('notice_title');
}
?>