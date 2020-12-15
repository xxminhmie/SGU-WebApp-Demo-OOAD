<?php
session_start();
if(!isset($_SESSION['role'])){
	echo "<script>window.open('login.php','_self');</script>";
}else{
	if($_SESSION['role'] !='admin'&&$_SESSION['role'] !='manager'&&$_SESSION['role'] !='staff'){
		echo "<script>window.open('login.php','_self');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
	<!-- Template Styles -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- CSS Reset -->
	<link rel="stylesheet" href="css/normalize.css">
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="css/milligram.min.css">
	<!-- Main Styles -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/edit.css">
	<script src="../js/jquery-3.4.1.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="./js/jquery-3.5.1.min.js" charset="utf-8"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
</head>

<body>
	<div class="navbar">
	  <div class="row">
	    <div class="column column-30 col-site-title"><a href="../index.php" class="site-title float-left">Go to website</a></div>
	    
	    <div class="column column-30">
	      <div class="user-section"><a href="#">
	        <div class="username">
	          <h4 style="display: block; margin: 1rem">Hi <?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?></h4>
	          
	        </div>
	        <div class="username">
	          
	          <a href="logout.php" style="display: block;">Logout</a>
	        </div>
	      </a></div>
	    </div>
	  </div>
	</div>

	<div class="row">
		<div id="sidebar" class="column">
			<h5>Navigation</h5>
			<ul>
				<?php 
				if($_SESSION['role'] =='admin'){
					echo '<li><a href="index.php?action=account"> Account</a></li>';
				}
				if ($_SESSION['role'] =='manager') {
					echo '
						<li><a href="index.php?action=account"> Account</a></li>
						<li><a href="index.php?action=product"> Product</a></li>
						<li><a href="index.php?action=brand"> Brand</a></li>
						<li><a href="index.php?action=order"> Order</a></li>
						<li><a href="index.php?action=report"> Report</a></li>
					';
				}
				if ($_SESSION['role'] =='staff') {
					echo '
						<li><a href="index.php?action=order"> Order</a></li>
						<li><a href="index.php?action=report"> Report</a></li>
					';
				}
				?>
				
				<!-- <li><a href="index.php?action=product"> Product</a></li>
				<li><a href="index.php?action=brand"> Brand</a></li> -->
				
			</ul>
		</div>
		<section id="main-content" class="column column-offset-20">
			<?php
 	   if(isset($_GET['action'])){
 	    $action = $_GET['action'];
 	   }else{
 	    $action ='';
 	   }

 	   switch($action){
 	    	case 'brand':
 					include 'inc/brand.php';
 					break;
				case 'editbrand':
	 				include 'inc/editbrand.php';
	 				break;

				case 'product':
			 			include 'inc/product.php';
			 			break;
				case 'editproduct':
					 	include 'inc/editproduct.php';
					 	break;
				case 'insertproduct':
					 	include 'inc/insertproduct.php';
					 	break;

				case 'order':
			 			include 'inc/order.php';
			 			break;

			 	case 'report':
			 			include 'inc/report.php';
			 			break;
			case 'account':
			 			include 'inc/account.php';
			 			break;
			case 'insertaccount':
					 	include 'inc/insertaccount.php';
					 	break;
			case 'editaccount':
					 	include 'inc/editaccount.php';
					 	break;

				}
		?>
		</section>
	</div>

</body>
</html>
