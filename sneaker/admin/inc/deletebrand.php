<?php
	$connect = mysqli_connect("localhost", "root", "", "website");
	$sql = "DELETE FROM brand WHERE id = '".$_POST["id"]."'";
	$query = "UPDATE brand SET status = 'deleted' WHERE id='$id'";
	if(mysqli_query($connect, $sql))
	{
		echo '
    <script type="text/javascript">
      alert("This brand has been deleted!")
    </script>
    ';
	}
	mysqli_close($connect);

 ?>
