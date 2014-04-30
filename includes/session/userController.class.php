<?php
/**
 * User controller
 * @package session
 */
class userController {

	// global $con, $error_handler;
	private $pdo_con;
	private $error_handler;

	function __construct($pdo_con, $error_handler){
		$this->pdo_con = $pdo_con;
		$this->error_handler = $error_handler;
	}

	/**
	 * Checks the database for duplicates before Insertion
	 *
	 * @see registerUser()
	 * @return 
	 */
	function checkForDuplicates($username){
		global $con;

		$stmt = $con->prepare("SELECT id FROM gb_users WHERE username = ? LIMIT 1");
	 	$stmt->bindParam(1, $username);

		if ($stmt->execute()) {

			// $stmt->store_result();

			if ($stmt->fetch(PDO::FETCH_NUM) == 1) {
				return true;
			}
		} else {
			$err_handler->logError('User creation', 'Database error', true);
		}
		return false;
	}

	/**
	 * Register a new user to the system using a form
	 * Ideally to be used with the prepared route named 'signup' by default
	 * @return 
	 */
	function registerUser(){
		global $con, $error_handler;
		$username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
		
		if($this::checkForDuplicates($username)) {
			$error_handler->logError('User creation', 'There is a user with the same name already!', true);
			return false;
		}

		$permissions = filter_input(INPUT_POST, 'permissions', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

		if (strlen($password) != 128) {
			// The hashed pwd should be 128 characters long.
			// If it's not, something really odd has happened
			$err_handler->logError('User creation', 'Password is invalid or a threat', true);
			return false;
		}

		// Create a random salt
		$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
		// Create salted password 
		$password = hash('sha512', $password . $random_salt);
 
		// Insert the new user into the database 
		$insert_stmt = $con->prepare("INSERT INTO gb_users (username, password, salt, permissions) VALUES (?, ?, ?, ?)");
		$insert_stmt->bindParam(1, $username, PDO::PARAM_STR, 12);
		$insert_stmt->bindParam(2, $password, PDO::PARAM_STR, 128);
		$insert_stmt->bindParam(3, $random_salt, PDO::PARAM_STR, 128);
		$insert_stmt->bindParam(4, $permissions, PDO::PARAM_STR, 12);

		if (! $insert_stmt->execute()) {
			$error_handler->logError('Insert error', 'There was a problem executing the query', true);
		}
		$error_handler->logError('Success', 'Successfully created new user', true);
		return true;

	}

	/**
	 * Login user to the system
	 * Ideally to be used with the prepared route named 'login' by default
	 * @return 
	 */
	function loginUser($username, $password){
		global $con, $error_handler;

		$stmt = $con->prepare("SELECT id, username, password, salt 
									FROM gb_users
										WHERE username = ?
										LIMIT 1");

		$stmt->bindParam(1, $username, PDO::PARAM_STR, 12);

		if($stmt->execute()){
	 
			// get variables from result.
			$stmt->bindColumn( 1, $user_id);
			$stmt->bindColumn( 2, $username);
			$stmt->bindColumn( 3, $db_password);
			$stmt->bindColumn( 4, $salt);
			
	 
			// hash the password with the unique salt.
			$password = hash('sha512', $password . $salt);

			if ($stmt->fetch(PDO::FETCH_NUM) == 1) {
				
	 			// TODO: Activate Brute force check
				// if (checkbrute($user_id, $mysqli) == true) {
				// 	// Account is locked 
				// 	// Send an email to user saying their account is locked
				// 	return false;
				// } else {
					// Check matching passwords
					if ($db_password == $password) {
						// Password is correct!
						// Get the user-agent string of the user.
						$user_browser = $_SERVER['HTTP_USER_AGENT'];
						// XSS protection as we might print this value
						$user_id = preg_replace("/[^0-9]+/", "", $user_id);
						$_SESSION['user_id'] = $user_id;
						// XSS protection as we might print this value
						$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);

						$_SESSION['username'] = $username;
						$_SESSION['login_string'] = hash('sha512', 
								  $password . $user_browser);
						// Login successful.
						$error_handler->logError('Login attempt success', 'Welcome', true);
						return true;
					} else {
						$error_handler->logError('Login attempt error', 'The username or password don\'t match', true);
						// Password is not correct
						// We record this attempt in the database
						// $now = time();
						// $con->query("INSERT INTO login_attempts(user_id, time)
						// 				VALUES ('$user_id', '$now')");
						return false;
					}
				// }
			} else {
				// No user exists.
				$error_handler->logError('Login attempt error', 'The username is not valid', true);
				return false;
			}
		}
		
	}

	/**
	 * Check if user is logged in and the session variables are set correctly
	 * @return true if user is logged in
	 */
	function login_check() {
		global $con;
		
		// Check if all session variables are set 
		if (isset($_SESSION['user_id'], 
							$_SESSION['username'], 
							$_SESSION['login_string'])) 
		{
	 		
			$user_id = $_SESSION['user_id'];
			$login_string = $_SESSION['login_string'];
			$username = $_SESSION['username'];
	 
			// Get the user-agent string of the user.
			$user_browser = $_SERVER['HTTP_USER_AGENT'];
	 
			if ($stmt = $con->prepare("SELECT password 
										  FROM gb_users 
										  WHERE id = ? LIMIT 1")) {
				// Bind "$user_id" to parameter. 
				$stmt->bind_param('i', $user_id);
				$stmt->execute();   // Execute the prepared query.
				$stmt->store_result();
	 
				if ($stmt->num_rows == 1) {
					// If the user exists get variables from result.
					$stmt->bind_result($password);
					$stmt->fetch();
					$login_check = hash('sha512', $password . $user_browser);
	 
					if ($login_check == $login_string) {
						// Logged In!!!! 
						return true;
					} else {
						// Not logged in 
						return false;
					}
				} else {
					// Not logged in 
					return false;
				}
			} else {
				// Not logged in 
				return false;
			}
		} else {
			// Not logged in 
			return false;
		}
	}

}