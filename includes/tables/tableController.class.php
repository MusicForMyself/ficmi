<?php

class tableController{

	//TODO: Remove global $con object, pass it as a parameter to the constructor

	function populateTable($tableName, $offset = 0){
		global $con, $error_handler;

		//TODO: Validate and sanitize tableName

		$stmt = $con->prepare("SELECT * FROM $tableName LIMIT 15 OFFSET ?");
	 	$stmt->bindParam( 1, $offset, PDO::PARAM_INT, 12);

		if ($stmt->execute()) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
			
			// $stmt->bind_result($id, $first_name, $last_name, $email, $phone, $type);

			
			// $combined = array_combine($id, $first_name);
	 		// $meta = $stmt->result_metadata();
	 		// $returnObject = new stdClass();
	 		// $returnObject->meta = $meta;
	 		// $returnObject->results = $row;

	 		
	 		//return object containig results
		else {
			$error_handler->logError("Table population", "Error executing query", true);
		}
		return false;

	}


}