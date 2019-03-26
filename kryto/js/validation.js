
$(document).ready(function(){


    $("form").submit(function(event){
        event.preventDefault();


        if($("#phone").intlTelInput("isValidNumber") == false) {
            console.log(phoneError);
            var phoneError = true;
        }else{
            var phoneError = false;
        }

        $.post( "/process_new.php",
                $('form').serialize()+'&'+$.param({ 'phoneError': phoneError }),
                function(data) {
                    if(data.type == "error") {
                        alert(data.mess);
                    }else if($("#phone").intlTelInput("isValidNumber") == false){
                        alert("Error: Invalid Phone format");
                    }else if(data.type == "success"){
                        window.location.replace(data.mess);
                        console.log(data.mess);
                    }
                }, "json");
    });

});