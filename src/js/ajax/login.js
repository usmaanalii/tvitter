/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    var checkPasswordValid = function() {
        $('#reg-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/ajax/login.php',
                data: formData,
                success: function(response) {
                    console.log($('#reg-form')[0]);
                    if (response === "match") {
                        $("#reg-form")[0].submit();
                    }
                    else {
                        $('#password-ajax-response').html('password incorrect').css("color", "red");
                    }
                }
        });

        });
    };

    // Function call's
    checkPasswordValid();
});
