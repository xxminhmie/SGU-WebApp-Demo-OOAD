<?php
  $con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
  function editBrand(){
    global $con;

    if(isset($_REQUEST['submitBrand'])){
    	$id = $_REQUEST["id"];
    	$name = $_REQUEST["name"];
      
        
      if($name == ""){
        echo '
          <script type="text/javascript">
            alert("Please insert name!");
            </script>
          ';
        echo '
          <script type="text/javascript">
            history.back();
             </script>
          ';
      }else{
        $sql = "UPDATE brand SET name = '$name' WHERE id='$id'";
        $run = mysqli_query($con, $sql);
        echo '
        <script type="text/javascript">
          window.location.replace("../index.php?action=brand");
        </script>
        ';
      }

    	
    }
  }
  editBrand();


  mysqli_close($con);
 ?>
