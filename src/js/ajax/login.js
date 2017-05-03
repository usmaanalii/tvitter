/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    /**
     * Recieves registration username input and displays sign based it's
     * uniqueness
     * @param  {string} usernameSelector     [selector to retrieve the username]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [div will be populated with a string
     * 'username doesn't exist if the username is already taken]
     */
    var checkUsername = function(usernameSelector, responseSelector) {
        $(usernameSelector).blur(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'logic/ajax/login.php',
                data: formData,
                success: function(response) {
                    if ($(usernameSelector).val() !== "") {
                        /*
                            * Y represents the username being
                            free in the users table i.e
                            the username doesn't exist in the database
                         */
                        if (response === "Y") {
                            $(responseSelector)
                            .html('username doesn\'t exist').css("color", "red");
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
     * @param  {string} formSelector [selector to retrieve the form]
     * @param  {string} usernameResponseSelector [selector to add results to]
     * @param  {string} passwordResponseSelector [selector to add results to]
     *
     * @return {string} or {form_submit} [If the password matches,
     * the login form submits, otherwise 'password incorrect' will load into
     * a div with the id 'password-ajax-response']
     */
    var checkPasswordValid = function(formSelector, usernameResponseSelector,
                                      passwordResponseSelector) {
        $(formSelector).submit(function(event) {
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
                        $(formSelector)[0].submit();
                    }
                    else {
                        $(usernameResponseSelector).html('');
                        $(passwordResponseSelector).html('password incorrect')
                                                   .css("color", "red");
                    }
                }
        });

        });
    };

    /**
     * TODO: parameterise this method
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
    checkUsername('#username-input', '#username-ajax-response');
    checkPasswordValid('#login-form', '#username-ajax-response', '#password-ajax-response');
    emptyInputs();
});
