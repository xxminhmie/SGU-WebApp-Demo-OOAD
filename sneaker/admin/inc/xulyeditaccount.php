<?php
  $con = mysqli_connect("localhost", "root", "", "website");
    if(isset($_REQUEST['submitAccount'])){
    	$id = $_REQUEST["id"];
    	$username = $_REQUEST["username"];
      $password = $_REQUEST["password"];
      $role = $_REQUEST["role"];
      $fullname = $_REQUEST["fullname"];
      $address = $_REQUEST["address"];
      $phone = $_REQUEST["phone"];
      $email = $_REQUEST["email"];
      
      
        $sql = "UPDATE account SET username='$username',password='$password',role='$role',fullname='$fullname',email='$email',address='$address',phone='$phone' WHERE id='$id'";
        $run = mysqli_query($con, $sql);
        if($run){
          echo '
            <script type="text/javascript">
              alert("Update successfully!");
            </script>
            ';
        }else{
          echo '
            <script type="text/javascript">
              alert("Update failed!");
            </script>
            ';
        }
        echo '
        <script type="text/javascript">
          window.location.replace("../index.php?action=account");
        </script>
        ';
      

    	
    }
  


  mysqli_close($con);
 ?>
