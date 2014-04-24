<?php 

	include_once('includes/db/conn_header.php'); 
	
	global $appearance_object;

	file_put_contents(
						'/Users/maquilador8/Desktop/php.log', 
						var_export($dbcon_object, true), 
						FILE_APPEND);


?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $appearance_object->title ?></title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>


		
	