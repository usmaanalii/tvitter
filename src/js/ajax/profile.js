$(document).ready(function() {

    var searchMovie = function() {
        $('.search-movie').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/profile/omdb-search.php',
                data: formData,
                success: function(response) {
                    console.log(formData);
                    $('.ajax-response').html(response);
                }
        });

        });
    };

    // Function call
    searchMovie();

});
