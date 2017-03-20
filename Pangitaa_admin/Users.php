

<?php
  if(!$_SESSION['username_logged_in']){
  header("Location: HTTP/1.1 404 File Not Found", 404);
          exit;
  }
?>
<!DOCTYPE>
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

    <link href="resources/CSS/home.css" rel="stylesheet"/>
    <link href="resources/CSS/style.css" rel="stylesheet"/>
    <link href="resources/CSS/reset.css" rel="stylesheet"/>
    <link rel="stylesheet" href="resources/CSS/login.css"/>
    <link href="resources/Bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <link href="resources/Bootstrap/bootstrap.css" rel="stylesheet"/>
    
    <!--JSJSJS-->
    <script src="resources/JS/jquery-1.11.3.min.js" ></script>   
    <script src="resources/JS/bootstrap.min.js"></script>
    <script src="resources/JS/scroll.js" ></script>
    <script src="resources/JS/nav-barcolor.js"></script>
    <script src="resources/JS/smoothscroll.js"></script>
    <script src="resources/JS/main.js"></script>
    <script src="resources/JS/loginj.js"></script>
    <script src="resources/JS/registerj.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script> 
    <script src="resources/JS/ValidateRegisterForm.js"></script>
    <script src="resources/JS/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script> 
    <!--end-->
<style>
.panel{margin-top:50px;margin:80px;}
.thumbnail{ border:1px solid;}
.thumbnail>img{width:200px;height:200px;}
.panel-heading>form{ margin-top:-50px;}
</style>
</head>

<body>
<!--this is navbar-->
    <div id="nav-bar"> 
       <nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
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
          <div class="collapse navbar-collapse navbar-right" id="main-nav">  
	  <ul class="nav navbar-nav">         
          	<li><a href="establishment.php">Establishments</a></li>
		<li class="active"><a href="Users.php">Users</a></li>
		<li><a href="requests.php">Requests</a></li>
			<li><a href="logout.php">Log Out</a></li>
	  </ul>
      </div>
  </nav>
</div>


<!--Show All Users-->
<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>Users</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="navbar-form navbar-right" role="search">
        	<div class="form-group">
          		<input type="text" class="form-control" name="searchText" placeholder="Search" required>
        	</div>	
        		<button type="submit" class="btn btn-default" name="search_btn">Search</button>
     		 </form>
	</div>
	
	<div class="panel-body">
	<?php
		include "functions/etc/connection.php";
		$sql1 = "Select userID from user where status != 'Removed'";
		$res = mysqli_query($con,$sql1);
		$count = 0;
		while($row = mysqli_fetch_array($res))
		{
			$userID = $row[0];
			if(isset($_POST['search_btn']))
			{
				$searchTxt = $_POST['searchText'];
				$sql = "Select * from profile where firstname like '%$searchTxt%' or lastname like '%$searchTxt%' or position like '%$searchTxt%' and userID ='$userID'";
			}
			else
				$sql = "Select * from profile where userID ='$userID'";

			$result = mysqli_query($con, $sql);
			
			while($row = mysqli_fetch_array($result))
			{
				$count+=1;
				echo'<div class="col-md-3">
					<div class="thumbnail">';
					if($row["image_name"] == "")
						echo'<img class="img-circle" name="img" src="functions/uploads/default.png">';
					else
						echo'<img class="img-circle" name="img" src="functions/uploads/'.$row["image_name"].'">';
					echo'<div class="caption">
						<p name="fname">First Name: '.$row["firstname"].'</p>
						<p name="lname">Last Name: '.$row["lastname"].'</p>
						<p name="position">Position: '.$row["position"].'<p>	
						<p name="num">Contact Number: '.$row["contact_number"].'<p>
						<p name="tel_num">Tel. Number: '.$row["telephone_number"].'<p>
						<p name="address">Adress: '.$row["address"].'<p>
						<p name="email">Email: '.$row["email"].'<p>	
						<a class="btn btn-primary" name="view" href="Update_User_Status.php?userId='.$row[0].'">Remove</a>		
					</div>
					</div>
				</div>';
			}
		}
		if($count <= 0)
			echo'No Result found.';
	?>
	</div>
</div>

<div id="footer">
    <?php include "includes/footer.php"; ?>
</div>
</body>
</html>