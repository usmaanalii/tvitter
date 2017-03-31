/*jshint sub:true*/

$(document).ready(function() {

    /**
     * Recieves registration username input and displays sign based it's
     * uniqueness
     * @return [string] [div will be populated with a string 'X' or 'Y'
     *                  with suitable colour]
     */
    var checkUsername = function() {
        $('#username').blur(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'logic/ajax/registration.php',
                data: formData,
                success: function(response) {
                    if (response === "X") {
                        $('#username-ajax-response').html('&#9679;').css("color", "red");
                    }
                    else {
                        $('#username-ajax-response').html('&#9679;').css("color", "green");
                    }
                }
        });

        });
    };

    var checkPasswordStrength = function() {
        $('#password').blur(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'logic/ajax/registration.php',
                data: formData,
                success: function(response) {
                    var strength = {
                        0: {'level': 'weak', 'color': '#ff2020'},
                        1: {'level': 'medium', 'color': '#e79c0a'},
                        2: {'level': 'strong', 'color': '#45a303'},
                        3: {'level': 'very strong', 'color': 'green'}
                    };
                    if (response) {
                        $('#password-ajax-response').html('&#9679;').css("color", strength[response]['color']);
                    }
                }
        });

        });
    };

    // Function call's
    checkUsername();
    checkPasswordStrength();
});
