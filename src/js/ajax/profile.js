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

    var addMovieSelection = function() {
        $('#tveet-form').submit(function() {
            $("input[name='movie-selection-post']").val($(".movie-results input[name='movie-selection']").val());

            console.log($(".movie-results input[name='movie-selection']").val());
            console.log($("input[name='movie-selection-post']").val());
        });
    };

    // Function call
    searchMovie();
    addMovieSelection();

});
