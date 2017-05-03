$(document).ready(function() {

    /**
     * Receives the form submission when a user searches for a title to add to
     * their posts.
     * @return {string} [Inserts HTML markup that produces a list of
     * title results into a div with the class 'title-search-results']
     */
    var searchTitle = function() {
        $('.search-title').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/profile.php',
                data: formData,
                success: function(response) {
                    console.log(formData);
                    $('.title-search-results').html(response);
                    styleTitleDiv();
                }
        });

        });
    };

    /**
     * [description]
     * @return {[type]} [description]
     */
    var styleTitleDiv = function() {
        $("input[name='title-selection']").change(function(){
            // TODO: Make the selected div change color and others remain white
        });
    };

    /**
     * Adds the title selected in the search-title form to the tveet form
     * via a hidden input tag, this is used to retrieve the title poster, which
     * is added to each post
     * @return {string} [the title selected will populate the value attribute
     * of the input tag with the name 'title-selection']
     */
    var addTitleToPost = function() {
        $('#tveet-form').submit(function() {
            $("input[name='title-selection']").val($("input[name='title-selection']:checked").val());

        });
    };

    /**
     * Adds the string length for the tveet form's textarea
     * @return {int} [Inserts the length of the textarea's content into the
     * div with the id 'character-count' as the user enters input]
     */
    var addCharacterCount = function() {
        $('#tveet-form textarea').keyup(function() {
            $('#character-count').html(140 - $('#tveet-form textarea').val().length);
        });
    };

    /**
     * Intercepts the tveet form submission if the length of the textarea is
     * too long (greater than 140 characters) or empty (equal to 0)
     * @return {form_submission_cancellation} [Posts have a max length of 140
     * characters]
     */
    var stopFormSubmit = function() {
        $('#tveet-form').submit(function(event) {
            var tveetLength = $('#tveet-form textarea').val().length;
            if (tveetLength > 140 || tveetLength === 0) {
                event.preventDefault();
            }
        });

    };

    /**
     * Reset title search results
     * @return {string} [Inserts an empty string into a div with a class
     * 'title-search-results']
     */
    var resetFields = function() {

        $('#search-title-query').keyup(function(event) {
            if ($(this).val() <= 1) {
                $('.title-search-results').html('');
            }
        });

    };

    // Function calls
    searchTitle();
    addTitleToPost();
    addCharacterCount();
    stopFormSubmit();
    resetFields();
});
