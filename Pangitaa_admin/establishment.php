<?php ob_start();?>
<?php session_start();?>

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
.thumbnail>img{width:300px;height:200px;}
.panel-heading>form{ margin-top:-50px;}
#footer {
   width:100%;
   height: 200px;
   background-color: #4e5d6c;
   padding-top: 15px;
}
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
          	<li class="active"><a href="establishment.php">Establishments</a></li>
		<li><a href="Users.php">Users</a></li>
		<li><a href="requests.php">Requests</a></li>
			<li><a href="logout.php">Log Out</a></li>
	  </ul>
      </div>
  </nav>
</div>


<!--Show All Establishment-->
	<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>Establishments</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="navbar-form navbar-right" role="search">
			<?php require_once 'populate_cBox.php'; ?>
        		<div class="form-group">
          		<input type="text" class="form-control" name="search_text" placeholder="Search" required/>
        		</div>	
        		<button type="submit" name="search_btn" class="btn btn-default">Search</button>
     		 </form>
	</div>
	
	<div class="panel-body">
		<?php
		include "functions/etc/connection.php";
		if(isset($_POST['search_btn']))
		{
			$searchTxt = $_POST['search_text'];
			if(!empty($_POST['category']))
			{	
				$cat = $_POST['category'];
				$sql = "SELECT * FROM establishment where category='$cat' and business_name like '%$searchTxt%' and verified = 1 and Status != 'Removed'";
			}
			else
			{
				$sql = "SELECT * FROM establishment where business_name like '%$searchTxt%' and verified = 1 and Status != 'Removed'";
			}	
		}
		else
		   {
			$sql = "Select * from establishment where verified = 1 and Status != 'Removed'";
		    }
	
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
						<a class="btn btn-primary" name="view" href="viewMap.php?estid='.$row[0].'">View</a>	
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
</div>

<div id="footer">
    <?php include "../includes/footer.php"; ?>
</div>
</body>
</html>