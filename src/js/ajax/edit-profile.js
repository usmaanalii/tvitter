$(document).ready(function() {

    var checkValidEmail = function() {
        $("input[name='email']").blur(function(event) {
            event.preventDefault();

            var email = $(this).val();

            var validateEmail = function(email) {
                var regularExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                return regularExpression.test(email);
            };

            console.log(validateEmail('usmaanalii@hotmail.co.uk'));

            if (!validateEmail(email)) {
                $('.ajax-response-container').html('Sorry, that isn\'t a valid email address');
            }

        });
    };

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
