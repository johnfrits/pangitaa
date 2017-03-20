<?php require_once 'etc/connection.php'; ?>
<?php
    session_start();

    $userID = "";
    $showWarning = true;
	$_SESSION['userID'] = false;
	$_SESSION['$showThisWarning'] = false;
	
	if(isset($_POST['login_username']) && isset($_POST['login_password'])){
		
		$response['success'] = false;
		$username 			 = stripslashes($_POST['login_username']);
		$password 			 = stripslashes($_POST['login_password']);
		
		$username            = mysqli_real_escape_string($con, $username);
		$password            = mysqli_real_escape_string($con, $password);
		$password 			 = md5($password);
	    

		$sql = "SELECT user.userID, profile.firstname 
				FROM   user, profile  
				WHERE  username  = '$username' and password = '$password'
				AND    user.userID = profile.userID
				AND    user.Status = 'Active'";

		$result = $con->query($sql);

		if($result->num_rows == 1){
			$response['success'] = true;
			
			while($row = $result->fetch_assoc()){

				$chk_firstname 					= $row['firstname'];
				$userID 						= $row['userID'];
				$_SESSION['userID'] 			= $userID;
				$_SESSION['username_logged_in'] = true;
				$response['new'] 				= empty($chk_firstname) ? true : false;
			}
		}
		echo json_encode($response);
	}
?>	