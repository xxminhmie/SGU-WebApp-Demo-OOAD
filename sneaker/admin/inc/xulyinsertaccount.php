<?php
	$con = mysqli_connect("localhost", "root", "", "website");
	if(isset($_REQUEST['submitAccount'])){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$role = $_REQUEST['role'];
		$fullname = $_REQUEST['fullname'];
		$email = $_REQUEST['email'];
		$address = $_REQUEST['address'];
		$phone = $_REQUEST['phone'];
		
		if($username==""){
	        echo '
	          <script type="text/javascript">
	            alert("Please insert username!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }
        
        elseif ($password=="") {
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
        }elseif ($fullname=="" ) {
        	echo '
	          <script type="text/javascript">
	            alert("Please insert Fullname!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }elseif ($email=="") {
        	echo '
	          <script type="text/javascript">
	            alert("Please insert Email!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }elseif ($address=="") {
        	echo '
	          <script type="text/javascript">
	            alert("Please insert Address!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }elseif ($phone=="") {
        	echo '
	          <script type="text/javascript">
	            alert("Please insert Phone!");
	            </script>
	          ';
	        echo '
	          <script type="text/javascript">
	            history.back();
	             </script>
	          ';
        }
        else{

        	$query = "INSERT INTO account(username,password,role,fullname,email,address,phone)
        	VALUES ('$username','$password','$role','$fullname','$email','$address','$phone')";
	    	$run = mysqli_query($con, $query);
	    	if ($run) {
	    		echo '
			      <script type="text/javascript">
			        alert("insert  succ");
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