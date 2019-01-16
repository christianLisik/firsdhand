<?php

/*
This file includes all constats for the php scripts
*/

class DatabaseConstants{
	const DATABASE_NAME = "Consilium_Equorum";
	const DATABASE_SERVER = "81.169.212.180";
	const DATABASE_USER = "chris";
	const DATABASE_PASSWORD ="ultima001";
	
	const DATABASE_SUCCESS_MESSAGE = "true";
	const DATABASE_NO_REULT_MESSAGE = "No results";
	const DATABASE_ERROR_MESSAGE = "Failed preparing database request";

	public static function successMessage(){
		echo self::DATABASE_SUCCESS_MESSAGE;
	}
	
	public static function errorMessage(){
		echo self::DATABASE_ERROR_MESSAGE;
	}
	
	public static function noResultMessage(){
		echo self::DATABASE_NO_REULT_MESSAGE;
	}
}

class MailerConstants{
	const MAIL_SMTP = "mail.gmx.net";
	const MAIL_PORT = 587;
	const MAIL_USERNAME = "christian.lisik@gmx.net";
	const MAIL_SENDER = "Consilium Equorum";
	const MAIL_PASSWORD = "ultima001";
	const MAIL_SECURE = "tls";
	
	const MAIL_CONFIRMATION_URL = '../mailTemplates/confirmationMail.html';
	const MAIL_FORGOT_PASSWORD_URL = '../mailTemplates/forgotPwMail.html';
	const MAIL_REMINDER_NOTIFICATION_URL = '../mailTemplates/reminderNotificationMail.html';
	
	const MAIL_SUBJECT_CONFIRM_MAIL = 'Sie haben sich bei firsdhand registriert';
	const MAIL_SUBJECT_FORGOT_PW_MAIL = 'Sie haben ein neues Passwort beantragt';
	
	const MAIL_ALT_EMAIL_CONFIRM_TEXT = 'Bitte verfifizieren Sie Ihr Konto bei firsdhand: ';
	const MAIL_ALT_EMAIL_FORGOT_PW_TEXT = 'Sie haben ein neues Passwort beantragt ';
	
	const MAIL_ALT_EMAIL_CONFIRM_URL = 'https://h2795767.stratoserver.net/database/actions/confirm.php/?ConfirmationId=%id%';
	const MAIL_ALT_FORGOT_PW_URL = 'https://h2795767.stratoserver.net/';
}

class ActionSet{
	const SET_USER = "setUserIntoDB";
	const SET_USER_PRODUCT ="setUserProduct";
	
	const MAIL_SERVER_DOWN = "Server momentan nicht erreichbar. Versuchen Sie es später erneut";
	const EMAIL_ALREADY_EXISTS = "Email existiert bereits";
	
	public static function mailServerDown(){
		echo self::MAIL_SERVER_DOWN;
	}
	
	public static function emailAlreadyExists(){
		echo self::EMAIL_ALREADY_EXISTS;
	}
}

class Login{
	const SET_TIMER_COOKIE = 3600; //1h Lifetime Cookie	
}

class ActionLogin{
	const TRY_LOGIN = "tryLogin";
	const LOGIN_ALLOWED = "true";
	const FALSE_INPUT = "Bitte füllen sie alle felder aus";
	const LOGIN_DENIED = "Nutzername oder Passwort sind falsch";

	public static function falseInput(){
		echo self::FALSE_INPUT;
	}
	
	public static function loginDenied(){
		echo self::LOGIN_DENIED;
	}
	
	public static function loginAllowed(){
		echo self::LOGIN_ALLOWED;
	}
}

class ActionUpload{
	const UPLOAD_PATH = "../img/";
	const UPLOAD_PATH_STORAGE = "https://h2795767.stratoserver.net/database/img/";
	const UPLOAD_SUCCESS = "true";
	const UPLOAD_DATABASE_FAILED = "Upload to database failed";
	const UPLOAD_IMAGE_FAILED = "Failed uploading image";
	const UPLOAD_NO_IMAGE_FOUND = "Could not find image";

	public static function uploadSucessfull(){
		echo self::UPLOAD_SUCCESS;
	}

	public static function failedUploadDatabase(){
		echo self::UPLOAD_DATABASE_FAILED;
	}

	public static function failedUploadImage(){
		echo self::UPLOAD_IMAGE_FAILED;
	}
	
	public static function noFileFound(){
		echo self::UPLOAD_NO_IMAGE_FOUND;
	}
}

class ActionGet{
	const GET_USER_ID = "getUserID";
	const GET_USER_PRODUCTS = "getUserProducts";
	const GET_SHOPS_NAME = "getShops";
	const GET_SHOP_PRODUCTS = "getShopProducts";
	const GET_USER_DATA = "getUserData";
}

class ActionDelete{
	const DELETE_USER_FROM_DB = "deleteUserFromDB";
}

class ActionUpdate{	
	const UPDATE_USER = "updateUser";
	const UPDATE_FORGOT_PASSWORD = "updateForgotPassword";
}

class Action {
	const WRONG_ACTION = "Die Aktion war nicht erfolgreich. Versuchen Sie es später erneut";
	const FIELDS_MISSING = "Bitte befüllen Sie alle Felder";
	const FAILED_SENDING_MAIL = "Your Mail could not be send";
	const EMAIL_DOES_NOT_EXIST = "Your E-Mail does not exist";
	const REDIRECT_LINK = "Location: https://h2795767.stratoserver.net/loader/3/index.php";
	const SUCCESS_SITE = "Location: https://h2795767.stratoserver.net/database/mailTemplates/successSite.html";
	const FAILURE_SITE = "Location: https://h2795767.stratoserver.net/database/mailTemplates/failureSite.html";
	
	public static function wrongAction(){
		echo self::WRONG_ACTION;
	}
	
	public static function missingFields(){
		echo self::FIELDS_MISSING;
	}
	
	public static function failedSendingEmail(){
		echo self::FAILED_SENDING_MAIL;
	}

	public static function mailNotExisting(){
		echo self::EMAIL_DOES_NOT_EXIST;
	}
	
	public static function redirect(){
		return self::REDIRECT_LINK;
	}
	
	public static function successSite(){
		return self::SUCCESS_SITE;
	}
	
	public static function failureSite(){
		return self::FAILURE_SITE;
	}
	
	public static function convertLoginOutput($input){
		if($input){
			echo "true";
		}
		else{
			echo "undefined";
		}
	}
	
	public static function convertGetOutput($input){
		if(isset($input)){
			if((string)$input == '[]'){
				echo "No results found (Empty object)";	
			}else{
				echo $input;
			}
		}	
		else{
			echo "Could not resolve request (Wrong data)";
		}
	}
}
?>