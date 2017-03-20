<?php
	include "../function/etc/connection.php";
	
	$id = $_GET['id'];
	$bus_name = $_GET['bus_name'];
	$owner_id = $_GET['owner_id'];

	if(mysqli_query($con, "Update establishment set status = 'Removed' where esh_id = '$id'"))
	{
		$sql = 	"Select email from profile where userID = '$owner_id'";
		$result = mysqli_query($con,$sql);

			while($row=mysqli_fetch_array($result))
			{
				$subject = "Establishment Removed";
				$message = "Greetings from Pangitaa!! \n We would like to inform you that your establishment '.$bus_name.' has been removed from our site.";
				$to = $row[0];
				$mailstatus = mail($to,$subject,$message);
			
				if($mailstatus)
				{
					echo'Message has been sent successfully';
					echo '<script type="text/javascript">window.location.href="manage-establishment.php"</script>';
				}
			}
	}
?>