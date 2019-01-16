<?php

/*
This class ensures that the passed data is beeing selected from the database

All methods are build the same way:
-The SQL-Statement "SELECT" prepares the data
-After the preparation went right, the data will be executed for the user
*/

require_once '../core/init.php';

class DBSelect extends Database{

	public function __construct() {
		parent::__construct();
	}

	public function checkConfirmation($userID){
		$this->sql = "SELECT confirmed_mail FROM users where id = '$userID'";
		return $this->executeSelectSql($this->sql)[0]['confirmed_mail'];
	}

	public function checkUserAndPassword($email,$password){
		$this->sql = "SELECT id,email FROM users WHERE email = '$email' AND password = '$password' AND confirmed_mail = '1'";
		return $this->pdo->query($this->sql)->rowCount();
	}
	
	
	public function getUserID($email){
		$this->sql = "SELECT * FROM users where email = '$email'";
		return $this->executeSelectSql($this->sql)[0]['id'];
	}
	

	public function getUserProducts($userId){
		
		$this->sql = "SELECT * FROM user_products where user_id = '$userId'";
		return json_encode($this->executeSelectSql($this->sql));
	}
	
	
	public function getShopName(){
		$this->sql = "SELECT * FROM shop_names";
		return json_encode($this->executeSelectSql($this->sql));
	}
	
	
	public function getShopProducts($id) {
		$this->sql = "SELECT * FROM shop_products where shop_id = '$id'";
		return json_encode($this->executeSelectSql($this->sql));
	}
	

	public function getUserData($id){
		$this->sql = "SELECT * FROM users where id = '$id'";
		return json_encode($this->executeSelectSql($this->sql));
	}

	private function executeSelectSql($sql){
		try{
			$query = $this->pdo->query($sql);
			$values = $query->fetchAll(PDO::FETCH_ASSOC);
			return $values;
		}catch(PDOException $e){
			DatabaseConstants::errorMessage();
		}
	}
}
?>