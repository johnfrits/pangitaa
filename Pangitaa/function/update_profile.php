<?php require_once 'etc/connection.php'; ?>

<?php 
	session_start();
	if(isset($_POST['update'])){
		
		$userID			   = $_GET['userID'];
		$ufirstname        = ucwords($_POST['firstname']);
		$ulastname  	   = ucwords($_POST['lastname']);
		$uposition  	   = ucwords($_POST['position']);
		$ucontact_number   = $_POST['contact_number'];
		$utelephone_number = $_POST['telephone_number'];
		$uaddress 		   = ucwords($_POST['address']);
		$uemail 		   = $_POST['email'];

	    //upload image
	    $targetPath 	   = "uploads/profpic/"; 
		$targetPath 	   = $targetPath.basename($_FILES['image']['name']);            
		$img 			   = $_FILES['image']['name'];


        if (isset($ufirstname)      || isset($ulastname)  		 || isset($uposition) || 
	  	    isset($ucontact_number) || isset($utelephone_number) || isset($uaddress)  ||  
	  	    isset($uemail)) {

		$sql = "UPDATE profile  	
				SET    firstname 		 = '$ufirstname'        ,
					   lastname 		 = '$ulastname' 	    , 
					   position  		 = '$uposition'		    , 
					   contact_number  	 = '$ucontact_number' 	, 
					   telephone_number  = '$utelephone_number' , 
					   address 		 	 = '$uaddress'          , 
					   email		  	 = '$uemail'			
				WHERE 
					   userID 			 = '$userID' ";

		if(move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)){ 
			
		$sql = "UPDATE profile  	
				SET    firstname 		 = '$ufirstname'        ,
					   lastname 		 = '$ulastname' 	    , 
					   position  		 = '$uposition'		    , 
					   contact_number  	 = '$ucontact_number' 	, 
					   telephone_number  = '$utelephone_number' , 
					   address 		 	 = '$uaddress'          , 
					   email		  	 = '$uemail'			,
					   image_name 		 = '$img'
				WHERE 
					   userID 			 = '$userID' ";
	  		}
		}	

		if($con->query($sql) == TRUE){

			$_SESSION['showPanel'] = true;
			header('Location: ../public/profile.php?update_successful=true');
			$con->close();
		}
	}
?>