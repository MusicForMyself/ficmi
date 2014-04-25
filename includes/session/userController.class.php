<?php

class userController {

	public registerUser(){

		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		if(checkForDuplicates($username)) {
			$err_handler->logError('User creation', 'There is a user with the same name already!', true);
			return;
		}

		$permissions = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

		if (strlen($password) != 128) {
			// The hashed pwd should be 128 characters long.
			// If it's not, something really odd has happened
			$err_handler->logError('User creation', 'Password is invalid or a threat', true);
		}

	}

	public checkForDuplicates($username){

		$prep_stmt = "SELECT id FROM gb_users WHERE username = ? LIMIT 1";
		$stmt = $mysqli->prepare($prep_stmt);
	 
		if ($stmt) {
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();
	 
			if ($stmt->num_rows == 1) {
				return true;
			}
		} else {
			$err_handler->logError('User creation', 'Database error', true);
		}
		return false;
	}


}