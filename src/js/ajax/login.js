/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    /**
     * Recieves registration username input and displays sign based it's
     * uniqueness
     * @return [string] [div will be populated with a string 'X' or 'Y'
     *                  with suitable colour]
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
     * TODO: Docblock
     * [description]
     * @return {[type]} [description]
     */
    var checkPasswordValid = function() {
        $('#reg-form').submit(function(event) {
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
                        $("#reg-form")[0].submit();
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
     * TODO: Docblock
     * [description]
     * @return {[type]} [description]
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
