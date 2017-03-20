 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function (e) {

                var image = new Image();
                    image.src = e.target.result;
                    image.onload = function () {
                        
                    var height = this.height;
                    var width = this.width;
                    //check if lampas na sa 210 kung dli
                    
                    if (height > 200 || width > 200) 
                    {
                        alert("Height and Width must not exceed 200px.");
                        document.getElementById("file").value = "";
                    }
                    //ambak dria
                    else{

                        $('#imageProf')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                        }
                    };
        };
        reader.readAsDataURL(input.files[0]);
    }
}