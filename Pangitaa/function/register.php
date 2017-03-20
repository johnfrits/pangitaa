<?php require_once 'etc/connection.php'; ?>

<?php 
	$error_message = "";

	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) ){
		 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

		 	//secret key
   			// $secret = '6LcpaxITAAAAAJQWchsFEKHFxnMeSXkU4U_UmUqo';
    		// //get verify response data
   			// $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    		// $responseData = json_decode($verifyResponse);
		   
		    // if($responseData->success){
		 	$username = $_POST['username'];
		 	$email = $_POST['email'];
		 	$reg_success = true;


		 	$sql = "SELECT *
					FROM   user  
					WHERE  username  = '$username'";


			$sql1 = "SELECT * 
					FROM   profile
					WHERE  email = '$email'";

			$result = $con->query($sql);
			$result1 = $con->query($sql1);

			if($result->num_rows == 1){

				$reg_success = false;
				$response_signup['same_user'] = true;
		    	echo json_encode($response_signup);
			}
			else if($result1->num_rows == 1){

				$reg_success = false;
				$response_signup['same_email'] = true;
				echo json_encode($response_signup);
			}
			if( $reg_success ){

				$username 		   = stripslashes($_POST['username']);
				$email 			   = stripslashes($_POST['email']);
				$password 		   = stripslashes($_POST['password']);
				$resignup_password = stripslashes($_POST['resignup-password']);
								
				$new_password 	   = md5($resignup_password);

			    $sql = $con->query("INSERT INTO user (username, password, Status) 
			    					VALUES ('$username', '$new_password' , 'Active')");
			    
			    $sql = $con->query("INSERT INTO profile (email) 
			    					VALUES('$email')");

		 		$response_signup['success_signup'] = true;
		    	echo json_encode($response_signup);
			//}
			// else{m

			// }
		    }
		}
	}
?>