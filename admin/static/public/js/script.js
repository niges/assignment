function validateForm() {

	 var email=document.forms['form']['u_email'];
	 var password = document.forms['form']['password'];
	 

	 var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if(email.value.match(pattern) && password.value != "") {
		return true;
	} else {
		alert('Email and Password Not Matched');
		return false;
	}


	

}