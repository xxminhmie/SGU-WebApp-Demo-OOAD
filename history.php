<?php include 'inc/header.php'; ?>
<div class="col-lg-12" id="productincart_header">
	<h2 style="font-weight: 400; margin-bottom: 12px;font-size: 28px">History</h2>
</div>
<div class="col-lg-12" id="productincart_content">
	<dsiv class="row">
		<?php
		$sql = "SELECT * FROM `order` WHERE accountid = '".$_SESSION["id"]."'";
		$run = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($run)){
			$sql1 = "SELECT * FROM orderdetail WHERE orderid = '".$row["id"]."'";
			$run1 = mysqli_query($con, $sql1);
			while ($row1 = mysqli_fetch_array($run1)) {
				$sql2 = "SELECT * FROM product WHERE id = '".$row1["productid"]."'";
				$run2 = mysqli_query($con, $sql2);
				$row2 = mysqli_fetch_array($run2);

				$sql3 = "SELECT name FROM brand WHERE id = '".$row2["brandid"]."'";
				$run3 = mysqli_query($con, $sql3);
				$row3 = mysqli_fetch_array($run3);
		?>
		<div class="col-lg-12" id="productincart_item">
			<div class="row">
				<div class="col-lg-2" style="padding: 0">
					<img style="width: 140px;" src="<?php echo './admin/image/product/'.$row2["image"]; ?>">
				</div>
				<div class="col-lg-7">
					<div class="col-lg-12">
						<h4><?php echo $row2["name"]; ?></h4>
						<h5 style="color: #AAAAAA"><?php echo $row3["name"]; ?></h5>
						<h5 style="display: inline-block;">Size: <?php echo $row2["size"]; ?></h5>
						
						<h5 style="display:inline-block;">Quantity: <?php echo $row1["quantity"]; ?></h5>
					
						
					</div>
					
				</div>
				<div class="col-lg-2">
					<h4><?php echo number_format($row2["price"]); ?>vnd</h4>
				</div>
			</div>
		</div>
		<?php 
		}

		} ?>
	</div>
</div>
<?php include 'inc/footer.php'; ?>