<?php
	include_once('includes/core/loader.inc.php'); 
	include_once('userController.class.php');

	$user_controller = new userController($con, $error_handler);