<?php session_start(); ?>
<head>
<meta charset="UTF-8">
<title>Log In</title>
<link rel="stylesheet" href="css/admin_form_login.css" />
</head>

<body>

<form action="" method="post" enctype="multipart/form-data">
	<h2>Admin Login</h2>
	<input type="text" name="username" class="text-field" placeholder="Username" />
    <input type="password" name="password" class="text-field" placeholder="Password" />
    <input type="submit" name="login"  class="button" value="Log In" />
</form>
</body>

<?php
$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");

if(isset($_POST['login'])){
  $username = trim(mysqli_real_escape_string($con,$_POST['username']));
  $password = trim(mysqli_real_escape_string($con,$_POST['password']));

  $query = "SELECT * FROM account where username ='$username' AND password='$password' ";
  $run = mysqli_query($con, $query) or die ("error: " . mysqli_error($con));
  $check = mysqli_num_rows($run);

  if($check > 0){
    $row = mysqli_fetch_array($run);

    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
     $_SESSION['role'] = $row['role'];
    // $_SESSION['user_id'] = $row['id'];
      

    if($row['role'] =='admin' || $row['role'] =='manager' || $row['role'] =='staff'){
      echo "<script>window.open('index.php','_self')</script>";
    }else if($row['role'] =='guest'){
      echo "<script>alert('Password or Email is wrong, your are guest not admin!')</script>";
    }
  }else{
  echo "<script>alert('Password or Email is wrong, try again!')</script>";
  }

  }
 ?>
