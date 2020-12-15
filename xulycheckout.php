<?php 
session_start();
if(isset($_REQUEST["placeorder"])){
	$fullname = $_GET["fullname"];
	$address = $_REQUEST["address"];
	$phone = $_REQUEST["phone"];
	$note = $_REQUEST["note"];

	$accoutid = $_SESSION["id"];

	$curdate =  date("Y/m/d");

	$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
	$insertorder = "INSERT INTO `order`(accountid,`"."date"."`) VALUES ('".$accoutid."','".$curdate."')";
	$orderid = '';

	$runorder = mysqli_query($con, $insertorder);
	//lấy id order vừa insert để đi insert vào orderdetail
	$getNextID = "SELECT id FROM `order` ORDER BY id DESC LIMIT 1";
	$rows = mysqli_query($con, $getNextID);
	$row = mysqli_fetch_array($rows);

	foreach ($_SESSION["shopping_cart"] as $pro){
		$rowdetailprice = 0;
		$getPriceById = "SELECT price FROM product WHERE id = '".$pro['id']."'";
		$runGetPriceById = mysqli_query($con, $getPriceById);
		$rowGetPriceById = mysqli_fetch_array($runGetPriceById);
		$rowdetailprice = $rowGetPriceById["price"] * $pro["quantity"];

		$insertorderdetail = "INSERT INTO orderdetail(orderid,productid,quantity,fullname,address,phone,note,price)
							VALUES ('".$row["id"]."','".$pro["id"]."','".$pro["quantity"]."','".$_REQUEST["fullname"]."','".$address."','".$phone."','".$note."','".$rowdetailprice ."')";
		$run = mysqli_query($con, $insertorderdetail);
	}

	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $key => $value) {
			unset($_SESSION["shopping_cart"][$key]);
		}
	}



	//Update totalprice ở order sau khi thêm order detail
	$totalprice = 0;
	$getListDetail = "SELECT * FROM orderdetail WHERE orderid = '".$row["id"]."'";
	  $runListDetail = mysqli_query($con, $getListDetail);

	  while($rowListDetail = mysqli_fetch_array($runListDetail)){
	    $totalprice += $rowListDetail["price"];
	  }
	$updateOrder = "UPDATE `order` SET totalprice = '".$totalprice."' WHERE id = '".$row['id']."'"; 
	$runUpdateOrder = mysqli_query($con, $updateOrder);
	echo '<script>alert("Place order successfully");</script>';
	echo '<script>window.open("index.php","_self");</script>';


}

?>


