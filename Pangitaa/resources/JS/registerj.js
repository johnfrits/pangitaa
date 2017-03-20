
$(document).ready(function() {
  $("#signupform").submit(function(e) {
    e.preventDefault();

    var currentr_url = window.location.pathname;
    var url = null;

    if(currentr_url == "/pangitaa/public/findnow.php"){
      url = '../function/register.php';
    }
    else{ 
      url = 'function/register.php'; 
    }

    $.post(url,$(this).serialize(),function(data) {
      if ( data['success_signup'] ) {

          //clear textfields
          $("#register-success").show(200);
          $("#same-username").hide(200);
          $("#same-email").hide(200);
          $('#signup-username').val('');
          $('#signup-email').val('');
          $('#signup-password').val('');
          $('#resignup-password').val('');

          //change boder-color 
          $("#signup-username").css('border-color', '');
          $("#signup-email").css('border-color', '');
          $("#signup-password").css('border-color', '');
          $("#resignup-password").css('border-color', '');
          grecaptcha.reset();
      }
      if ( data['same_user'] ) {
          $("#same-username").show(200);
          $("#same-email").hide(200);
          $("#signup-username").css('border-color', 'red');
          grecaptcha.reset();
      }

      if ( data['same_email'] ){
         $("#same-email").show(200);
         $("#same-username").hide(200);
         $("#signup-email").css('border-color', 'red');
         grecaptcha.reset();
      }
    },'JSON');
  })

})
