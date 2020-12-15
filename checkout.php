<?php include './inc/header.php'; ?>

<?php 
// session_start();
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

$getInfo = "SELECT * FROM account WHERE id = '".$_SESSION["id"]."'";
$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
$run = mysqli_query($con, $getInfo);
$row = mysqli_fetch_array($run);	
$output = '';
$output = '

<section>
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
										<input type="checkbox" checked="checked" name="sameaddress" id="sameaddress">
										<p style="display: inline-block">My billing address is the same as my shipping address</p>
									</div>
									<div id="notsameaddress" style="display:none">
										<div class="row">
											<div class="col-lg-3">
												<p>Full Name of Recipient: </p>
											</div>
											<div class="col-lg-9">
												<input type="text" name="fullname" class="dif" disabled>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3">
												<p>Address of Recipient: </p>
											</div>
											<div class="col-lg-9">
												<input type="text" name="address" class="dif" disabled>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3">
												<p>Phone of Recipient: </p>
											</div>
											<div class="col-lg-9">
												<input type="text" name="phone" class="dif" disabled>
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
								</div>';
								$total = 0;
								if(isset($_SESSION["shopping_cart"])){
                                	foreach ($_SESSION["shopping_cart"] as $pro){
										$id = $pro['id'];
										$quantity = $pro['quantity'];
										$sql = "SELECT * FROM product WHERE id = '$id'";
										$runsql = mysqli_query($con, $sql);
										$row = mysqli_fetch_array($runsql);
										$total += $row["price"] * $pro["quantity"];
									}
								}

$output.='								<div class="info_item_content">
									<div class="row">
										<div class="col-lg-4">
											<p>Subtotal:</p>
										</div>
										<div class="col-lg-8 end-lg">
											<p>'.number_format($total).'vnd</p>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8">
											<p>Shipping & Handing:</p>
										</div>
										<div class="col-lg-4 end-lg">
											0vnd
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<h3 style="font-size: 20px;">Total:</h3>
										</div>
										<div class="col-lg-8 end-lg">
											<h3 style="color: #FF3333; font-size: 20px">'.number_format($total).'vnd</h3>
										</div>
									</div>		
								</div>
							</div>
							<div class="right_sidebar_item" style="margin-top: 20px">
								<div class="info_item_header">
								<h2>In Your Cart ('.$cart_count.')</h2>
								</div>
								<div class="info_item_content">
								'; 
                                $cart_count=0;
                                    if(!empty($_SESSION["shopping_cart"])) {
                                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                                }
                                if(isset($_SESSION["shopping_cart"])){
                                	foreach ($_SESSION["shopping_cart"] as $pro){
										$id = $pro['id'];
										$quantity = $pro['quantity'];
										$sql = "SELECT * FROM product WHERE id = '$id'";
										$runsql = mysqli_query($con, $sql);
										$row = mysqli_fetch_array($runsql);

										$getBrand = "SELECT name FROM brand WHERE id = '".$row["brandid"]."'";
										$runGetBrand = mysqli_query($con, $getBrand);
										$brand = mysqli_fetch_array($runGetBrand);

$output.='							
								
									<div class="row">
										<div class="col-lg-5">
											<img style="width:100px;" src="./admin/image/product/'.$row["image"].'">
										</div>
										<div class="col-lg-7">
											<h4>'.$row["name"].'</h4>
											<p>Size: '.$row["size"].'</p>
											<p>Qty: '.$pro["quantity"].'</p>
											<p style="color: #FF3333;margin: 16px 0px;font-size: 14px">'.number_format($row["price"]).'vnd</p>
										</div>
									</div>';
								}}

									
$output .= '									<div class="row">
										<div class=col-lg-12>
											<a style="color:black;font-size:14px;" href="">Edit Cart</a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div id="submitplaceorder" class="row end-lg" >
						<input type="submit" name="placeorder" value="Place Order" id="placeorder" class="col-lg-4">
					</div>
					</form>


    </div>
</section>
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
                var k = document.getElementsByClassName("dif");
                for (var j=0; j<4; j++) {
                	 k[j].disabled = false;
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
<?php include './inc/footer.php' ?>