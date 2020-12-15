<?php 

if(!isset($_SESSION['id'])){
	echo '
        <script type="text/javascript">
          window.location.replace("login.php");
        </script>
        ';
}
// echo '
//         <script type="text/javascript">
//           alert('.$_SESSION["id"].');
//         </script>
//         ';

$getInfo = "SELECT * FROM customer WHERE accountid = '".$_SESSION["id"]."'";
$con = mysqli_connect("localhost","root","","website");
$run = mysqli_query($con, $getInfo);
$row = mysqli_fetch_array($run);
$output = '';
$output = '

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<title>Check Out</title>
			<link rel="stylesheet" type="text/css" href="./css/flexboxgrid.css">
			<link rel="stylesheet" type="text/css" href="css/stylecheckout.css">

			<script src="./js/jquery-3.4.1.js"></script>
			<script src="./js/jquery.min.js"></script>
			<script src="./admin/js/jquery-3.5.1.min.js" charset="utf-8"></script>
		</head>

		<body>
			<div class="container-fluid">
				<div class="container">
					<form action="xulycheckout.php" method="get" id="checkoutform">
					<div class="row">
						<div id="info" class="col-lg-8">
							<div id="shipping" class="info_item col-lg-12">
								<div class="info_item_header">
									<h2>1. Shipping</h2>
								</div>
								<div class="info_item_content">
									<div class="row">
										<div class="col-lg-3">
											<p>Full Name: </p>
										</div>
										<div class="col-lg-9">
											<input readonly type="text" name="fullname" value="'.$row["fullname"].'" class="tfaccount">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<p>Address: </p>
										</div>
										<div class="col-lg-9">
											<input readonly type="text" name="address" value="'.$row["address"].'" class="tfaccount">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<p>Email: </p>
										</div>
										<div class="col-lg-9">
											<input readonly type="text"  name="" value="'.$row["email"].'" class="tfaccount">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<p>Phone: </p>
										</div>
										<div class="col-lg-9">
											<input readonly type="text"  name="phone" value="'.$row["phone"].'" class="tfaccount">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<p>Note: </p>
										</div>
										<div class="col-lg-9">
											<textarea name="note" rows="4" cols="30"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div id="billing" class="info_item col-lg-12">
								<div class="info_item_header">
									<h2>2. Billing</h2>
								</div>
								<div class="info_item_content">
									<div>
										<input type="checkbox" checked="checked" name="sameaddress" id="sameaddress">My billing address is the same as my shipping address
									</div>
									<div id="notsameaddress" style="display:none">
										<div class="row">
											<div class="col-lg-3">
												<p>Full Name of Recipient: </p>
											</div>
											<div class="col-lg-9">
												<input type="text" name="fullname">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3">
												<p>Address of Recipient: </p>
											</div>
											<div class="col-lg-9">
												<input type="text" name="address">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3">
												<p>Phone of Recipient: </p>
											</div>
											<div class="col-lg-9">
												<input type="text" name="phone">
											</div>
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
						<div id="right_sidebar" class="col-lg-4">
							<div class="right_sidebar_item"  >
								<div class="info_item_header">
									<h2>Summary</h2>
								</div>
								<div class="info_item_content">
									<div class="row">
										<div class="col-lg-4">
											<p>Subtotal:</p>
										</div>
										<div class="col-lg-8 end-lg">
											1.000.000vnd
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8">
											<p>Shipping & Handing:</p>
										</div>
										<div class="col-lg-4 end-lg">
											Free
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<h3>Total:</h3>
										</div>
										<div class="col-lg-8 end-lg">
											<h3 style="color: #FF3333">1.000.000vnd</h3>
										</div>
									</div>		
								</div>
							</div>
							<div class="right_sidebar_item">
								<div class="info_item_header">
									<h2>In Your Cart(2)</h2>
								</div>
								<div class="info_item_content">
									<div class="row">
										<div class="col-lg-5">
											<img style="width:100px;" src="./admin/image/product/product3.jpg">
										</div>
										<div class="col-lg-7">
											<h4>Nike Air Max 1</h4>
											<p>Size: 40</p>
											<p>Qty: 1</p>
											<p style="color: #FF3333;margin: 16px 0px;">1.000.000vnd</p>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<img style="width:100px;" src="./admin/image/product/product3.jpg">
										</div>
										<div class="col-lg-7">
											<h4>Nike Air Max 1</h4>
											<p>Size: 40</p>
											<p>Qty: 1</p>
											<p style="color: #FF3333;margin: 16px 0px;">1.000.000vnd</p>
										</div>
									</div>
									<div class="row">
										<div class=col-lg-12>
											<a style="color:black;font-size:14px;" href="">Edit Cart</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div id="submitplaceorder" class="row end-lg" >
						<input style="display:none;" type="text" name="cartid" value="'."1".'">
						<input style="display:none;" type="text" name="productid" value="'."2".'">
						<input type="submit" name="placeorder" value="Place Order" id="placeorder" class="col-lg-4">
					</div>
					</form>
			
				</div>
			</div>
			
		</body>
		</html>
 ';

echo $output;
mysqli_close($con);
?>
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                document.getElementById("notsameaddress").style.display = "none";
            }
            else if($(this).prop("checked") == false){
                 document.getElementById("notsameaddress").style.display = "block";
            }
        });
    });

    $(document).ready(function(){
    	$('input[type="checkbox"]').click(function(){
    	 	if($(this).prop("checked") == false){
                var x = document.getElementsByClassName("tfaccount");
                for (var i=0; i<4; i++) {
                	 x[i].disabled = true;
                }
               

            }else{
            	var x = document.getElementsByClassName("tfaccount");
                for (var i=0; i<4; i++) {
                	 x[i].disabled = false;
                }
            }
        });
    });
</script>