<?php 

	include_once('gb_header.php'); 
	global $user_controller, $error_handler;
	// Restrict page for logged users
	// secure_session_start(); 
	// if($user_controller->login_check() == false) {
	// 	$error_handler->logError('Login', 'You are not authorized to see this page, please log in', true);
	// 	exit;
	// }
	
?>
	
<div class="container-fluid">
	
	<?php include_once('sidebar.php'); ?>
	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Escritorio</h1>
		
		
	</div><!-- main -->
</div><!-- fluid -->

<?php include_once('footer.php'); ?>
