<html>
<head>
</head>
  
<body>
   <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
      <ul class="cd-switcher">
        <li><a href="#loginsignup">Sign in</a></li>
        <li><a href="#loginsignup">Sign up</a></li>
      </ul> 
      <div id="cd-login"> <!-- log in form -->
        <form  action="" class="cd-form" method="POST" id="signinform">
      
          <div class="alert alert-dismissible alert-danger" id="login-error" style="display:none;">
            <button type="button" class="close" onclick="$('.alert').hide(500)">&times;</button>
            <strong>Oh snap!</strong> Wrong username or password, please try again.
          </div>  
        
           <p class="fieldset">
            <label class="image-replace cd-username" for="signin-username">Username</label>
            <input class="full-width has-padding has-border" id="signin-username" name="login_username" type="text" placeholder="Username" required>
          </p>
          <p class="fieldset">
            <label class="image-replace cd-password" for="signin-password">Password</label>
            <input class="full-width has-padding has-border" id="signin-password" name= "login_password" type="password"  placeholder="Password" required>
          </p>
          <div id="remember">
          <p class="fieldset">
            <input type="checkbox" id="remember-me" >
            <label for="remember-me">Remember me</label>
          </p>
          </div>
          <p class="fieldset">
            <input class="full-width" type="submit" name="login" value="Login" id="signin_button">
          </p>
        </form>
        <a href="#0" class="cd-close-form">Close</a> 
      </div> <!-- cd-login -->  
   
      <div id="cd-signup"> <!-- sign up form -->
        <form action="" class="cd-form" method="POST" id="signupform">

          <div class="alert alert-dismissible alert-success" id="register-success" style="display:none;">
            <button type="button" class="close" onclick="$('.alert').hide(500)">&times;</button>
            <strong>Alright!</strong> Account Created Successfully.
          </div>  

          <div class="alert alert-dismissible alert-danger" id="same-username" style="display:none;">
            <button type="button" class="close" onclick="$('.alert').hide(500)">&times;</button>
            <strong>Wait!</strong> Your username has already been taken.
          </div>  

          <div class="alert alert-dismissible alert-danger" id="same-email" style="display:none;">
            <button type="button" class="close" onclick="$('.alert').hide(500)">&times;</button>
            <strong>Wait!</strong> Your email address has already been taken.
          </div>  

          <p class="fieldset">
            <label class="image-replace cd-username" for="signup-username">Username</label>
            <input class="full-width has-padding has-border" id="signup-username"  onkeyup="ValidateUsername()" name="username" type="text" placeholder="Username" maxlength="12" required>
          </p>

          <p class="fieldset">
            <label class="image-replace cd-email" for="signup-email">E-mail</label>
            <input class="full-width has-padding has-border" id="signup-email" onkeyup="ValidateEmail()" name="email" type="email" placeholder="E-mail" required>
          </p>

          <p class="fieldset">
            <label class="image-replace cd-password" for="signup-password">Password</label>
            <input class="full-width has-padding has-border" id="signup-password"  name = "password" type="password"  placeholder="Password" maxlength="12" required>
            <a href="#loginsignup" class="hide-password">Show</a>
          </p>

           <p class="fieldset">
            <label class="image-replace cd-password" for="resignup-password">Retype Password</label>
            <input class="full-width has-padding has-border" id="resignup-password"  name="resignup-password"  onkeyup="ValidatePassword()"  name="retype_password" type="password" placeholder="Retype Password" maxlength="12" required>
            <a href="#loginsignup" class="hide-password">Show</a>
          </p>
          <div class="g-recaptcha" data-sitekey="6LcpaxITAAAAAJQWchsFEKHFxnMeSXkU4U_UmUqo"></div>

          
          <br>
           <div id="terms">
          </div>

          <p class="fieldset">
            <input class="full-width has-padding" type="submit" id="register" name="submit" value="Create Account">
          </p>
        </form>



        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div> <!-- cd-signup -->

      <a href="#loginsignup" class="cd-close-form">Close</a>
    </div> <!-- cd-user-modal-container -->
  </div> <!-- cd-user-modal -->

</body>
</html>
