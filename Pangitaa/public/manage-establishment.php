
<?php ob_start();?>
<?php session_start();?>

<?php
  if(!$_SESSION['username_logged_in']){
  header("Location: HTTP/1.1 404 File Not Found", 404);
          exit;
  }
?>

<?php include'../function/show_profile.php'; ?>


<html>
<head>
      <!--metaaa-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="http://pangitaa.azurewebsites.net">
    <meta property="og:image" content="img/jimg2.jpg">
    <meta property="og:title" content="Pangitaa">
    <meta property="og:description" content="Find Your Local Establishment Near You.">
    <title>Find Your Local Establishment Near You</title>

    <!--CSS-->  
    <link href="../resources/CSS/login.css" rel="stylesheet" />
    <link href="../resources/CSS/establishment.css" rel="stylesheet"/>
    <link href="../resources/CSS/style.css" rel="stylesheet"/>
    <link href="../resources/CSS/reset.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.css" rel="stylesheet"/>
    <style type="text/css">
      .btn-default{
        margin-right: 10px;
      }
      .col-md-3{
        padding-right: 5px;
       
      }
     .panel-body{
        background-color:#4e5d6c;
        margin-top: 7px;
      }
      .thumbnail{ border:1px solid;}
    </style>
   
    <!--JSJSJS-->
    <script src="../resources/JS/jquery-1.11.3.min.js"></script>   
    <script src="../resources/JS/bootstrap.min.js"></script>
    <script src="../resources/JS/scroll.js"></script>
    <script src="../resources/JS/smoothscroll.js"></script>
    <script src="../resources/JS/main.js"></script>
    <script src="../resources/JS/viewImageUpload.js"></script>
    <!--end-->

</head>
<body>
  <div id="nav-bar">
    <?php 
          if(isset($_SESSION['username_logged_in']) && $_SESSION['username_logged_in'] == true)
              include "../includes/nav-bar-login.php";
          else 
              include "../includes/nav-bar.php"; 
      ?>
    </div>


<div class="container" style="padding-top: 40px; padding-bottom: 50px;">
  <h1 class="page-header">Establishment</h1>
  <div class="row">

    <div id = "map">  
       <?php include "../gmap/establishmentMap.php"; ?> 
    </div>


  <div class="panel-body">
    <?php

    $userId = $_SESSION['userID'];

    $sql = "Select * from establishment where verified = 1 and Status != 'Removed' and owner_id = $userID";
        
  
    $result = mysqli_query($con, $sql);
    $count = 0;
    while($row = mysqli_fetch_array($result))
    {
      echo'
        <div class="col-md-3">
          <div class="thumbnail">';
          if($row["image_name"] == "")
            echo'<img class="img-thumbnail" name="img" src="../function/uploads/default.png">';
          else
            echo'<img class="img-thumbnail" name="img" src="../function/uploads/estpic/'.$row["image_name"].'">';

          echo'<div class="caption">
            <h3>'.$row["business_name"].'</h3>
            <p name="st_add">Street Address: '.$row["street_address"].'</p>
            <p name="route">Route: '.$row["route"].'</p>
            <p name="city">City: '.$row["city"].'<p>  
            <p name="region">Region: '.$row["region"].'<p>
            <p name="postal">Postal Code: '.$row["postal_code"].'<p>
            <p name="country">Country: '.$row["country"].'<p>
            <p name="bus_num">Business Number: '.$row["business_phone"].'<p>  
            <a class="btn btn-primary" name="view" onclick="clickbuttonShowLocationMarker('.$row["esh_id"].')" >View</a> 
            <a class="btn btn-primary" name="remove" href="Update_Estab_Status.php?id='.$row[0].'&bus_name='.$row[2].'&owner_id='.$row[1].'">Remove</a>   
          </div>
          </div>
        </div>';
      $count +=1;
    }
    if($count <= 0)
      echo'No Result found.';
    
  ?>
  </div>

   <div class="form-group" style="margin-top: 20px;">
          <a class="btn btn-primary pull-right" href="add-establishment.php">Add Establishment</a>
    </div>
  </div>

  </div>
</div>

  <div id="footer">
    <?php include "../includes/footer.php"; ?>
  </div>


</body>
</html>