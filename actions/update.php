<?php

/*
This module catches the update-requests from ajax
It handles:

-Updating the fields in the database
-Handels procedure if user has forgotten his password
-Sends user a Mail with new password
*/

require_once '../core/init.php';

if(Input::exists($_SERVER['REQUEST_METHOD'])){
	$dbUpdate = new DBUpdate();
	$dbSelect = new DBSelect();	
	$sendMail = new Sendmail();

	switch($_POST['action']) {
		case ActionUpdate::UPDATE_USER:
		$dbUpdate->updateUser($_POST['userID'],$_POST['name'],$_POST['email'],$_POST['dateOfBirth'],md5($_POST['password']),$_POST['orderPosition']);
		break;

		case ActionUpdate::UPDATE_HORSE:	
		$dbUpdate->updateHorse($_POST['horseID'],$_POST['name'],$_POST['owner'],$_POST['race'],$_POST['dateOfBirth'],$_POST['sex'],$_POST['height'],$_POST['grower'],$_POST['type'],$_POST['userID'],$_POST['orderPosition']);
		break;

		case ActionUpdate::UPDATE_FORGOT_PASSWORD:	
		$userID = $dbSelect->getUserID($_POST['email']);
		
		if(!empty($userID)){
			$wasUpdatedPassword = $dbUpdate->updateForgotPassword($userID);

			if(!$wasUpdatedPassword){
				DatabaseConstants::errorMessage();
			}
			else{
				
				if($sendMail->checkSMTPServerStatus()){
					$wasSend=$sendMail->sendNewPassword($_POST['email'],$wasUpdatedPassword);

					if($wasSend){
						DatabaseConstants::successMessage();
					}
					else{
						Action::failedSendingEmail();
					}
				}
				else{
					ActionSet::mailServerDown();
				}
			}
		}
		else{
			Action::mailNotExisting();	
		}
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