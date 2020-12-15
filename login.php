
<?php session_start(); ?>

<head>
	<meta charset="UTF-8">
	<title>Log In</title>
	<link href="css/stylelogin.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/font-awesome.css" rel="stylesheet"> 

	<script src="./js/jquery-3.4.1.js"></script>
	<script src="./js/jquery.min.js"></script>
	<script src="../admin/js/jquery-3.5.1.min.js" charset="utf-8"></script>
</head>

<body style="background: url(./img/breadcrumb.jpg) no-repeat 0px 0px;
    background-color: rgba(40,40,40,0.4);background-attachment:fixed;
	   background-size: cover;">
<div class="wthree-dot" >
	<div class="profile">
		<div class="wrap">
			<div class="content-main">
				<div class="w3ls-subscribe w3ls-subscribe1">
					<h4><a onclick="login()" style="color: white;cursor: pointer;" id="login">Login</a>
						<a onclick="signup()" style="color: #666666;cursor: pointer;" id="signup">Sign up</a></h4>

					<div id="live_data_login"></div>

				</div>
			</div>
		</div>
	</div>
</div>
</body>

<?php //kiểm tra đăng nhập
$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
if(isset($_POST['login'])){
	$username = trim(mysqli_real_escape_string($con,$_POST['username']));
	$password = trim(mysqli_real_escape_string($con,$_POST['password']));

	$query = "SELECT * FROM account WHERE username ='$username' AND password='$password' ";
	$runuser = mysqli_query($con, $query) or die ("Error: " . mysqli_error($con));
	$checkuser = mysqli_num_rows($runuser);
	if($checkuser > 0){
	$dbrow = mysqli_fetch_array($runuser);

	$_SESSION['id'] = $dbrow['id']; 
	$_SESSION['username'] = $dbrow['username'];
	$_SESSION['password'] = $dbrow['password'];
	$_SESSION['role'] = $dbrow['role'];
 
	if($dbrow['role']=='admin' || $dbrow['role']=='staff' || $dbrow['role'] =='manager'  ){
 		echo "<script>alert('Please go to Dashboard s Login!')</script>";
 	}else if($dbrow['role'] =='customer'){
 		echo "<script>window.open('checkout.php','_self')</script>";
		}

	}else{//end if check user
		echo "<script>alert('Password or Email is wrong, try again!');</script>";
	}//end if isset login
}

?>

<!-- Ajax -->
<script type="text/javascript">

$(document).ready(function(){
 function fetch_data(){
    $.ajax({
        url:"inc/login.php",
        method:"POST",
        success:function(data){
			$('#live_data_login').html(data);
        }
    });
	}
	fetch_data();
});

function login(){
 function fetch_login(){
 	document.getElementById("login").style.color = "white";
	document.getElementById("signup").style.color = "#666666";
    $.ajax({
        url:"inc/login.php",
        method:"POST",
        success:function(data){
			$('#live_data_login').html(data);
        }
    });
	}
	fetch_login();
};

function signup(){
	document.getElementById("login").style.color = "#666666";
	document.getElementById("signup").style.color = "white";
	function fetch_signup(){
    $.ajax({
        url:"inc/signup.php",
        method:"POST",
        success:function(data){
			$('#live_data_login').html(data);
        }
    });
	}
	fetch_signup();
}
</script>

<?php 
if(isset($_REQUEST["signup"])){
	// echo '<script>	alert("Hi!");</script>';
	$fullname = $_REQUEST["full"];
	$email = $_REQUEST["email"];
	$address = $_REQUEST["address"];
	$phone = $_REQUEST["phone"];
	$username = $_REQUEST["user"];
	$password = $_REQUEST["password"];

	$query = "INSERT INTO account(username,password,fullname,email,address,phone)
		VALUES ('$username','$password','$fullname','$email','$address','$phone')
	";
	$run = mysqli_query($con, $query);
	if($run){
		echo '<script>	alert("SignUp successfully!");</script>';
	}
}
?> 