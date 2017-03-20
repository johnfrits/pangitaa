<?php require_once '../function/etc/connection.php'; ?>

<?php
session_start();
$userID = $_SESSION['userID'];
function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 


// Select all the rows in the markers table
$sql = "SELECT * 
		FROM coordinates, establishment, user
		WHERE '$userID' = establishment.owner_id AND establishment.esh_id = coordinates.esh_id   
    AND   establishment.verified = 1
    AND   establishment.Status = 'Active'";
$result = $con->query($sql);

header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while($row = $result->fetch_assoc()){
  // ADD TO XML DOCUMENT NODE

  echo '<marker ';
  echo 'id="' . $row['esh_id'] . '" ';
  echo 'business_name="' . $row['business_name'] . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo '/>';
}
// End XML file
echo '</markers>';

?>