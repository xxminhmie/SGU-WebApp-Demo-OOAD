
<?php 
if(isset($_REQUEST["confirm"])){
  $orderid = $_REQUEST["orderid"];
  $con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
  $sql = "UPDATE `order` SET status = 'Confirmed' WHERE id ='".$orderid."'";
  $runsql = mysqli_query($con, $sql);
  echo '<script type="text/javascript">
  history.back();
 </script>';
}
 ?>
 