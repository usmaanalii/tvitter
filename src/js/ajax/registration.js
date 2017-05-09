/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    /**
     * Recieves registration username input and displays sign based it's
     * uniqueness
     * @param  {string} formSelector     [selector to retrieve the form]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [The response will be a circle via a unicode character
     * placed in a div with the id 'username-ajax-response'
     *
     * 1. If the username is free, the circle will be green
     * 2. If the username is taken, the circle will be red]
     */
    var checkUsername = function(formSelector, responseSelector) {
        $(formSelector).blur(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/ajax/registration.php',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response === "") {
                        $(responseSelector).html('');
                    }
                    else if (response === "X") {
                        $(responseSelector).html('&#9679;').css("color", "red");
                    }
                    else {
                        $(responseSelector).html('&#9679;').css("color", "green");
                    }
                }
            });

        });
    };

    /**
     * Recieves a password and assesses it's strength returning a colour matching it's strength
     * @param  {string} passwordSelector     [selector to retrieve the password]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [The response will be a circle via a unicode character
     * placed in a div with the id 'password-ajax-response'
     *
     * 1. If the password is weak, the circle will be red
     * 2. If the password is medium, the circle will be orange
     * 3. If the password is strong, the circle will be green
     * 3. If the password is very strong, the circle will be dark green]
     */
    var checkPasswordStrength = function(passwordSelector, responseSelector) {
        $(passwordSelector).keyup(function(event) {
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
                        $(responseSelector).html('&#9679;')
                        .css("color", strength[response]['color']);
                    }
                }
            });

        });
    };

    /**
     * TODO: Clean this up
     * Reset ajax error displays when delete key is pressed
     * @return {string} [Populate the response div's with an empty space]
     */
    var resetFields = function() {

        $('#username-input').keydown(function(event) {
            if (event.keyCode === 8) {
                $('#username-ajax-response').html('');
                $('#empty-input-ajax-response').html('');
            }
        });

        $('#password-input').keydown(function(event) {
            if (event.keyCode === 8) {
                $('#password-ajax-response').html('');
                $('#empty-input-ajax-response').html('');
            }
        });

        // Doesn't work, need the circle to dissappear when input is empty like the password field
        $('#username-input').blur(function(event) {
            if ($(this).val() === "") {
                $('#username-ajax-response').html('');
                $('#empty-input-ajax-response').html('');
            }
        });

        $('#password-input').blur(function(event) {
            if ($(this).val() === "") {
                $('#password-ajax-response').html('');
                $('#empty-input-ajax-response').html('');
            }
        });

    };

    /**
     * Check form completion
     * @param  {string} formSelector     [selector to retrieve the form]
     * @param  {string} usernameSelector     [selector to retrieve the username]
     * @param  {string} passwordSelector     [selector to retrieve the password]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [return error message into div with id
     * 'empty-input-ajax-response' if incomplete form is submitted]
     */
    var emptySubmitError = function(formSelector, usernameSelector,
                                    passwordSelector, responseSelector) {
        $(formSelector).submit(function(event) {

            var username = $('#username-input').val();
            var password = $('#password-input').val();

            if (!username || !password) {
                event.preventDefault();
                $('#empty-input-ajax-response').html('Incomplete Field').css('color', 'red');
            }
        });
    };

    /**
     * TODO: Docblock
     * @return {[type]} [description]
     */
    var showPassword = function() {
        $("#show-password").click(function () {
            if ($("#password-input").attr("type") == "password") {
                $("#password-input").attr("type", "text");
            }
            else{
                $("#password-input").attr("type", "password");
            }
        });
    };

    showPassword();

    // Function call's
    checkUsername('#username-input', '#username-ajax-response');
    checkPasswordStrength('#password-input', '#password-ajax-response');
    resetFields();
    emptySubmitError('#registration-form', '#username-input', '#password-input',
                '#empty-input-ajax-response');
});
