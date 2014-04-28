<?php
	include_once('includes/err/err_manager.class.php');
	include_once('userController.class.php');
	$err_handler 	 = new err_manager();
	$user_controller = new userController();
	$err_handler->checkHeaderErrors();