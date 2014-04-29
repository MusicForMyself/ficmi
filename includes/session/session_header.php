<?php
	include_once('includes/db/conn_header.php'); 
	include_once('includes/session/core_session.php'); 
	include_once('includes/err/err_manager.class.php');
	include_once('includes/functions.php');
	include_once('userController.class.php');

	$error_handler 	 = new err_manager();
	$user_controller = new userController($con, $error_handler);
	$error_handler->checkHeaderErrors();