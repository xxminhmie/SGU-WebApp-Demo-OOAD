<?php
	include 'image.php'; 
	$con = mysqli_connect("localhost", "root", "", "website");
	if(isset($_REQUEST['submitProduct'])){
		$brandid = $_REQUEST['brandid'];
		// $size = $_REQUEST['size'];
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
        // elseif ($size=="") {
        // 	echo '
	       //    <script type="text/javascript">
	       //      alert("Please choose Size!");
	       //      </script>
	       //    ';
	       //  echo '
	       //    <script type="text/javascript">
	       //      history.back();
	       //       </script>
	       //    ';
        // }
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
        }elseif ($quantity=="" ) {
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
        }elseif ($price=="") {
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
        }else{
        	if($image==""){
        		$getImage = "SELECT image FROM product WHERE id = '$id'";
        		$run = mysqli_query($con, $getImage);
        		$row = mysqli_fetch_array($run);
        		$image = $row["image"];
        	}

        	
	    	$getNextID = "SELECT id FROM `product` ORDER BY id DESC LIMIT 1";
			$rowsGetNextID = mysqli_query($con, $getNextID);
			$rowGetNextID = mysqli_fetch_array($rowsGetNextID);
			$nextID = $rowGetNextID["id"] + 1;
			// echo '
			//       <script type="text/javascript">
			//         alert("'.$nextID.'");
			//       </script>
			//       ';

	    	$s=36;
    		while ($s<44) {
    			if(isset($_REQUEST[$s])){
    				$query1 = "INSERT INTO product(id,brandid,size,color,name,image,quantity,price,status) 
    					VALUES('".$nextID."','$brandid','".$s."','$color','$name','$image','$quantity','$price','$status')";
    				$run1 = mysqli_query($con, $query1);
    			}
    		$s++;
	    	}
	    	

        	
      //   	$query = "INSERT INTO product(brandid,size,color,name,image,quantity,price,status) 
      //   				VALUES('$brandid','$size','$color','$name','$image','$quantity','$price','$status')";
	    	// $run = mysqli_query($con, $query);
	    	// if ($run) {
	    		echo '
			      <script type="text/javascript">
			        alert("Insert successfully!");
			      </script>
			      ';
			    // echo '
			    //     <script type="text/javascript">
			    //       window.location.replace("../index.php?action=product");
			    //     </script>
			    //     ';
	    	// }

        }	
	}
	mysqli_close($con);

 ?>