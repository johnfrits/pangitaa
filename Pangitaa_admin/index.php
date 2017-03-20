<?php ob_start();?>
<?php session_start();?>

<!DOCTYPE>
<html>
<head>
<!--metaaa-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Pangitaa">
    <meta property="og:description" content="Find Your Local Establishment Near You.">
    <title>Find Your Local Establishment Near You</title>

    <!--CSS-->
    <link href="resources/CSS/home.css" rel="stylesheet"/>
    <link href="resources/Bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <link href="resources/Bootstrap/bootstrap.css" rel="stylesheet"/>
    
    <!--JSJSJS-->
    <script src="resources/JS/jquery-1.11.3.min.js" ></script>   
    <script src="resources/JS/bootstrap.min.js"></script>
    <script src="resources/JS/scroll.js" ></script>
    <script src="resources/JS/nav-barcolor.js"></script>
    <script src="resources/JS/smoothscroll.js"></script>
    <script src="resources/JS/registerj.js"></script>
    <script src="resources/JS/jquery-1.11.3.min.js"></script>
    <!--end-->
<style>
.panel-primary
	{
		padding:350px;background-image: url('est_images/jimg2.jpg');
		margin-top:-150px;
		
	}

.panel-body{ color:black;background-color:white;opacity:0.9;}
</style>
</head>
<body>

<div id="nav-bar">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
               	 			<span class="icon-bar"></span>
                			<span class="icon-bar"></span>
				</button>
			              <a id="logo"class="navbar-brand" href="index.php"></a>
           <a id="myb"class="navbar-brand" href="index.php">Pangitaa</a>
			</div>
				<div class="collapse navbar-collapse navbar-right" id="main-nav"></div>
		</div>
	</nav>
</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="panel-title">Log In</h1>
	</div>
		<div class="panel-body">
    		<form action="index.php" method="post">
      		Username:<input class="form-control" type="text" name="usr" placeholder = "Type Username" required>
      		<br>Password:<br><input class="form-control" type="password" name="pwd" placeholder = "Type Password" required>
      		<br><input class="btn btn-primary" type="submit" name="login" value="Log In">
    		</form>
		</div>
   	 </div>
</div>

<div id="footer">
    <?php include "includes/footer.php"; ?>
</div>

<?php
	if(isset($_POST['login']))
	{
		include "functions/etc/connection.php";
		$username = $_POST['usr'];
		$password = $_POST['pwd'];
		$select = mysqli_query($con,"Select * from account where username='$username' and password='$password'");
			if(mysqli_num_rows($select) >= 1)
			{
				$_SESSION['username_logged_in'] = true;
				echo "<script> location.href='establishment.php'; </script>";
			}
			else
				echo "<script> alert('Password and Username didn't match'); </script>";
	}
?>
</body>
</html>