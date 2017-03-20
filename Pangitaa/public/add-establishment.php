<?php ob_start();?>
<?php session_start(); ?>

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
    <link href="../resources/CSS/login.css"  rel="stylesheet" />
    <link href="../resources/CSS/findnow.css" rel="stylesheet"/>
    <link href="../resources/CSS/style.css" rel="stylesheet"/>
    <link href="../resources/CSS/reset.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.css" rel="stylesheet"/>
   
    <!--JSJSJS-->
    <script src="../resources/JS/jquery-1.11.3.min.js"></script>   
    <script src="../resources/JS/bootstrap.min.js"></script>
    <script src="../resources/JS/scroll.js"></script>
    <script src="../resources/JS/nav-barcolor.js"></script>
    <script src="../resources/JS/smoothscroll.js"></script>
    <script src="../resources/JS/main.js"></script>
    <!--end-->

</head>
<body>
    <div id="navbar">
          <?php 
          if(isset($_SESSION['username_logged_in']) && $_SESSION['username_logged_in'] == true)
              include "../includes/nav-bar-login.php";
          else 
              include "../includes/nav-bar.php"; 
         ?>
    </div>
      <!--this is the modal form for sign in and sign up-->
    <div id="loginsignup">
        <?php include "../includes/modalform.php"; ?>
    </div>


    <div id = "map">
        <?php include "../gmap/addEstablishmentMap.php"; ?>
    </div>


</body>
</html>