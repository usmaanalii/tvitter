$(document).ready(function() {

    var searchMovie = function() {
        $('.search-movie').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/profile.php',
                data: formData,
                success: function(response) {
                    console.log(formData);
                    $('.ajax-response').html(response);
                }
        });

        });
    };

    var addMovieToPost = function() {
        $('#tveet-form').submit(function() {
            $("input[name='movie-selection-post']").val($("input[name='movie-selection']:checked").val());

        });
    };

    // Function call
    searchMovie();
    addMovieToPost();

});
