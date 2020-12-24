<?php session_start(); ?>
<?php
$localhost = new MySQLi("db4free.net/3306","sql12382125","SFLxqit2c2");
if (mysqli_connect_errno())
{
    echo '<script>window.open("404.php","_self");</script>';
}
$con = mysqli_connect('sql12.freemysqlhosting.net','sql12382125','SFLxqit2c2','sql12382125');



 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="./css/flexboxgrid.css">
    <link rel="stylesheet" type="text/css" href="./css/stylepagi.css">
    <link rel="stylesheet" type="text/css" href="./css/stylecart.css">
    <link rel="stylesheet" type="text/css" href="./css/stylecheckout.css">
    <link rel="stylesheet" type="text/css" href="./css/stylelogin.css">

    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./admin/js/jquery-3.5.1.min.js" charset="utf-8"></script>
</head>
<body>
    <div id="live_data"></div>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <div class="row middle-lg middle-md middle-sm">
                            <div class="col-lg-2" style="padding: 0;">
                                <a href="index.php"><img style="width: 50px;" src="img/logo.png" alt=""></a>
                            </div>
                            <div class="col-lg-6" style="padding: 0;">
                                 <a href="index.php" style="color: black;" ><h3 style="font-weight: 600;">PEACE</h3></a>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <div class="col-lg-3" >
                    <div class="header__logo">
                        <a href="shop.php" style="color: black;" >
                            <button class="site-btn" style="background: white; color: black; border: 1px solid black">All Product</button>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="shop.php" style="color: black;" >
                            <button class="site-btn" style="background: white; color: black; border: 1px solid black">Shopping Cart</button>
                        </a>
                    </div>

                </div> -->
                <div class="col-lg-2 ">
                    <div class="header__cart">
                        <ul>
                            <li><a href="cart.php"><i class="fa fa-shopping-bag"></i>
                                <?php
                                $cart_count=0;
                                    if(!empty($_SESSION["shopping_cart"])) {
                                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                                }

                                ?>
                               
                            <span> <?php echo $cart_count; ?></span></a></li>
                        </ul>
                        
                    </div>
                </div>
                <?php
                $output='';
                if(!isset($_SESSION["username"])){
                    $output = '
                        <div class="col-lg-4">
                            <div class="header__logo">
                               <div class="header__top__right">
                                <div class="header__top__right__social">
                                    <a href="404.php"><i class="fa fa-facebook"></i></a>
                                    <a href="404.php"><i class="fa fa-twitter"></i></a>
                                    <a href="404.php"><i class="fa fa-linkedin"></i></a>
                                    <a href="404.php"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                                
                                <div class="header__top__right__auth">
                                    <a onclick="login()" style="cursor: pointer;">Login</a>    
                                </div>
                                <div class="header__top__right__auth">
                                    <a onclick="signup()" style="cursor: pointer;">Sign up</a>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                
                    ';
                }else{
                    $output = '
                        <div class="col-lg-4">
                            <div class="header__logo">
                               <div class="header__top__right">
                                <div class="header__top__right__social">
                                    <a href="404.php"><i class="fa fa-facebook"></i></a>
                                    <a href="404.php"><i class="fa fa-twitter"></i></a>
                                    <a href="404.php"><i class="fa fa-linkedin"></i></a>
                                    <a href="404.php"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                                
                                <div class="header__top__right__auth">
                                    <p>Hi '.$_SESSION["username"].'</p>    
                                </div>
                                 
                                <div class="header__top__right__auth">
                                    <a href="logout.php" style="cursor: pointer;">Logout</a>
                                </div>';
                                if (isset($_SESSION["role"])) {
                                    if($_SESSION["role"]=="admin"||$_SESSION["role"]=="manager"||$_SESSION["role"]=="staff"){
                                        $output.='
                                            <div class="header__top__right__auth">
                                                <a href="./admin/index.php" style="cursor: pointer;">Dashboard</a>
                                            </div>
    
                                        ';
                                    }else{
                                        $output.='
                                            <div class="header__top__right__auth">
                                                <a href="history.php">History</a>    
                                            </div>

                                        ';
                                    }
                                }
                                
                                
$output.='                      </div>
                            </div>
                            
                        </div>
                    ';

                 
                }
                echo $output;
                ?>
                
               



            </div>
            
        </div>
    </header>
    <!-- Header Section End -->

    <script type="text/javascript">
        function openNewTab(url){
            var win = window.open(url, '_self');
            win.focus();
        }
    </script>



<script type="text/javascript">
  function login(){
    $.ajax({
      url:"inc/popuplogin.php",
      method:"POST",
      success:function(data){
        $("#live_data").html(data);
      }
    });         
  }

  function signup(){
    $.ajax({
      url:"inc/popupsignup.php",
      method:"POST",
      success:function(data){
        $("#live_data").html(data);
      }
    });         
  }
</script>

 <?php //kiểm tra đăng nhập
// $con = mysqli_connect("localhost","root","","website");
if(isset($_REQUEST['login'])){

  $username = trim(mysqli_real_escape_string($con,$_REQUEST['username']));
  $password = trim(mysqli_real_escape_string($con,$_REQUEST['password']));
  
  $query = "SELECT * FROM account WHERE username ='$username' AND password='$password' ";
  $runuser = mysqli_query($con, $query) or die ("Error: " . mysqli_error($con));
  $checkuser = mysqli_num_rows($runuser);
  if($checkuser > 0){
  $dbrow = mysqli_fetch_array($runuser);
 
  if($dbrow['role']=='admin' || $dbrow['role']=='staff' || $dbrow['role'] =='manager'){
    echo "<script>alert('Please go to Login on Dashboard!');</script>";
  }elseif($dbrow['role'] =='customer'){
    $_SESSION['id'] = $dbrow['id']; 
    $_SESSION['username'] = $dbrow['username'];
    $_SESSION['password'] = $dbrow['password'];
    $_SESSION['role'] = $dbrow['role'];
    echo "<script>window.window.open('index.php','_self')</script>";
  }



}else{//end if check user
     echo "<script>alert('Password or Email is wrong, try again!')</script>";
  }
}
?>
<?php 
if(isset($_REQUEST["signup"])){
    // echo '<script>   alert("Hi!");</script>';
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
        echo '<script>  alert("SignUp successfully!");</script>';
    }
}
?> 
