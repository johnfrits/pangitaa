<?php require_once 'etc/connection.php'; ?>

<?php 


if(isset($_SESSION['username_logged_in']) && $_SESSION['username_logged_in'] == true){
	  
	  $firstname 		= "test";
	  $lastname 		= "test";
	  $position 		= "test";
	  $contact_number 	= "test";
	  $telephone_number = "test";
	  $address 			= "test";
	  $email 			= "test";
	  $image_name 		= "test";
	  $userID 			= false;

	  if(isset($_SESSION['userID'])){
	  	$userID = $_SESSION['userID'];
	  }


	  	$sql = "SELECT *
	  			FROM   profile 
	  			WHERE  userID = '$userID'";

	  	$result = $con->query($sql);

	  	if($result->num_rows > 0){

	  		while($row = $result->fetch_assoc()){

		  		 $firstname = $row['firstname'];
				 $lastname = $row['lastname'];
				 $position = $row['position'];
				 $contact_number = $row['contact_number'];
				 $telephone_number = $row['telephone_number'];
				 $address = $row['address'];
				 $email = $row['email'];
				 $image_name = $row['image_name'];
			}
	  	}
	  	function displayProfPic(){

	  		global $image_name;
	  		$nImage_name = $image_name;

	  		if(strlen($nImage_name) > 0)
	  		echo '<img height=210 width=210 src="../function/uploads/profpic/'.$nImage_name.'" class="avatar img-circle img-thumbnail" alt="avatar" id="imageProf" >';  
	  		else
	  		echo '<img height=210 width=210 src="http://placehold.it/210x210" class="avatar img-circle img-thumbnail" alt="avatar" id="imageProf" >';  

	  	}

	  	function displayNavBarUserInfo(){
	  	     global $firstname, $lastname, $position, $email;
	  	     $snewfirstname = strlen($firstname) == 0 ? "New" : $firstname; 
	  	     $newlastname = strlen($lastname) == 0 ?  "User" : $lastname; 
	  	     $newposition = strlen($position) == 0 ? "Update Your Profile" : $position;
	  	     $newemail = $email;
	  	  
	  		 echo '<div class="col-lg-8">';
	            echo '<p class="text-left"><strong>' .$snewfirstname. ' '. $newlastname.'</strong></p>';
	            echo '<p class="text-left small">' .  $newposition . ' </p>';
	            echo '<p class="text-left small">'.$email. '</p>';
	            echo '<p class="text-left">';
	            echo '<a href="../public/profile.php" class="btn btn-info btn-block btn-sm">Manage Account</a>';
	            echo '<a href="../public/manage-establishment.php" class="btn btn-info btn-block btn-sm">Manage Establishment</a>';
	            echo '</p>';
			 echo '</div>';
	  	}

	  	function displayNavBarUserTitle(){
	  		global $firstname;
	  		$fnewfirstname = strlen($firstname) == 0 ? "Welcome !" : $firstname; 

	  		echo '<span class="glyphicon glyphicon-user"></span>';
            echo '<strong> &nbsp; &nbsp; '. $fnewfirstname .' &nbsp; &nbsp; </strong>';
            echo '<span class="glyphicon glyphicon-chevron-down"></span>';
	  	}
	}
?>	