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
                        $('.response').html(response).css("color", "red");
                    }
                    else {
                        $('.response').html(response).css("color", "green");
                    }
                }
        });

        });
    };

    // Function call's
    checkUsername();
});
