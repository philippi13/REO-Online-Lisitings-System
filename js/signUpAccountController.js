// Validate Registration

function validateSignUpForm(){
	var firstName = document.forms['SignUpForm']['firstName'].value;
	var lastName = document.forms['SignUpForm']['lastName'].value;
	var email = document.forms['SignUpForm']['email'].value;
	var phone_num = document.forms['SignUpForm']['phone_num'].value;
	var passWord = document.forms['SignUpForm']['passWord'].value;
	var msg = document.getElementById('signup_msg');
	
	var pattern = /^[0-9a-zA-Z]+$/;
	var patternAlphabetic = /^[a-zA-Z]+$/;
	var phonePattern = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	
	// check if all fields are nonempty
	if((firstName == null || firstName == "") ||
		(lastName == null || lastName == "") ||
		(email == null || email == "") ||
		(phone_num == null || phone_num == "") ||
		(passWord == null || passWord == "")
		){
		msg.innerHTML = "Invalid fields found.<br /><br />Name fields must be alphabetical.<br />Email format: abc@abc.com<br />Phone # must be max 10 digits.<br />Password must not be empty.";
		return false;
		
	}
	else{
		if(!firstName.match(patternAlphabetic) || !lastName.match(patternAlphabetic) || !validateEmail(email) || !phone_num.match(phonePattern) || !passWord.match(pattern)){
			msg.innerHTML = "Invalid email or password.";
			return false;
		}else
			return true;
	}
	
	return false;
}

// Validates email
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}