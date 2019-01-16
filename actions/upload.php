<?php

/*
This module catches the image-upload requests from ajax
It handles:

-Storing the image on the server
-Changes the image-file name in unique
-Writes the image-file path into the database
*/

require_once '../core/init.php';

if(Input::exists($_SERVER['REQUEST_METHOD'])){

	if(!Input::areFieldsEmpty($_POST)){

		if(!Input::fileUpload($_FILES['file'])){
			$path = ActionUpload::UPLOAD_PATH.basename( $_FILES['file']['name']);
			$path_parts = pathinfo($path);
			$extension = $path_parts['extension'];	
			$dateTime = $timeMinutes = date('H:i:s');
			$date = date('Y-m-d');
			$newPath = ActionUpload::UPLOAD_PATH.$_POST['userId'].'_'.$date.'_'.$dateTime.'.'.$extension;

			if(move_uploaded_file($_FILES["file"]["tmp_name"], $newPath)){
				$dbUpdate = new DBUpdate();
				$horsePicture = ActionUpload::UPLOAD_PATH_STORAGE.$_POST['userId'].'_'.$date.'_'.$dateTime.'.'.$extension;
				$wasUploaded = $dbUpdate->updateUserPicture($_POST['userId'],$userPicture);

				if($wasUploaded){
					ActionUpload::uploadSucessfull();
				}
				else{
					ActionUpload::failedUploadDatabase();
				}
			}
			else{
				ActionUpload::failedUploadImage();
			}
		}
		else{
			ActionUpload::noFileFound();
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