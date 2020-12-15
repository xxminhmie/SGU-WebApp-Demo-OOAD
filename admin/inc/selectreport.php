<?php
$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
$brand = 0;
$sql1 = "SELECT DISTINCT id,name,color FROM product";
if (isset( $_REQUEST['brand'])) {
	$brand= $_REQUEST['brand'];
	if($brand!=0){
		$sql1 = "SELECT DISTINCT id,name,color FROM product WHERE brandid = '".$brand."'";
	}
}

$run1= mysqli_query($con, $sql1);

$output ='';

$output = '
<div class="row grid-responsive">
<div class="column ">
<div class="card">
	<div class="card-block">
		<table>
			<thead>
				<tr>
					<th>ProductID</th>
					<th>ProductName</th>
					<th>Color</th>
					<th>Sold Quantity</th>
				</tr>
			</thead>
			<tbody>';
			$date = "";
			$month = "";
			$monthyear = "";
			$year = "";
			
			if(isset($_REQUEST['date'])){
				$date = $_REQUEST['date'];
// 				echo '

// <script type="text/javascript">
// 	alert("'.$date.'");
// </script>';
			}
			if(isset($_REQUEST['month']) && isset($_REQUEST['monthyear'])) {
				$month = $_REQUEST['month'];
				$monthyear = $_REQUEST['monthyear'];
			}
			if(isset($_REQUEST['year'])){
				$year = $_REQUEST['year'];
			}

			//====CHUA TON TAI THOI GIAN
			if($date=="" && $month=="" && $monthyear=="" && $year==""){
				while($row1 = mysqli_fetch_array($run1)){
				$sql2 = "SELECT orderid,quantity FROM orderdetail WHERE productid = '".$row1['id']."'";
				$run2 = mysqli_query($con, $sql2);
				$sl = 0;
				$sql3 = "";
				while($row2 = mysqli_fetch_array($run2)){	
					$sql3 = "SELECT status FROM `order` WHERE id = '".$row2['orderid']."'";
					$run3 = mysqli_query($con, $sql3);
					$row3 = mysqli_fetch_array($run3);
					if($row3['status'] === "Confirmed"){
						$sl += $row2['quantity'];
					}
				}
			
											
				
$output .='							<tr>
										<td>'.$row1["id"].'</td>
										<td>'.$row1["name"].'</td>
										<td>'.$row1["color"].'</td>
										<td>'.$sl.'</td>
										
									</tr>';
									
				}//end while

			}
			//====DA TON TAI THOI GIAN
			else{
				if($date!=""){
				$sql3 = "SELECT orderid, productid, quantity, "."date".", SUM(quantity) AS qty, status
FROM orderdetail, `order`
WHERE orderdetail.orderid = `order`.`id` AND date = '".$date."' AND status = 'Confirmed'
GROUP BY productid
HAVING COUNT(productid) >= 1  ORDER BY qty DESC";
				
				$run3 = mysqli_query($con, $sql3);
				while($row3 = mysqli_fetch_array($run3)){
					$sql4 = "SELECT name,color,brandid FROM product WHERE id = '".$row3['productid']."'" ;
					$run4 = mysqli_query($con, $sql4);
					$row4 = mysqli_fetch_array($run4);
					if($brand!=0){
					if ($row4["brandid"] == $brand) {
$output .='							<tr>
										<td>'.$row3["productid"].'</td>
										<td>'.$row4["name"].'</td>
										<td>'.$row4["color"].'</td>
										<td>'.$row3["qty"].'</td>
										
									</tr>';									
					}
					}else{
$output .='							<tr>
										<td>'.$row3["productid"].'</td>
										<td>'.$row4["name"].'</td>
										<td>'.$row4["color"].'</td>
										<td>'.$row3["qty"].'</td>
										
									</tr>';										
					}

		
				}

			}
			if($month!="" && $monthyear!=""){
				$sql3 = "SELECT orderid, productid, quantity, "."date".", SUM(quantity) AS qty, status
FROM orderdetail, `order`
WHERE orderdetail.orderid = `order`.`id` AND MONTH(date) = '".$month."' AND YEAR(date) = '".$monthyear."' AND status = 'Confirmed'
GROUP BY productid
HAVING COUNT(productid) >= 1  ORDER BY qty DESC";
				
				$run3 = mysqli_query($con, $sql3);
				while($row3 = mysqli_fetch_array($run3)){
					$sql4 = "SELECT name,color,brandid FROM product WHERE id = '".$row3['productid']."'";
					$run4 = mysqli_query($con, $sql4);
					$row4 = mysqli_fetch_array($run4);
					if($brand!=0){
					if ($row4["brandid"] == $brand) {
$output .='							<tr>
										<td>'.$row3["productid"].'</td>
										<td>'.$row4["name"].'</td>
										<td>'.$row4["color"].'</td>
										<td>'.$row3["qty"].'</td>
										
									</tr>';									
					}
					}else{
$output .='							<tr>
										<td>'.$row3["productid"].'</td>
										<td>'.$row4["name"].'</td>
										<td>'.$row4["color"].'</td>
										<td>'.$row3["qty"].'</td>
										
									</tr>';										
					}				
				}

			}
			if($year!=""){
				$sql3 = "SELECT orderid, productid, quantity, "."date".", SUM(quantity) AS qty, status
FROM orderdetail, `order`
WHERE orderdetail.orderid = `order`.`id` AND YEAR(date) = '".$year."' AND status = 'Confirmed'
GROUP BY productid
HAVING COUNT(productid) >= 1  ORDER BY qty DESC";
				
				$run3 = mysqli_query($con, $sql3);
				while($row3 = mysqli_fetch_array($run3)){
					$sql4 = "SELECT name,color,brandid FROM product WHERE id = '".$row3['productid']."'";
					$run4 = mysqli_query($con, $sql4);
					$row4 = mysqli_fetch_array($run4);
					if($brand!=0){
					if ($row4["brandid"] == $brand) {
$output .='							<tr>
										<td>'.$row3["productid"].'</td>
										<td>'.$row4["name"].'</td>
										<td>'.$row4["color"].'</td>
										<td>'.$row3["qty"].'</td>
										
									</tr>';									
					}
					}else{
$output .='							<tr>
										<td>'.$row3["productid"].'</td>
										<td>'.$row4["name"].'</td>
										<td>'.$row4["color"].'</td>
										<td>'.$row3["qty"].'</td>
										
									</tr>';										
					}				
				}

			}

			}
			
			
			
$output.='							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
';
echo $output;

?>
