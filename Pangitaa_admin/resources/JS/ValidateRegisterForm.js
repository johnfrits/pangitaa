
function ValidatePassword(){
  
            var fpass = document.getElementById("signup-password").value;
            var spass = document.getElementById("resignup-password").value;
     
            if(fpass.length > 0 && spass.length > 0){
              if(spass != fpass)
              {
                document.getElementById("resignup-password").style.borderColor = "#E34234";
                document.getElementById("register").disabled = true;
              }
              else if(spass == fpass)
              {
                document.getElementById("signup-password").style.borderColor = "Green";
                document.getElementById("resignup-password").style.borderColor = "Green";
                document.getElementById("register").disabled = false;
              }
            }
}

function ValidateEmail(){

           var email = document.getElementById("signup-email").value;

           if(email.length > 0)
           {
              document.getElementById("signup-email").style.borderColor = "Green";
              document.getElementById("register").disabled = false;
           }
}

function ValidateUsername(){

            var uname = document.getElementById("signup-username").value;

            if(uname.length > 0)
            {
              
              if(!uname.replace(/\s/g, '').length || uname.indexOf(' ') >=0)
              {
                  document.getElementById("signup-username").style.borderColor = "#E34234";
                  document.getElementById("register").disabled = true;
              }
              else
              {
                  document.getElementById("signup-username").style.borderColor = "Green";
                  document.getElementById("register").disabled = false;
              }
            }
            else
                document.getElementById("signup-username").style.borderColor = "";
}