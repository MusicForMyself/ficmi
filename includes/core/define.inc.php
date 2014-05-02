<?php
	require 'includes/vendor/autoload.php';
	
	//Load and create config objects
	$config_file 	= file_get_contents("config.json");
	$config_json 	= json_decode($config_file, false);

	$dbcon_object 		= $config_json->DB;
	$app_info 			= $config_json->app_info;
	$security 			= $config_json->security;

	// DEFINE VALUES
	define("SITEURL", $app_info->local_url."/");
	define("APPURL", SITEURL.$app_info->home."/");
	define("ROUTER", "includes/routes/routes.php");

	//Define security mode for session management
	if($app_info->mode == "development"){
		define("SECURE", $security->secure_connection_local);
	}else{
		define("SECURE", $security->secure_connection);
	}

	// Initialize mustache php
	$mustache = new Mustache_Engine(array(
	    'template_class_prefix' 	=> '__Templates__',
	    'cache' 					=> 'includes/tmp/cache/mustache',
	    'cache_lambda_templates' 	=> true,
	    'loader' 					=> new Mustache_Loader_FilesystemLoader('view'),
	    'partials_loader' 			=> new Mustache_Loader_FilesystemLoader('view/partials')
	));

	// Create Error handling object
	$error_handler 	 = new err_manager();
	$error_handler->checkHeaderErrors();