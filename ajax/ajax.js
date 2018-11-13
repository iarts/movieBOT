//Registration
$(document).ready(function() {
	$("#register").click(function(){
		var email = $('#email').val();
		var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".");
		var password = $('#password').val();
		var repassword = $('#repeat_password').val();
		var birthday = $('#birthday').val();
		var gender = $('#gender').val();
		var phone = $('#phone').val();
		var last_name = $('#last_name').val();
		var first_name = $('#first_name').val();
		
	if(email==''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ συμπληρώστε διεύθυνση email');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(birthday == ''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ συμπληρώστε ημερ/νια γέννησης');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(phone == ''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ συμπληρώστε το τηλέφωνό σας');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(first_name == ''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ συμπληρώστε το όνομά σας');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(last_name == ''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ συμπληρώστε το επώνυμο σας');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
		document.getElementById('warning').style.height='35px';
	    $('#message').text('Μη έγκυρη διεύθυνση email');
	    $('#message').hide().fadeIn(2000);
		return false;
    }
	else if(password==''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ συμπληρώστε κωδικό');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(password.length<5){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Ο κωδικός πρέπει να περιέχει τουλάχιστον 5 χαρακτήρες');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(repassword==''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ επαναλάβετε τον κωδικό σας');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if(password!=repassword){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Ο κωδικός και ο κωδικός επανάληψης δεν συμφωνούν');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else{		
		$.ajax({
			url:"api/register.php",
			type: "POST",
			data:{
				"register":1,
				"email": email,
				"password": password,
				"birthday": birthday,
				"gender": gender,
				"phone": phone,
				"last_name": last_name,
				"first_name": first_name
			},
			success: function(data){
				console.log(data);
				if(data === "success"){
					$('#register').trigger("reset");
					setTimeout(function() {window.location.href='login.php';}, 2000);
				}
			}
		});
	}
	});
});

//Check Email
function checkEmail(){
	var email = $('#email').val();
	$.ajax({
		url:"api/checkEmail.php",
		type: "POST",
		data:{
			"check_email":1,
			"email": email
		},
		success: function(data){
			if(data === 'Yes'){
				document.getElementById('warning').style.height='20px';
				$('#message').show(500);
				$('#message').text('Η διεύθυνση email που πληκτρολογήσατε υπάρχει ήδη.');
				$('#email').val('');
			}
		}
	})
	
}

//Login
$(document).ready(function(){
	$('#login').click(function(){
		var username = $('#username').val();
		var atpos = username.indexOf("@");
        var dotpos = username.lastIndexOf(".");
		var password = $('#password').val();
	if(username==''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ εισάγετε διεύθυνση email');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=username.length) {
		document.getElementById('warning').style.height='35px';
	    $('#message').text('Μη έγκυρη διεύθυνση email');
	    $('#message').hide().fadeIn(2000);
		return false;
    }
	else if(password==''){
		document.getElementById('warning').style.height='35px';
		$('#message').text('Παρακαλώ εισάγετε κωδικό');
	    $('#message').hide().fadeIn(2000);
		return false;
	}
	else{
		$.ajax({
				url:'api/login.php',
				type: "POST",
		        data:{
			           "login":1,
			           "username": username,
			           "password": password
		         },
				success:function(data){
					if(data === 'No'){
						document.getElementById('warning').style.height='35px';
						$('#message').fadeOut(1500);
						setTimeout(function() {$('#message').text('Προσοχή! Λανθασμένα στοιχεία σύνδεσης').hide().fadeIn();}, 3000);
						
					}
					else{
						setTimeout(function() {window.location.href='index.php';}, 2000);
				    }
				},
				 beforeSend:function()
		   {
			document.getElementById('warning').style.height='35px';
			$("#message").html("<img src='images/loader.gif'/>")
			$('#message').hide().fadeIn(1500);
		   }
			});return false;
	}
	});
});

function fadeout(){
	    document.getElementById('message').style.display='none';
		document.getElementById('warning').style.height='0px';
	}
	
