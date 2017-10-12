// Validate Login Credentials

function validateLoginForm(){
	var email = document.forms['LoginForm']['userName'].value;
	var password = document.forms['LoginForm']['passWord'].value;
	var msg = document.getElementById('login_msg');
	
	var patternPassword = /^[0-9a-zA-Z]+$/;
	
	// check if email and password are nonempty
	if((email == null || email == "") || (password == null || password == "")){
		msg.innerHTML = "Invalid email or password.";
		return false;
	}
	
	// check if email and password are valid
	else{
		
		if(!password.match(patternPassword) || !validateEmail(email)){
			msg.innerHTML = "Invalid email or password.";
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