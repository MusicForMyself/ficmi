
<?php include_once('gb_header.php'); ?>

	<div class="container">

		<img class="login_img" src="images/logo.jpg" alt="FICM Festival Internacional de Cine de Morelia">

		<form id="form-signup" class="form-signup" role="form" method="POST" action="">
			
			<h2 class="form-signin-heading">Create a new user</h2>
			<input name="user" type="text" class="form-control" placeholder="Username" required="" autofocus="">
			<input name="password" type="password" class="form-control" placeholder="Password" required="">
			<input name="repeatpassword" type="password" class="form-control" placeholder="Repeat Password" required="">
			<input name="permissions" type="text" class="form-control" placeholder="Permissions" required="">
			
			<button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
		</form>

	</div>

	<?php
		global $user_controller;

		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			if( isset($_POST['user']) && 
				isset($_POST['password']) && 
				isset($_POST['repeatpassword']) && 
				isset($_POST['permissions']) ){

				$user_controller->registerUser($_POST['user'], $_POST['password'], $_POST['permissions']);
			}
			
		}
	?>

<?php include_once('footer.php'); ?>