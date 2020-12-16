<?php include './inc/header.php'; ?>
<?php 
if (isset($_GET['action']) && $_GET['action']=="remove"){
	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $key => $value) {
			// echo '<script>alert('.$value["id"].');</script>';
			if($_GET["id"] == $value["id"]){
			unset($_SESSION["shopping_cart"][$key]);
			$status = "<script>alert('
			Product is removed from your cart!')</script>";
			}
			if(empty($_SESSION["shopping_cart"]))
			unset($_SESSION["shopping_cart"]);
		}
		// echo '<script>alert("HI");</script>';		
	}
	echo '<script>window.open("cart.php","_self");</script>';
}

 ?>

<section style="margin-bottom: 8rem;">
    <div class="container">
    	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    	
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-8">
            	<div class="row">
					<!--<div class="col-lg-12" id="productincart_header">
						<h2 style="font-weight: 400; margin-bottom: 12px;font-size: 28px">Bag</h2>
					</div>-->
					<div class="col-lg-12" id="productincart_content">
						<div class="row">
							<?php
							if(isset($_SESSION["shopping_cart"])){
							   
							?>
							<?php		

										foreach ($_SESSION["shopping_cart"] as $pro){
											$id = $pro['id'];
											$quantity = $pro['quantity'];
											$sql = "SELECT * FROM product WHERE id = '$id'";
											$runsql = mysqli_query($con, $sql);
											$row = mysqli_fetch_array($runsql);

											$getBrand = "SELECT name FROM brand WHERE id = '".$row["brandid"]."'";
											$runGetBrand = mysqli_query($con, $getBrand);
											$brand = mysqli_fetch_array($runGetBrand);

									?>
							<div class="col-lg-12" id="productincart_item">
								<div class="row">
									<div class="col-lg-2" style="padding: 0">
										<img style="width: 140px;" src="<?php echo './admin/image/product/'.$row["image"]; ?>">
									</div>
									<div class="col-lg-7">
										<div class="col-lg-12">
											<h4><?php echo $row["name"]; ?></h4>
											<h5 style="color: #AAAAAA"><?php echo $brand["name"]; ?></h5>
											<h5 style="display: inline-block;">Size</h5>
											<select>
												<?php
													$s = 36;
													while ($s<44) {
													 	if($s == $row["size"]){
													 		echo '<option selected>'.$s.'</option>';
													 	}else{
													 		echo '<option>'.$s.'</option>';
													 	}
													 	$s++;
													 } 

												 ?>
												
											</select>
											<h5 style="display:inline-block;">Quantity</h5>
										
											<div class="quantity" style="display:inline;">
												<input type="text" value="<?php echo $quantity; ?>" name="quantity" readonly style="width: 32px;display:inline; border: 1px solid #AAAAAA; color: #AAAAAA; height: 28px;">    
					                        </div>
					                    	
										</div>
										<div class="col-lg-12" style="margin-top: 10px">
											<form method='get' action=''>
											<input type='hidden' name='id' value="<?php echo $pro["id"]; ?>" />
											<input type='hidden' name='action' value="remove" />
											<button type='submit' class='remove'>Remove</button>
											</form>
										</div>
									</div>
									<div class="col-lg-2">
										<h4><?php echo number_format($row["price"]); ?>vnd</h4>
									</div>
								</div>
							</div><?php		
									}
									?>
								<?php }elseif( empty($_SESSION["shopping_cart"]) || !isset($_SESSION["shopping_cart"])){

									?>

									<h2 style="font-weight: 100;font-size: 28px;color: #AAAAAA; margin: auto;">Cart Empty</h2>
									<?php
									
									} ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12" id="summary_header">
						<h2 style="font-weight: 400;font-size: 28px">Summary</h2>
					</div>
					<div class="col-lg-12" id="summary_content">
						<?php
						$totalprice = 0;
						if(isset($_SESSION["shopping_cart"])){
							foreach ($_SESSION["shopping_cart"] as $pro){
								$id = $pro['id'];
								$quantity = $pro['quantity'];
								$sql = "SELECT * FROM product WHERE id = '$id'";
								$runsql = mysqli_query($con, $sql);
								$row = mysqli_fetch_array($runsql);
								$totalprice += $quantity * $row["price"];

							}
						}
						 ?>
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-6">
										<p style="margin: 0">Subtotal</p>
									</div>
									<div class="col-lg-6" style="text-align: right;">
										<h5 style="font-size: 14px;"><?php echo number_format($totalprice); ?>vnd</h5>
									</div>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-9">
										<p style="margin: 0">Estimated Delivery & Handling</p>
									</div>
									<div class="col-lg-3" style="text-align: right;">
										<h5 style="font-size: 14px;">0vnd</h5>
									</div>
								</div>
							</div>

							<div class="col-lg-12" id="summary_total">
								<div class="row">
									<div class="col-lg-5">
										<p style="margin: 0; font-size: 18px">Total</p>
									</div>
									<div class="col-lg-7" style="text-align: right;">
										<h5 style="color: #dd2222"><?php echo number_format($totalprice); ?>vnd</h5>
									</div>
								</div>
							</div>

							<div class="col-lg-12 row center-lg" id="summary_submit">
									<div class="col-lg-12">
										<form action="checkout.php" method="post">
											<input type="submit" name="checkout" value="Check Out"
										id="cart-input" style="margin-bottom: 0.4rem; margin-top: 0.4rem;">	
										</form>
									</div>
									<div class="col-lg-12">
										<input onclick="abc()" type="submit" name="shopcon" value="Shopping Continue"
										id="cart-input">
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>

<?php 
include 'inc/brand.php';
 ?>
<?php include './inc/footer.php'; ?>
<script type="text/javascript">
	function abc() {
		window.open('shop.php','_self')
	}
</script>

