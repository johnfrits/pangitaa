 function retypePassword(){
            var fpass = document.getElementById("signup-password").value;
            var spass = document.getElementById("resignup-password").value;

            var verify = true;

            if(fpass != spass){
              document.getElementById("signup-password").style.borderColor = "#E34234";
              document.getElementById("resignup-password").style.borderColor = "#E34234";

              verify = false;
            }
            else {
              verify = true;
            }
            return ok;
}