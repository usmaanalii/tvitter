$(document).ready(function() {

    /**
     * Receieve the email address input from a user and display an error
     * message if it's invalid
     * @return {string} [If the input isn't a valid email address a string
     * containing an error message will be inserted into a div with the
     * class 'ajax-response-container']
     */
    var checkValidEmail = function() {
        $("input[name='email']").blur(function(event) {
            event.preventDefault();

            var email = $(this).val();

            var validateEmail = function(email) {
                var regularExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                return regularExpression.test(email);
            };

            if (!validateEmail(email)) {
                $('.ajax-response-container').html('Sorry, that isn\'t a' +
                                                    'valid email address');
            }

        });
    };

    /**
     * Removes the 'invalid email' error message
     * @return {string} [Populates a div with the class
     * 'ajax-response-container' with an empty string]
     */
    var resetFields = function() {
        $("input[name='email']").keydown(function(event) {
            if (event) {
                $('.ajax-response-container').html('');
            }
        });

    };

    checkValidEmail();
    resetFields();
});
