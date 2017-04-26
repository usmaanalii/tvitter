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
                    $('.title-search-results').html(response);
                }
        });

        });
    };

    var addMovieToPost = function() {
        $('#tveet-form').submit(function() {
            $("input[name='movie-selection-post']").val($("input[name='movie-selection']:checked").val());

        });
    };

    var addCharacterCount = function() {
        $('#tveet-form textarea').keyup(function() {
            $('#character-count').html(140 - $('#tveet-form textarea').val().length);
        });
    };

    var stopFormSubmit = function() {
        $('#tveet-form').submit(function(event) {
            if ($('#tveet-form textarea').val().length > 140) {
                event.preventDefault();
            }
        });

    };

    /**
     * reset ajax error displays when delete key is pressed
     * @return {[TODO: return type?]} [description]
     */
    var resetFields = function() {

        $('#search-movie-query').keyup(function(event) {
            if ($(this).val() <= 1) {
                $('.title-search-results').html('');
            }
        });

    };

    // Function call
    searchMovie();
    addMovieToPost();
    addCharacterCount();
    stopFormSubmit();
    resetFields();
});
