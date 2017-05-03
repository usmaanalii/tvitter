/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    /**
     * Recieves registration username input and displays sign based it's
     * uniqueness
     * @return {string} [The response will be a circle via a unicode character
     * placed in a div with the id 'username-ajax-response'
     *
     * 1. If the username is free, the circle will be green
     * 2. If the username is taken, the circle will be red]
     */
    var checkUsername = function() {
        $('#username-input').blur(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/ajax/registration.php',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response === "") {
                        $('#username-ajax-response').html('');
                    }
                    else if (response === "X") {
                        $('#username-ajax-response').html('&#9679;').css("color", "red");
                    }
                    else {
                        $('#username-ajax-response').html('&#9679;').css("color", "green");
                    }
                }
            });

        });
    };

    /**
     * Recieves a password and assesses it's strength returning a colour matching it's strength
     * @return {string} [The response will be a circle via a unicode character
     * placed in a div with the id 'password-ajax-response'
     *
     * 1. If the password is weak, the circle will be red
     * 2. If the password is medium, the circle will be orange
     * 3. If the password is strong, the circle will be green
     * 3. If the password is very strong, the circle will be dark green]
     */
    var checkPasswordStrength = function() {
        $('#password-input').keyup(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/ajax/registration.php',
                data: formData,
                success: function(response) {
                    var strength = {
                        0: {
                            'level': 'weak',
                            'color': '#ff2020'
                        },
                        1: {
                            'level': 'medium',
                            'color': '#e79c0a'
                        },
                        2: {
                            'level': 'strong',
                            'color': '#45a303'
                        },
                        3: {
                            'level': 'very strong',
                            'color': '#215500'
                        }
                    };
                    if (response) {
                        $('#password-ajax-response').html('&#9679;').css("color", strength[response]['color']);
                    }
                }
            });

        });
    };

    /**
     * Eeset ajax error displays when delete key is pressed
     * @return {string} [Populate the response div's with an empty space]
     */
    var resetFields = function() {

        $('#username-input').keydown(function(event) {
            if (event.keyCode === 8) {
                $('#username-ajax-response').html('');
            }
        });

        $('#password-input').keydown(function(event) {
            if (event.keyCode === 8) {
                $('#password-ajax-response').html('');
            }
        });

        // Doesn't work, need the circle to dissappear when input is empty like the password field
        $('#username-input').blur(function(event) {
            if ($(this).val() === "") {
                $('#username-ajax-response').html('');
            }
        });

        $('#password-input').blur(function(event) {
            if ($(this).val() === "") {
                $('#password-ajax-response').html('');
            }
        });

    };

    var emptySubmit = function() {
        $('#registration-form').submit(function(event) {

            var username = $('#username-input').val();
            var password = $('#password-input').val();

            if (!username || !password) {
                event.preventDefault();
                $('#empty-input-ajax-response').html('Incomplete Field').css('color', 'red');
            }

            emptyInputs();
        });
    };

    // Function call's
    checkUsername();
    checkPasswordStrength();
    resetFields();
    emptySubmit();
});
