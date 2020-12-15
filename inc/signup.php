<form method="post" onsubmit="return xulysubmit()">
	<small style="display: none" id="small">Error message</small>
	<input type="text" name="full" placeholder="Full Name" required="">
	<input type="email" name="email" placeholder="Email" required="">
	<input type="text" name="address" placeholder="Address" required="">
	<input type="text" name="phone" placeholder="Phone (0908123123)" required="" id="phone">
	<input type="text" name="user" placeholder="Username" required="">
	<input type="password" name="password" placeholder="Password" required="" id="pass1">
	<input type="password" name="password" placeholder="Confirm Password" required="" id="pass2">
	<input type="submit" value="SignUp" name="signup">
</form>
<script type="text/javascript">
	function xulysubmit(){
		var pass1 = document.getElementById("pass1").value;
		var pass2 = document.getElementById("pass2").value;
		var phone = document.getElementById("phone").value;
		
		// if(){
		// 	m.style.display = "block";
		//     m.style.color = "red";
		//     m.innerHTML="Phone is not valid!";
		//     return false;
		// }
		// else{
		// 	alert("SignUp successfully!")
		// }
		var regexp = /^[0-9]{10}$/;
		if(regexp.test($('#phone').val())) {
			
		} else {
			var m = document.getElementById("small");
		    m.style.display = "block";
		    m.style.color = "red";
		    m.innerHTML="Phone is not valid!";
		    return false;
		}
		if(pass1 != pass2){
		    var m = document.getElementById("small");
		    m.style.display = "block";
		    m.style.color = "red";
		    m.innerHTML="Confirm password not success!";
		    return false;
		}
		return true;
	}

	
</script>
