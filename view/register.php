
<?php include_once('gb_header.php'); ?>
	
	<div class="container">
		<div id="warning-alert" class="alert alert-warning"></div>
		<img class="login_img" src="images/logo.jpg" alt="FICM Festival Internacional de Cine de Morelia">

		<form id="form-signup" class="form-signup" role="form" method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
			
			<h2 class="form-signup-heading">Create a new user</h2>
			<input id="signup-user" name="user" type="text" class="form-control" placeholder="Username" required="" autofocus="">
			<input id="signup-pwd" name="password" type="password" class="form-control" placeholder="Password" required="">
			<input id="signup-conf" name="repeatpassword" type="password" class="form-control" placeholder="Repeat Password" required="">
			<input id="signup-permissions" name="permissions" type="text" class="form-control" placeholder="Permissions" required="">
			
			<button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
		</form>

	</div>

	<?php
		file_put_contents(
							'/Users/maquilador8/Desktop/php.log', 
							var_export($_SERVER['REQUEST_METHOD'], true), 
							FILE_APPEND);


		global $user_controller;

		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			
			if( isset($_POST['user']) && 
				isset($_POST['p']) && 
				isset($_POST['permissions']) ){

				$user_controller->registerUser();
			}
			
		}
	?>

<?php include_once('footer.php'); ?>