<?php

/*
This module catches the setter-requests from ajax
It handles:

-Writes the ajax-requets into the database
-Handels procedure of user registration
-Sends user a Mail to validate his E-Mail
*/

require_once '../core/init.php';

if(Input::exists($_SERVER['REQUEST_METHOD'])){
	
	if(!Input::areFieldsEmpty($_POST)){
		$dbInsert = new DBInsert();
		$dbSelect = new DBSelect();
		$sendMail = new Sendmail();

		switch($_POST['action']){
				
					
			case ActionSet::SET_USER:
			$userMail = $dbSelect->getUserID($_POST['email']);
				
			if(empty($userMail)){
				$dbInsert->insertUser($_POST['email'],md5($_POST['password']));
				$userID = $dbSelect->getUserID($_POST['email']);
			}
			else{
				ActionSet::emailAlreadyExists();
			}
			break;
			
			case ActionSet::SET_USER_PRODUCT:
				$dbInsert->insertUserProduct($_POST['productName'],$_POST['productUrl'], $_POST['artNr'],$_POST['user']);
			break;
			
			default: Action::wrongAction();
			break;
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
