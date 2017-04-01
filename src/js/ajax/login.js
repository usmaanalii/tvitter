/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    var noEmptyFields = function() {
        $('#reg-form').submit(function(event) {

            if (!$("#username-input").val() || !$("#password-input").val()) {
                event.preventDefault();
                $('#password-ajax-response').html('Please enter something').css("color", "red");

                return false;
            }
            else {
                return true;
            }

        });
    };

    var checkPasswordValid = function() {
        $('#reg-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/ajax/login.php',
                data: formData,
                success: function(response) {
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

    var resetFields = function() {

        $('#password-input').keydown(function(event) {
            if (event.keyCode === 8) {
                $('#password-ajax-response').html('');
            }
        });

        $('#password-input').blur(function(event) {
            if ($(this).val() === "") {
                $('#password-ajax-response').html('');
            }
        });
    };

    // Function call's
    checkPasswordValid();
    resetFields();
});
