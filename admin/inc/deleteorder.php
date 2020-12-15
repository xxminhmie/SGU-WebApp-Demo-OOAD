

<?php
 echo '<script type="text/javascript">
  alert("hi");
</script>'; 

	$connect = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
	// $sql = "DELETE FROM brand WHERE id = '".$_POST["id"]."'";
	echo '
    <script type="text/javascript">
      alert('.$_POST["oid"].');
    </script>
    ';
	$query = "UPDATE order SET status = 'Canceled' WHERE id='".$_POST["oid"]."'";
	echo $query;
	if(mysqli_query($connect, $query))
	{
		echo '
    <script type="text/javascript">
      alert("This order has been canceled!")
    </script>
    ';
	}
	mysqli_close($connect);

 ?>
