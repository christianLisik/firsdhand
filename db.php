<?php

/*
This class is the mother-class for all the database requests in its child-classes
This class makes the connection to the database
*/

require_once 'classes/config.php';

class Database{

	protected $pdo,
	$sql,
	$query;

	public function __construct(){
		try{
			$this->pdo = new PDO('mysql:
			host='.DatabaseConstants::DATABASE_SERVER.';
			dbname='.DatabaseConstants::DATABASE_NAME.';',''.DatabaseConstants::DATABASE_USER.'',''.DatabaseConstants::DATABASE_PASSWORD .'');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			//die($e->getMessage());
			DatabaseConstants::errorMessage();
		}
	}
}
?>
