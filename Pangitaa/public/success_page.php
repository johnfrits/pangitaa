<?php ob_start();?>
<?php session_start();?>

<?php 
  if(!$_SESSION['success1']){
      header("Location: HTTP/1.1 404 File Not Found", 404);
      exit;
  }
?>
<?php include'../function/show_profile.php'; ?>

<?php 
  $_SESSION['success1'] = false;
  
?>
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
    <link href="../resources/CSS/profile.css" rel="stylesheet"/>
    <link href="../resources/CSS/style.css" rel="stylesheet"/>
    <link href="../resources/CSS/reset.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.css" rel="stylesheet"/>
    <style type="text/css">
      .alert-success{
        width: 90%;
        margin: 200 auto 0px;
      }
      #add_est{
        margin-top: 30px;
        width: 200px;
      }
      #footer{
          position: absolute;
    width: 100%;
    bottom: 0px;
      }
      body{
              overflow-y: hidden;
      }
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

  <div class="alert alert-dismissible alert-success" style="margin-top:100px;">
   <span class="glyphicon glyphicon-check icon-size"></span>
    <br><br>
    <h2>It's a success! <?php echo $_SESSION['success1'];?> </h2>
    <p>Please wait for 2 days for the validation and confirmation and we will send you an email.</p>

    <a class="btn btn-default" id="add_est" href="add-establihment.php" >Add New Establishment </a>
  </div>
  

  <div id="footer">
    <?php include "../includes/footer.php"; ?>
  </div>

</body>
</html>