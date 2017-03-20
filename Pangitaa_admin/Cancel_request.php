<?php

	include "functions/etc/connection.php";
	
	$estab_id = $_GET['estab_id'];
	$owner_id = $_GET['owner_id'];
	$bus_name = $_GET['bus_name'];

	if(mysqli_query($con, "Delete establishment where esh_id = '$estab_id'"))
	{
		$sql = 	"Select * email from profile where userID = '$owner_id'";
		$result = mysqli_query($con,$sql);

			while($row=mysqli_fetch_array($result))
			{
				$subject = "Request Confirmation";
				$message = "Greetings from Pangitaa!! \n We would like to inform you that your request has not been verified for '.$bus_name.' establishment.";
				$to = $row[0];
				$mailstatus = mail($to,$subject,$message);
			
				if($mailstatus)
				{
					echo'Message has been sent successfully';
					echo '<script type="text/javascript">window.location.href="requests.php"</script>';
				}
			}
	
	}
?>