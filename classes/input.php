<?php

/*
This class handels the http methods "post" and "get".

This class handels three main-methods:

-Method "exits" --> Checks if any http method (post or get) is set
-Method "areFieldsEmpty" --> Checks if all the paremter are sended by the ajax request
-Method "fileUpload" --> Checks if user has uploaded a file
*/

class Input{

	public static function exists($type){
		switch($type){
			case 'POST':
			return (!empty($_POST)) ? true : false;
			break;

			case 'GET':
			return (!empty($_GET))  ? true : false;
			break;

			default:
			return false;
			break;
		}
	}

	public static function areFieldsEmpty($typeValues){
		foreach ($typeValues as $key => $value) {
			if(!isset($typeValues[$key])){
				return true;
			}
		}
		return false;
	}

	public static function fileUpload($file){
		if(!empty($file)){
			return false;
		}
		else{
			return true;
		}
	}
}
?>