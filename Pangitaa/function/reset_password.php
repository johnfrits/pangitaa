<?php require_once 'etc/connection.php'; ?>

<?php 
	
	session_start();

	if(isset($_POST['reset']) && isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['retype_password']) ){

		$userID 		  = $_GET['userID'];
		$old_password     = md5(mysqli_real_escape_string($con, $_POST['old_password']));
		$new_password 	  = md5(mysqli_real_escape_string($con, $_POST['new_password']));
		$retyped_password = md5(mysqli_real_escape_string($con, $_POST['retype_password']));
		$status 		  = false;
	

		$sql = "SELECT userID, password
				FROM   user
				WHERE  userID 	= '$userID' 
				AND	   password = '$old_password'";

		$result = $con->query($sql);

		if($result->num_rows == 1){

			if($new_password == $retyped_password){

				$sql = "UPDATE user
						SET password = '$retyped_password' 
						WHERE userID = '$userID'";

				if($con->query($sql) == TRUE){
					$_SESSION['showPanel'] = true;
					$status = true;
					header('Location: ../public/profile.php?change_password='.$status.'');
					$con->close();
				}
				else{
					$_SESSION['showPanel'] = true;
					$status = false;
					header('Location: ../public/profile.php?change_password='.$status.'');
					$con->close();
				}
			}
		}
		else{
			$_SESSION['showPanel'] = true;
			$status = false;
			header('Location: ../public/profile.php?change_password='.$status.'');
			$con->close();
		}
	}
?>