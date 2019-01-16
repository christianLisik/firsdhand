<?php

/*
This class ensures that the passed data is beeing deleted from the database

All methods are build the same way:
-The SQL-Statement "DELETE" prepares the data
-After the preparation went right, the data will be executed for delete
*/

require_once '../core/init.php';

class DBDelete extends Database{

	public function __construct() {
		parent::__construct();
	}

	public function deleteUser($id){
		$this->sql = "DELETE FROM users WHERE id = '$id'";
		$this->executeDeleteSql($this->sql);
	}
	
	private function executeDeleteSql($sql,$oneToOneRelation){
		try{
			if(!$oneToOneRelation){
				$query = $this->pdo->query($sql);
				if($query->rowCount()>0){
					DatabaseConstants::successMessage();
				}
				else{
					DatabaseConstants::noResultMessage();
				}
			}
		}
		catch(PDOException $e){
			DatabaseConstants::errorMessage();
		}
	}
}
?>