function validateForm() {

	 var email=document.forms['form']['u_email'];
	 var password = document.forms['form']['password'];
	 

	 var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if(email.value.match(pattern) && password.value != "") {
		return true;
	} else {
		alert('Email Not Matched');
		return false;
	}
}


function pageValidation() {
	title = document.forms['pageform']['title'];
	body = document.forms['pageform']['body'];


	if (title.value == "") {
		alert('Title is Empty');
		return false;
	} 
	if (body.value == "") {
		alert('Body is Empty');
		return false;
	} 
	
	return true;
} 
