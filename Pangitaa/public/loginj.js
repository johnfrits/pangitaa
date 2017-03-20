$(document).ready(function() {
  $("#signinform").submit(function(e) {
    e.preventDefault();

    var url = null;
    url = '../function/login.php'; 
   
    $.post(url,$(this).serialize(),function(data) {
      if ( data['success'] ) {
        // Redirect to you want
        if ( data['new'] ) {
          $(location).attr('href','../public/profile.php');
        } else {
          location.reload();  
        }
      } else {
        // Show error message
        $("#login-error").show(200);
      }
    },'JSON');
  })

})