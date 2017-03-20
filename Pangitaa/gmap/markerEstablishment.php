<?php require_once '../function/etc/connection.php'; ?>

<?php
session_start();
$esh_id = $_GET['esh_id'];
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
		FROM coordinates
		WHERE esh_id = '$esh_id'";
		
$result = $con->query($sql);

header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while($row = $result->fetch_assoc()){
  // ADD TO XML DOCUMENT NODE

  echo '<marker ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo '/>';
}
// End XML file
echo '</markers>';

?>