$(document).ready(function() {

    /**
     * Receieve the email address input from a user and display an error
     * message if it's invalid
     *
     * @param  {string} inputSelector     [selector to retrieve the text]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [If the input isn't a valid email address a string
     * containing an error message will be inserted into a div with the
     * class 'ajax-response-container']
     */
    var checkValidEmail = function(inputSelector, responseSelector) {
        $(inputSelector).blur(function(event) {
            event.preventDefault();

            var email = $(this).val();

            var validateEmail = function(email) {
                var regularExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                return regularExpression.test(email);
            };

            if (!validateEmail(email)) {
                $(responseSelector).html('Sorry, that isn\'t a ' +
                                                    'valid email address');
            }

        });
    };

    /**
     * Removes the 'invalid email' error message
     *
     * @param  {string} inputSelector     [selector to retrieve the text]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [Populates a div with the class
     * 'ajax-response-container' with an empty string]
     */
    var resetFields = function(inputSelector, responseSelector) {
        $(inputSelector).keydown(function(event) {
            if (event) {
                $(responseSelector).html('');
            }
        });

    };

    // Function call's
    checkValidEmail("input[name='email']", '.ajax-response-container');
    resetFields("input[name='email']", '.ajax-response-container');
});
