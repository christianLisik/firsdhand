<?php

/*
This class ensures that the passed data is beeing updated into the database

All methods are build the same way:
-The SQL-Statement "UPDATE" prepares the data
-After the preparation went right, the data will be executed into the database
*/

require_once '../core/init.php';

class DBUpdate extends Database{
	
	public function __construct(){
		parent::__construct();
	}

	public function updateConfirmation($userID){
		$this->sql = "UPDATE users set users.confirmed_mail = 1 WHERE users.id = '$userID'";
		$this->executeUpdateSql($this->sql);
	}

	public function updateUser($id, $name,$email,$dateOfBirth,$password,$orderPosition){
		$this->sql = "UPDATE users set name = '$name',email = '$email',date_of_birth = '$dateOfBirth',password = '$password',order_position = '$orderPosition' WHERE id = '$id'";
		$this->executeUpdateSql($this->sql);
	}

	private function executeUpdateSql($sql,$oneToOneRelation){
		try{
			$this->pdo->query($sql);
			if(!$oneToOneRelation){
				DatabaseConstants::successMessage();
			}
		}catch(PDOException $e){
			DatabaseConstants::errorMessage();
		}
	}
}
?>