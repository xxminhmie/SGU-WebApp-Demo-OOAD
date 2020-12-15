
<?php 
if(isset($_REQUEST["confirm"])){
  $orderid = $_REQUEST["orderid"];
  $con = mysqli_connect("localhost","root","","website");
  $sql = "UPDATE `order` SET status = 'Confirmed' WHERE id ='".$orderid."'";
  $runsql = mysqli_query($con, $sql);
  echo '<script type="text/javascript">
  history.back();
 </script>';
}
 ?>
 