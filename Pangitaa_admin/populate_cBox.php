<?php require_once 'functions/etc/connection.php'; ?>
<?php 

	$sql = "SELECT DISTINCT category FROM establishment";

	$result = mysqli_query($con,$sql);

	echo '<select name ="category"class="field form-control dropdown-toggle">';
    echo '<option disabled selected >Category</option>'; 
	
	  while ($row = mysqli_fetch_array($result)) {

        echo '<option>'. $row['category']. '</option>'; 
		
		}
	echo '</select>';
	
?>