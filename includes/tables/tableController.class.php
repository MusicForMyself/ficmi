<?php

/**
 * Class: tableController
 * In charge of every operation with the tables module
 * @see routes
 */
class tableController{

	//TODO: Remove global $con object, pass it as a parameter to the constructor
	
	private $tableData;
	private $pdo_con;
	private $error_handler;
	private $my_mustache;

	function __construct(){
		global $con, $error_handler, $mustache;
		//Initialize local connection instance
		$this->pdo_con = $con;
		$this->error_handler = $error_handler;
		$this->my_mustache = $mustache;
	}

	/**
	 * Gets the data from the database to populate a table
	 * @param  String  $tableName The name of the table in the database we want to retrieve
	 * @param  array   $exclude   Columns to exclude from results
	 * @param  integer $offset    Offset number to paginate results
	 * @return self             Method returns itself for chaining purposes
	 */
	function populateFromDB($tableName, $exclude = array(), $offset = 0){

		//TODO: Validate and sanitize tableName
		$stmt = $this->pdo_con->prepare("SELECT * FROM $tableName LIMIT 15 OFFSET ?");
	 	$stmt->bindParam( 1, $offset, PDO::PARAM_INT, 12);

		if ($stmt->execute()) {

			$this->tableData = $stmt->fetchAll(PDO::FETCH_OBJ);
			foreach ($this->tableData as $object) {
				foreach ($exclude as $value) {
					unset($object->{$value});
				}
			}
			return $this;
		}else {

			$this->error_handler->logError("Table population", "Error executing query", true);
		}
		return false;

	}

	function insertRow(){


		return $this;
	}

	function delete(){

	}

	function render(){
		// file_put_contents(
		// 					'/Users/maquilador8/Desktop/php.log', 
		// 					var_export($this->tableData, true), 
		// 					FILE_APPEND);
		

		$tmpl = $this->my_mustache->loadTemplate('contacts');
		echo $tmpl->render(array("title" => "This is not a title" ,"value" => "Hello World"));

		// echo $this->my_mustache->render('contacts', $this->tableData);
	}


}