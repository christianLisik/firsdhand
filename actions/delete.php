<?php

/*
This module catches the deleting-requests from ajax
It handles:

-Deleting the database entries ajax was requesting
*/

require_once '../core/init.php';

if(Input::exists($_SERVER['REQUEST_METHOD'])){
	$dbDelete = new DBDelete();

	switch($_POST['action']) {
		case ActionDelete::DELETE_USER_FROM_DB:
		$dbDelete->deleteUser($_POST['userID']);
		break;

		default: Action::wrongAction();
		break;
	}
}
else{
	header(Action::redirect());
	exit;
}
?>