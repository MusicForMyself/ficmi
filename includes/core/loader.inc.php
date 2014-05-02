<?php
	//Load gumbo core files
	try {
		
		require "includes/err/err_manager.class.php";
		require "includes/core/define.inc.php";
		require "includes/db/conn_header.php";
		require "includes/session/core_session.php";
		require "includes/core/core_functions.php";
		require "includes/functions.php";
	} catch (Exception $e) {
	    
	    exit('Fatal Loading error'.$e);
	}

	