<?php
	include "functions/etc/connection.php";
	
	$id = $_GET['userId'];
	
	if(mysqli_query($con, "Update user set Status = 'Removed' where userId = '$id'"))
	{
		echo "<script> alert('Removed'); </script>";
		echo '<script type="text/javascript">window.location.href="users.php"</script>';
	}
?>