<?php
	$config_file 	= file_get_contents("../../config.json");
	$config_json 	= json_decode($config_file, false);
	
	$dbcon_object 		= $config_json->DB;
	$appearance_object 	= $config_json->Appearance;

	//Establish a connection to the database
	$con = mysqli_connect($dbcon_object->host,$dbcon_object->user,$dbcon_object->password,$dbcon_object->database);

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}