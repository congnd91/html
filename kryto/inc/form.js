// var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
var pattern = new RegExp(/\S+@\S+\.\S+/i);
var en_english = new RegExp(/^[a-zA-Z]$/i);
var en_num = new RegExp(/^[0-9]$/i);

function checkReg2(ind){
	var check_ids = new Array( "firstname"+ind, "lastname"+ind, "email"+ind, "password"+ind, "phone"+ind );
	var check_ids_length = check_ids.length
	for (i = 0; i < check_ids_length; i++) {
		if(check_ids[i] == "email"+ind){
			var email = $("#email"+ind);
			if (!(pattern.test(email.val()))) {
				alert("The email has been entered is invalid");
				email.focus();
				return false;
			}
		}
		
		if(check_ids[i] == "firstname"+ind){
			var firstname = $("#firstname"+ind).val();
			if(firstname.length < 2){
				alert("First name must contain at least 2 characters");
				$("#firstname"+ind).focus();
				return false;
			}
		}
		
		if(check_ids[i] == "lastname"+ind){
			var lastname = $("#lastname"+ind).val();
			if(lastname.length < 2){
				alert("Last name must contain at least 2 characters");
				$("#lastname"+ind).focus();
				return false;
			}
		}
		
 		if(check_ids[i] == "phone"+ind){
			var phone = $("#phone"+ind).val();
			if(phone.length < 9){
				alert("Phone number must contain at least 12 digits");
				$("#phone"+ind).focus();
				return false;
			}
		}
		
		if(check_ids[i] == "password"+ind){
			var pass = $("#password"+ind).val();
			if(pass.length < 6){
				alert("Your password must contain at least 6 characters");
				$("#password"+ind).focus();
				return false;
			}
		}
		
		var passRegex = /^[a-z0-9]+$/i;
		if(check_ids[i] == "password"+ind){
			var pass = $("#password"+ind);
			if (!(passRegex.test(pass.val()))){
				alert("Password must contain letters and numbers only");
				$("#password"+ind).focus();
				return false;
			}
		}
		
		key = $("#"+check_ids[i]);
		if ((key.val() == "")) {
			alert("Please enter your "+names[i]);
			key.focus();
			return false;
		}
		
	}
	
	return true;
}



