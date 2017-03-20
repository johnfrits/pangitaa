<?php require_once 'etc/connection.php'; ?>

<?php 
	session_start();

	if(isset($_POST['add'])){

		$owner_id 	= $_GET['userID'];
		$bus_name 	= $_POST['esh_name'];
		$street_add = $_POST['street_add'];
		$route 		= isset($_POST['route']) ? $_POST['route'] : "none"; 
		$city 		= $_POST['city'];
		$region 	= isset($_POST['region']) ? $_POST['region'] : "none";
		$pzcode 	= isset($_POST['zip_code']) ? $_POST['zip_code'] : "none";
		$country 	= $_POST['countryselect'];
		$b_phone 	= $_POST['business_phone'];
		$email_add 	= $_POST['email_add'];
		$category 	= ucwords($_POST['category']);
		$lat 		= $_POST['lat'];
		$lng 		= $_POST['lng'];
		

		  //upload image
	    $targetPath 	   = "uploads/estpic/"; 
		$targetPath 	   = $targetPath.basename($_FILES['image']['name']);            
		$img 			   = $_FILES['image']['name'];

		if(move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)){ 
		}

		$sql = $con->query("INSERT INTO 
							-- table name;
							establishment 
						  	( owner_id , business_name  , street_address , 
						      route    , city, region   , postal_code    ,
						      country  , business_phone , email          , 
						      category , image_name    
						    ) 
	    			  	   	VALUES 
	    			  	   	(
	    			  				'$owner_id'  , '$bus_name' , '$street_add' ,
	    			  				'$route'     , '$city'	   , '$region'     ,
	    			  				'$pzcode'    , '$country'  , '$b_phone'	   ,
	    			  				'$email_add' , '$category' , '$img'  		
	    			  		)
		    			  ");

		$sql = $con->query("INSERT INTO 
							-- table name;
							coordinates 
						  	( latitude  , longitude ) 
	    			  	   	VALUES 
	    			  	   	(
	    			  		  '$lat' , '$lng'
	    			  		)
		    			   ");
		

		$_SESSION['success1'] = true;
    	header("Location: ../public/success_page.php");
		$con->close();
	}
?>