define(["jquery", "hashing", "err_handler"], function($, hasher){

	return {
			sendForm: function(){
				console.log('imma sendin');
				var SignupForm = document.getElementById('form-signup');
				hasher.hashRegister(SignupForm, SignupForm.user, SignupForm.password, SignupForm.repeatpassword);
			}
	

	}		

});