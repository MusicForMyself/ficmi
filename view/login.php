<?php

 include_once('gb_header.php'); ?>

	<div class="container">

		<img class="login_img" src="images/logo.jpg" alt="FICM Festival Internacional de Cine de Morelia">

		<form id="form-signin" class="form-signin" role="form" method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
			
			<h2 class="form-signin-heading">Please sign in</h2>
			<input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">
			<input type="password" name="password" class="form-control" placeholder="Password" required="">
			<label class="checkbox">
				<input type="checkbox" value="remember-me">Remember me
			</label>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>

	</div>

<?php
	// TODO: sacar esta lógica del view cuando se integre handlebars
	global $user_controller;

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		if( isset($_POST['username']) && isset($_POST['p'])){

			if( $user_controller->loginUser($_POST['username'], $_POST['p'])){
				//Show user the dashboard
				header("Location: dashboard");
				exit;
			}
		}
	}
	
	include_once ('footer.php'); 
?>