  <?php require_once '../function/etc/connection.php'; ?>

<?php
// session_start();
// $userID = $_SESSION['userID'];

$category = $_GET['category'];
$searchString = isset($_GET['searchString']) ? $_GET['searchString'] : "";


function parseToXML($htmlStr)   
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 


$sql = "";

$sql = "SELECT *
    FROM  establishment, coordinates
    WHERE establishment.category = '$category'
    AND   establishment.business_name LIKE  '%$searchString%'
    AND   establishment.esh_id = coordinates.esh_id
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
  echo 'street_address="' . $row['street_address'] . '" ';
  echo 'business_phone="' . $row['business_phone'] . '" ';
  echo 'email="' . $row['email'] . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo 'img="' . $row['image_name'] . '" ';
  echo '/>';
}
// End XML file
echo '</markers>';
?>