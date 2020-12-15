<?php
	include 'image.php'; 
	$con = mysqli_connect("localhost", "root", "", "website");
	if(isset($_REQUEST['submitProduct'])){
		$id = $_REQUEST['id'];
		$brandid = $_REQUEST['brandid'];
		$size = $_REQUEST['size'];
		$color = $_REQUEST['color'];
		$name = $_REQUEST['name'];
		$image = $_FILES["fileupload"]["name"];
		$pathimage = "../image/product/".$image;
		if(!file_exists($pathimage)){
			loadImageProcess();
		}
		$quantity = $_REQUEST['quantity'];
		$price = $_REQUEST['price'];
		$status = $_REQUEST['status'];
		
		if($brandid==""){
	        echo '
	          <script type="text/javascript">
	            alert("Please choose BrandID!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }
        elseif ($size=="") {
        	echo '
	          <script type="text/javascript">
	            alert("Please choose Size!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }
        elseif ($name=="") {
        	echo '
	          <script type="text/javascript">
	            alert("Please insert Name!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }
        elseif ($quantity=="" ) {
        	echo '
	          <script type="text/javascript">
	            alert("Please insert Quantity!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }
        elseif ($price=="") {
        	echo '
	          <script type="text/javascript">
	            alert("Please insert Price!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }
        else{
        	if($image==""){
        		$getImage = "SELECT image FROM product WHERE id = '$id'";
        		$run = mysqli_query($con, $getImage);
        		$row = mysqli_fetch_array($run);
        		$image = $row["image"];
        	}
        	
        
        	$query = "UPDATE product SET brandid='$brandid', size='$size',
			color='$color', name='$name', image='$image', quantity='$quantity', price='$price',
			status='$status' WHERE id='$id'";
	    	$run = mysqli_query($con, $query);
	    	if ($run) {
	    		echo '
			      <script type="text/javascript">
			        alert("update succ");
			      </script>
			      ';
			    echo '
			        <script type="text/javascript">
			          window.location.replace("../index.php?action=product");
			        </script>
			        ';
	    	}

        }	
	}
	mysqli_close($con);

 ?>