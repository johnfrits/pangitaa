$(document).ready(function() {
  $("#signinform").submit(function(e) {
    e.preventDefault();

    var currentr_url = window.location.pathname;
    var url = null;

    if(currentr_url == "/pangitaa/public/findnow.php"){
      url = '../function/login.php';
    }
    else{ 
      url = 'function/login.php'; 
    }

    $.post(url,$(this).serialize(),function(data) {
      if ( data['success'] ) {
        // Redirect to you want
        if ( data['new'] ) {

          if( currentr_url == "/pangitaa/public/findnow.php" ){
              $(location).attr('href','profile.php');
             }
          else{ 
            $(location).attr('href','public/profile.php');
          }
        }  else {
          location.reload();  
        }
      } else {
        // Show error message
        $("#login-error").show(200);
      }
    },'JSON');
  })

})