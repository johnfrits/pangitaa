
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
    <link href="../resources/CSS/profile.css" rel="stylesheet"/>
    <link href="../resources/CSS/style.css" rel="stylesheet"/>
    <link href="../resources/CSS/reset.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <link href="../resources/Bootstrap/bootstrap.css" rel="stylesheet"/>
    <style type="text/css">
      .btn-default{
        margin-right: 10px;
      }
      #footer {
      margin: 0;
      clear: both;
      width:100%;
      position: absolute;
      }

      #profile{
        margin-bottom: 231px;
      }
      .nav-pills li{
        background-color: #989898 ;
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


<div class="container" style="padding-top: 40px; padding-bottom: 50px;">
  <h1 class="page-header">Profile</h1>
  <div class="row">
    <!-- left column -->
    <?php 
      echo '<form class="form-horizontal" action="../function/update_profile.php?userID='.$_SESSION['userID'].'" method="POST" enctype="multipart/form-data"> ';
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <?php displayProfPic(); ?>
        <br>	
        <br>
        <span class= "btn btn-success btn-file">
        	Browse <input type="file" class="text-center center-block well well-lg" onchange="readURL(this);" name="image" id="file">
        </span> 
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <?php 

        if(isset($_SESSION['showPanel']) && $_SESSION['showPanel']){

         if(isset($_GET['update_successful'])){

         $update_successful = $_GET['update_successful'] == true ? true : false;
          if($update_successful)
          {          
              echo '<div class="alert alert-success alert-dismissable">';
              echo '<a href="../function/unsetPanelSession.php" class="panel-close close" data-dismiss="alert">×</a>';
              echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">  </span>';
              echo ' &nbsp; Update Successful';
              echo '</div>';
          }
        }

        else if(isset($_GET['change_password'])){

         $update_successful = $_GET['change_password'] == true ? true : false;
          if($update_successful)
          {          
              echo '<div class="alert alert-success alert-dismissable">';
              echo '<a href="../function/unsetPanelSession.php" class="panel-close close" data-dismiss="alert">×</a>';
              echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">  </span>';
              echo ' &nbsp; Change Password Successful';
              echo '</div>';
          }
          else if(!$update_successful)
          {          
              echo '<div class="alert alert-danger alert-dismissable">';
              echo '<a href="../function/unsetPanelSession.php" class="panel-close close" data-dismiss="alert">×</a>';
              echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">  </span>';
              echo ' &nbsp; Cannot Change Password';
              echo '</div>';
          }
        }
      }
      ?>
      <!-- nav -->
      <ul class="nav nav-pills pull-right">
        <li class="active"><a href="#home" data-toggle="tab" aria-expanded="false">Edit Profile</a></li>
        <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Change Password</a></li>
      </ul>

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
        <h3 class="myinfo">Personal info</h3>
        <hr>
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" value='<?php echo $firstname; ?>' type="text" name="firstname">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value='<?php echo $lastname; ?>' type="text" name="lastname">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Position:</label>
          <div class="col-lg-8">
            <input class="form-control" value='<?php echo $position; ?>' type="text" name="position">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Contact Number</label>
          <div class="col-lg-8">
            <input class="form-control" value='<?php echo $contact_number; ?>' type="text" name="contact_number">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Telephone Number</label>
          <div class="col-lg-8">
            <input class="form-control" value='<?php echo $telephone_number; ?>' type="text" name="telephone_number">
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-3 control-label">Address:</label>
          <div class="col-lg-8">
            <input class="form-control" value='<?php echo $address; ?>' type="text" name="address">
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value='<?php echo $email; ?>' type="email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
           <input class="btn btn-primary pull-right" value="Save Changes" type="submit" name="update">
           <input class="btn btn-default pull-right" value="Cancel" type="submit" onclick="window.location.reload();return false;">
          </div>
        </div>
        </div>
        </form>

        <div class="tab-pane" id="profile">
        <h3 class="myinfo">Change password</h3>
        <hr>

        <?php 
        echo '<form class="form-horizontal" action="../function/reset_password.php?userID='.$_SESSION['userID'].'" method="POST" enctype="multipart/form-data"> ';
        ?>

        <div class="form-group">
         <label class="col-lg-3 control-label">Old Password:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="old_password">
          </div>
        </div>

        <div class="form-group">
         <label class="col-lg-3 control-label">New Password:</label>
          <div class="col-lg-8">
            <input class="form-control" type="password" name="new_password">
          </div>
        </div>

        <div class="form-group">
         <label class="col-lg-3 control-label">Retype Password:</label>
          <div class="col-lg-8">
            <input class="form-control" type="password" name="retype_password">
          </div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
           <input class="btn btn-primary pull-right" value="Reset Password" type="submit" name="reset">
           <input class="btn btn-default pull-right" value="Cancel" type="submit" onclick="window.location.reload();return false;">
          </div>
        </div>
        </form>
        </div>

        </div>
      </div>
   
    </div>
  </div>
</div>


<div id="footer">
    <?php include "../includes/footer.php"; ?>
</div>

</body>
</html>