/*jshint sub:true*/
// TODO: Change the blur events to 'keyup delays'
$(document).ready(function() {

    var search = function() {
        $('.title-search-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'search-output.php',
                data: formData,
                success: function(response) {
                    $('.all-titles-response').html(response);
                }
        });

        });
    };

    // Function call's
    search();

});
