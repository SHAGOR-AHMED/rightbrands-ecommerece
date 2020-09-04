<?php

	if(isset($_REQUEST['area']) && isset($_REQUEST['action'])){
		$targetpage = $_REQUEST['area'].'/'.$_REQUEST['action'].'.php';
		}
	else{
		@$targetpage = 'page'.'/'.'body.php';
		}


?>