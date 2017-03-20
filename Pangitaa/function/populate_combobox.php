<?php require_once 'etc/connection.php'; ?>
<?php 

	$sql = "SELECT DISTINCT category
			FROM establishment
			WHERE verified = 1
			AND Status != 'Removed'";

	$result = $con->query($sql);

	echo '<select id="comboboxFindNow" name ="category"class="field form-control dropdown-toggle" onclick="showMarkers()">';
    echo '<option disabled selected >Category</option>'; 
	
	  while ($row = $result->fetch_assoc()) {

        echo '<option>'. $row['category']. '</option>'; 
		
		}
	echo '</select>';
	
?>