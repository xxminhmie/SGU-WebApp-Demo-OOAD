<?php
	$connect = mysqli_connect("localhost", "root", "", "website");
	$sql = "DELETE FROM account WHERE id = '".$_POST["id"]."'";
	if(mysqli_query($connect, $sql))
	{
		echo '
    <script type="text/javascript">
      alert("This product has been deleted!")
    </script>
    ';
	}
	mysqli_close($connect);
 ?>
