/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    /**
     * Recieves registration username input and displays sign based it's
     * uniqueness
     * @return {string} [div will be populated with a string
     * 'username doesn't exist if the username is already taken]
     */
    var checkUsername = function() {
        $('#username-input').blur(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'logic/ajax/login.php',
                data: formData,
                success: function(response) {
                    if ($("#username-input").val() !== "") {
                        // Y represents the username being free in the users table i.e the username doesn't exist in the database
                        if (response === "Y") {
                            $('#username-ajax-response').html('username doesn\'t exist').css("color", "red");
                        }
                    }
                }
        });

        });
    };

    /**
     * Retrieves login username and password input. Displays a message
     * if it doesn't match the password in the database for the username
     *
     * @return {string} or {form_submit} [If the password matches,
     * the login form submits, otherwise 'password incorrect' will load into
     * a div with the id 'password-ajax-response']
     */
    var checkPasswordValid = function() {
        $('#login-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'logic/ajax/login.php',
                data: formData,
                success: function(response) {
                    console.log(response);
                    // TODO: Clean this up
                    // X comes from username existing in the database
                    if (response === "Xmatch") {
                        $("#login-form")[0].submit();
                    }
                    else {
                        $('#username-ajax-response').html('');
                        $('#password-ajax-response').html('password incorrect').css("color", "red");
                    }
                }
        });

        });
    };

    /**
     * Remove the ajax response when the user focuses on the input, since it
     * doesn't need to remain, once the user begins updating their input
     * @return {string} [returns an empty string into divs with the class
     * 'ajax-response-container']
     */
    var emptyInputs = function() {
        $('#username-input, #password-input').focus(function() {
            $('.ajax-response-container').not(this).html('');
        });
    };

    // Function call's
    checkUsername();
    checkPasswordValid();
    emptyInputs();
});
