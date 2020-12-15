<?php
	$connect = mysqli_connect("sql12.freemysqlhosting.net","sql12382125","SFLxqit2c2","sql12382125");
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
