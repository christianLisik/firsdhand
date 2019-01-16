<?php

/*
This module controles if the confirmation mail of the user has got confirmed
-If yes: Show successfull Site
-If not: Show failure Site
*/

require_once '../core/init.php';

if(Input::exists($_SERVER['REQUEST_METHOD'])){
	
	$dbUpdate = new DBUpdate();
	$dbSelect = new DBSelect();
	$isConfirmationTrue = $dbSelect->checkConfirmation($_GET['ConfirmationId']);

	if($isConfirmationTrue){
		header(Action::failureSite());
	}
	else{
		$dbUpdate->updateConfirmation($_GET['ConfirmationId']);
		header(Action::successSite());
	}
}
else{
	header(Action::redirect());
	exit;	
}
?>
