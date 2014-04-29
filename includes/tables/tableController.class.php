<?php

class tableController{

	//TODO: Remove global $con object, pass it as a parameter to the constructor

	function populateTable($tableName, $offset = 0){
		global $con, $error_handler;

		//Validate and sanitize tableName
		//
		$prep_stmt = "SELECT * FROM $tableName LIMIT 15 OFFSET ?";
		$stmt = $con->prepare($prep_stmt);
	 
		if ($stmt) {
			$stmt->bind_param('i', $offset);
			$stmt->execute();
			if($res = $stmt->get_result()){

				while( $row = $res->fetch_assoc()) {
					$rows[] = $row;
				}
			}
			

			$stmt->close(); 
			// $stmt->bind_result($id, $first_name, $last_name, $email, $phone, $type);

			
			// $combined = array_combine($id, $first_name);
	 		// $meta = $stmt->result_metadata();
	 		// $returnObject = new stdClass();
	 		// $returnObject->meta = $meta;
	 		// $returnObject->results = $row;
	 		file_put_contents(
	 							'/Users/maquilador8/Desktop/php.log', 
	 							var_export($rows, true), 
	 							FILE_APPEND);
	 		return $returnObject;
	 		//return object containig results
		} else {
			$error_handler->logError("Table population", "Error executing query, response: $con->error", true);
		}
		return false;

	}


}