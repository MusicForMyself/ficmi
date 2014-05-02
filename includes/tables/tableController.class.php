<?php

class tableController{

	//TODO: Remove global $con object, pass it as a parameter to the constructor
	
	private $tableData;
	private $pdo_con;
	private $error_handler;

	function __construct(){
		global $con,$error_handler;
		//Initialize local connection instance
		$this->pdo_con = $con;
		$this->error_handler = $error_handler;
	}

	function populateFromDB($tableName, $exclude = array(), $offset = 0){

		//TODO: Validate and sanitize tableName
		$stmt = $this->pdo_con->prepare("SELECT * FROM $tableName LIMIT 15 OFFSET ?");
	 	$stmt->bindParam( 1, $offset, PDO::PARAM_INT, 12);

		if ($stmt->execute()) {

			$this->tableData = $stmt->fetchAll(PDO::FETCH_OBJ);
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else {

			$this->error_handler->logError("Table population", "Error executing query", true);
		}
		return false;

	}

	function insertRow(){


		return $this;
	}

	function render(){


	}


}