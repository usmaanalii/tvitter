$(document).ready(function() {

    var searchtitle = function() {
        $('.search-title').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'logic/title-results.php',
                data: formData,
                success: function(response) {
                    $('.title-search-results').html(response);
                    gettitleDetails();
                }
        });

        });
    };

    var gettitleDetails = function() {
        $('.title-link').click(function(event) {
            event.preventDefault();

            title_id = $(this).attr('id');

            $.ajax({
                type: 'POST',
                url: 'logic/title-details.php',
                data: {'title_id': title_id},
                success: function(response) {
                    $('.title-details').html(response);
                }
        });

        });
    };

    searchtitle();

});
