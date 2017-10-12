// Validate Recover Account Credentials

function recoverLoginAccount(){
	var email = document.forms['RecoverAccountForm']['email'].value;
	var msg = document.getElementById('recover_msg');
	
	
	// check if email and password are nonempty
	if(email == null || email == ""){
		msg.innerHTML = "Invalid email.";
		return false;
	}
	
	// check if email and password are valid
	else{
		
		if(!validateEmail(email)){
			msg.innerHTML = "Invalid email.";
			return false;
		}else
			return true;
	}
	
	
}

// Validates email
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}