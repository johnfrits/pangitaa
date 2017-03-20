<!DOCTYPE html>
<html>
<body>
  <nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
      <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a id="logo"class="navbar-brand" href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/pangitaa' ?>"></a>
              <a id="myb"class="navbar-brand" href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/pangitaa' ?>">Pangitaa</a>
          </div>
          <div class="collapse navbar-collapse navbar-right" id="main-nav">           
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Explore Here! <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="" class="scroll-link" >Find Now</a></li> 
                  <li class="divider"></li><li><a href="">Who Develop Me?</a></li>
                  <li class="divider"></li><li><a href="">Million Thanks!</a></li> </ul></li>
                </ul> <ul class="nav navbar-nav navbar-right"><div id="loginbutton"><li>
              <a class="cd-signin btn btn-primary" href="#loginsignup">Sign In | Sign Up</a></li></div></ul>
          </div>
      </div>
  </nav>
</body>
</html>
