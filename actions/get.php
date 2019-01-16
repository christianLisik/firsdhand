<?php

/*
This module catches the getter-requests from ajax
It handles:

-Returning the information ajax was requesting
*/

require_once '../core/init.php';

if(Input::exists($_SERVER['REQUEST_METHOD'])){
	$dbSelect = new DBSelect();	

	switch($_POST['action']) {
			
		case ActionGet::GET_USER_ID:
		$userID = $dbSelect->getUserID($_POST['email']);
		Action::convertGetOutput($userID);
		break;
			
		case ActionGet::GET_USER_PRODUCTS:
		$userProducts = $dbSelect->getUserProducts($_POST['userId']);
		Action::convertGetOutput($userProducts);
		break;
			
		case ActionGet::GET_SHOPS_NAME: 		
		$shopsName = $dbSelect->getShopName();
		Action::convertGetOutput($shopsName);
		break;
			
		case ActionGet::GET_SHOP_PRODUCTS:
		$shopProducts = $dbSelect->getShopProducts($_POST['shopId']);
		Action::convertGetOutput($shopProducts);

		break;
			
		case ActionGet::GET_USER_DATA:
		$userData = $dbSelect->getUserData($_POST['userID']);
		Action::convertGetOutput($userData);
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