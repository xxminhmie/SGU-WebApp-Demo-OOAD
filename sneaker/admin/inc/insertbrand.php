<?php
	$con = mysqli_connect("localhost", "root", "", "website");
	$query = "INSERT INTO brand(name) VALUES('".$_POST["name"]."')";
	if(mysqli_query($con, $query))
	{
	     echo 'Data Inserted';
	}
	mysqli_close($con);
 ?>
