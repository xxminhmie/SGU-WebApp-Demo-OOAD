
<?php 
$con = mysqli_connect("localhost","root","","website");
// $query = "SELECT * FROM product";
// $run = mysqli_query($con, $query);

$record_per_page = 9;  
$page = '';
if(isset($_REQUEST["page"])){
	$page = $_REQUEST["page"];  
}else{
	$page = 1;
}

$start_from = ($page - 1)*$record_per_page;
$query = "";
//echo "<script>alert(".$_REQUEST["brand"].");</script>";
if($_REQUEST["brand"] == 0){
	$query = "SELECT DISTINCT id, brandid, name, color, price, image FROM product ORDER BY id DESC LIMIT $start_from, $record_per_page";  
}else{
	$query = "SELECT DISTINCT id, brandid, name, color, price, image FROM product WHERE brandid = '".$_REQUEST["brand"]."' 
	ORDER BY id DESC LIMIT $start_from, $record_per_page";  
}

$run = mysqli_query($con, $query);  
 ?>
<div class="row">
	<!-- Item -->
	<?php 
	while ($row = mysqli_fetch_array($run)) {
		$getBrand = "SELECT name FROM brand WHERE id = '".$row['brandid']."'";
		$rungetBrand = mysqli_query($con, $getBrand);
		$rowBrand = mysqli_fetch_array($rungetBrand);
		echo '
	
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" style="margin-bottom: 16px">
		<a href="productdetail.php?productid='.$row["id"].'" style="display: inline-block">
		 	<div class="row">
		 		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0">
		 			<img class="col-xs-12 col-sm-12 col-md-12 col-lg-12"src="./admin/image/product/'.$row["image"].'">
		 		</div>
		 		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 			<div class="row" style="padding: 0 1rem;">
			 			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding: 0">
			 				<h3 style="margin: 2px;font-size: 14px;">'.$row["name"].'</h3>
			 				<h4 style="color: #AAAAAA; margin: 0;font-size: 14px">'.$rowBrand["name"].'</h4>
			 			</div>
			 			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="text-align:end; padding: 0">
			 				<p style="margin: 0;font-size: 14px;">'.number_format($row["price"]).'vnd</p>
			 			</div>
			 		</div>
		 		</div>
		 	</div></a>
		 </div>
	

		';
	}
	?>		
	 <!-- End Item -->
</div>



