<?php
	require 'includes/vendor/autoload.php';
	$config_file 	= file_get_contents("config.json");
	$config_json 	= json_decode($config_file, false);

	$dbcon_object 		= $config_json->DB;
	$app_info 			= $config_json->app_info;
	$security 			= $config_json->security;

	// TODO: Move these definitions to other file
	define("SITEURL", $app_info->local_url."/");
	define("APPURL", SITEURL.$app_info->home."/");
	define("ROUTER", "includes/routes/routes.php");
	if($app_info->mode == "development"){
		define("SECURE", $security->secure_connection_local);
	}else{
		define("SECURE", $security->secure_connection);
	}

	//PDO Connection
	try{

		$con = new PDO("{$dbcon_object->driver}:host={$dbcon_object->host};dbname={$dbcon_object->database};charset=utf8", $dbcon_object->user, $dbcon_object->password); 
	}catch(PDOException $e){
   		 echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

	
	