define(["jquery", "hashing", "err_handler"], function($, hasher){

	return {
			sendForm: function(){
				console.log('Trying to create new user');
				var signupForm = document.getElementById('form-signup');
				hasher.hashRegister(signupForm, signupForm.user, signupForm.password, signupForm.repeatpassword);
			},
			sendLoginForm: function(){
				console.log('Trying to log in to the system');
				var loginForm = document.getElementById('form-signin');
				hasher.hashLogin(loginForm, loginForm.password);
			},
	

	}		

});