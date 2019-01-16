<?php

/*
This class ensures that the passed data is beeing inserted into the database

All methods are build the same way:
-The SQL-Statement "INSERT" prepares the data
-After the preparation went right, the data will be inserted into the databse
*/


require_once '../core/init.php';

class DBInsert extends Database{

	public function __construct() {
		parent::__construct();
	}

	public function insertUser($email,$password){
		$this->sql = "INSERT INTO users (email,password) VALUES ('$email','$password')";
		$this->executeInsertSql($this->sql);
	}
	
	public function insertUserProduct($productName,$productUrl, $artNr,$user){
		$this->sql = "INSERT INTO user_products (product_name,art_nr,shop_name,shop_id,user_id,product_url) VALUES ('$productName','$artNr','mm24',1,'$user','$productUrl')";
		$this->executeInsertSql($this->sql);
		$lastID = $this->pdo->lastInsertId();
		echo $lastID;
	}

	private function executeInsertSql($sql,$oneToOneRelation){
		try{
			$this->pdo->query($sql);
			if(!$oneToOneRelation){
				DatabaseConstants::successMessage();
			}
		}
		catch(PDOException $e){
			DatabaseConstants::errorMessage();
		}
	}
}
?>