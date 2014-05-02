<?php
	//PDO Connection
	try{

		$con = new PDO("{$dbcon_object->driver}:host={$dbcon_object->host};dbname={$dbcon_object->database};charset=utf8", $dbcon_object->user, $dbcon_object->password); 
	}catch(PDOException $e){
   		 echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

	
	