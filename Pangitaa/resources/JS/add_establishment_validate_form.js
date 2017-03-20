function ValidateAddEstablishmentForm(){
            
            var est_name = document.getElementById("est_name").value;
            var street_add = document.getElementById("street_number").value;
            var city = document.getElementById("locality").value;
            var country = document.getElementById("country").value;
            var bus_phone = document.getElementById("bphone").value;
            var category = document.getElementById("category").value;


            if(!est_name.length > 0){
                    document.getElementById("est_name").style.borderColor = "#E34234";
                    document.getElementById("add_est").disabled = true;
            }
            else{
                    document.getElementById("est_name").style.borderColor = "";
                    document.getElementById("add_est").disabled = false;
            }

            if(!street_add.length > 0){
                    document.getElementById("street_number").style.borderColor = "#E34234";
                   document.getElementById("add_est").disabled = true;
            }
            else{
                    document.getElementById("street_number").style.borderColor = "";
                    document.getElementById("add_est").disabled = false;
            }

            if(!city.length > 0){
                    document.getElementById("locality").style.borderColor = "#E34234";
                     document.getElementById("add_est").disabled = true;
            }
            else{
                    document.getElementById("locality").style.borderColor = "";
                    document.getElementById("add_est").disabled = false;
            }

            if(!country.length > 0){
                    document.getElementById("country").style.borderColor = "#E34234";
                    document.getElementById("add_est").disabled = true;
            }
            else{
                    document.getElementById("country").style.borderColor = "";
                    document.getElementById("add_est").disabled = false;
            }

            if(!bus_phone.length > 0){
                    document.getElementById("bphone").style.borderColor = "#E34234";
                    document.getElementById("add_est").disabled = true;
            }
            else{
                    document.getElementById("bphone").style.borderColor = "";
                    document.getElementById("add_est").disabled = false;
            }

            if(!category.length > 0){
                    document.getElementById("category").style.borderColor = "#E34234";
                    document.getElementById("add_est").disabled = true;
            }
            else{
                    document.getElementById("category").style.borderColor = "";
                     document.getElementById("add_est").disabled = false;
            }
}

