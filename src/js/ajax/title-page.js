$(document).ready(function() {

    var searchMovie = function() {
        $('.search-movie').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/title-page.php',
                data: formData,
                success: function(response) {
                    $('.title-search-results').html(response);
                    getMovieDetails();
                }
        });

        });
    };

    var getMovieDetails = function() {
        $('.movie-link').click(function(event) {
            event.preventDefault();

            title_id = $(this).attr('id');

            $.ajax({
                type: 'POST',
                url: '../logic/title-page.php',
                data: {'title_id': title_id},
                success: function(response) {
                    $('.title-details').html(response);
                }
        });

        });
    };

    searchMovie();

});
