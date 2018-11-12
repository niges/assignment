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



$(document).ready(function() {
	$.validator.addMethod(
	    "regex",
	    function(value, element, regexp) {
	        return regexp.test(value);
	    },
	    "Please enter valid phone Number"
	);

	$('#request').validate({
		errorClass: 'error',
		rules: {
			fname: {
				required:true,
			},
			lname: {
				required:true,
			},
			email: {
				required:true,
				email:true,

			},
			phone: {
				required:true,
				regex: /^\+\d?[\s]?(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$/,
				
			},
			
		},
		messages: {
			email: "please enter valid email",
			
		}

	});
});


function getCity(val) {
	$.ajax({	
		type:"GET",
		url: "http://localhost/newassign/admin/data/States.php/?id=" + val,
		success:function(data){
			$("#state").html(data);
		},
		error: function(data) {

		}
	});
}

$(document).ready(function() {
	$('#add').validate({
		rules: {
			title:{
				required:true
			},
			body: {
				required:true,
			},
			file: {
				required:true,
			}
		}
	});
});

$(document).ready(function() {
	$('#login').validate({
		rules: {
			u_email: {
				required:true,
				email:true,	
			},
			password: {
				required: true
			}
		}
	});
});








