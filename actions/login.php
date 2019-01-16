<?php
/*
This module catches the login-request from ajax
It handles:

-Checking if user is existing and password is correct
-Starting sessions and cookie lifetime
-Handels procedure if user wants kept logged
*/
session_start();
require_once '../core/init.php';

if(Input::exists($_SERVER['REQUEST_METHOD'])){
	
	if(!Input::areFieldsEmpty($_POST)){
		
		if($_POST['action'] == ActionLogin::TRY_LOGIN){
			
			$dbSelect = new DBSelect();	
			$checkUserAndPassword = $dbSelect->checkUserAndPassword($_POST['email'],md5($_POST['password']));
			
			if($checkUserAndPassword>0){
				ActionLogin::loginAllowed();
				$userID = $dbSelect->getUserID($_POST['email']);
				$_SESSION['userid'] = $userID;
				
				if($_POST['keepLogged'] == 'true'){
					setcookie('userid', $userID, time() + Login::SET_TIMER_COOKIE, '/');
					$_COOKIE['userid'] = $userID;
				}
			}
			else{
				ActionLogin::loginDenied();
			}
		}
		else{
			Action::wrongAction();
		}
	}
	else{
		Action::missingFields();
	}
}
else{
	header(Action::redirect());
	exit;	
}
?>


