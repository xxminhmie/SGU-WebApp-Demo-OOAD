<?php
	$con = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
	$query = "INSERT INTO brand(name) VALUES('".$_POST["name"]."')";
	if(mysqli_query($con, $query))
	{
	     echo 'Data Inserted';
	}
	mysqli_close($con);
 ?>
