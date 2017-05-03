$(document).ready(function() {

    /**
     * Receives the form submission when a user searches for a title to add to
     * their posts.
     * @param  {string} formSelector     [selector to retrieve the form]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [Inserts HTML markup that produces a list of
     * title results into a div with the class 'title-search-results']
     */
    var searchTitle = function(formSelector, responseSelector) {
        $(formSelector).submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/profile.php',
                data: formData,
                success: function(response) {
                    console.log(formData);
                    $(responseSelector).html(response);
                    styleTitleDiv();
                }
        });

        });
    };

    /**
     * TODO: Make the selected div change color and others remain white
     * [description]
     * @return {[type]} [description]
     */
    var styleTitleDiv = function() {
        $("input[name='title-selection']").change(function(){
        });
    };

    /**
     * Adds the title selected in the search-title form to the tveet form
     * via a hidden input tag, this is used to retrieve the title poster, which
     * is added to each post
     *
     * @param  {string} formSelector     [selector to retrieve the form]
     * @return {string} [the title selected will populate the value attribute
     * of the input tag with the name 'title-selection']
     */
    var addTitleToPost = function(formSelector) {
        $(formSelector).submit(function() {
            $("input[name='title-selection']").val($("input[name='title-selection']:checked").val());

        });
    };

    /**
     * Adds the string length for the tveet form's textarea
     *
     * @param  {string} inputSelector     [selector to retrieve the text]
     * @param  {string} responseSelector [selector to add results to]
     * @return {int} [Inserts the length of the textarea's content into the
     * div with the id 'character-count' as the user enters input]
     */
    var addCharacterCount = function(inputSelector, responseSelector) {
        $(inputSelector).keyup(function() {
            var tveetLength = $(inputSelector).val().length;
            $(responseSelector).html(140 - tveetLength);

            if (tveetLength > 140) {
                $(responseSelector).css('color', 'red');
            }
            else {
                $(responseSelector).css('color', 'black');
            }
        });
    };

    /**
     * Intercepts the tveet form submission if the length of the textarea is
     * too long (greater than 140 characters) or empty (equal to 0)
     *
     * @param  {string} formSelector [selector to retrieve thr form]
     * @param  {string} inputSelector     [selector to retrieve the text]
     * @return {form_submission_cancellation} [Posts have a max length of 140
     * characters]
     */
    var stopFormSubmit = function(formSelector, inputSelector) {
        $(formSelector).submit(function(event) {
            var tveetLength = $(inputSelector).val().length;
            if (tveetLength > 140 || tveetLength === 0) {
                event.preventDefault();
            }
        });

    };

    /**
     * Reset title search results
     * @param  {string} inputSelector     [selector to retrieve the text]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [Inserts an empty string into a div with a class
     * 'title-search-results']
     */
    var resetFields = function(inputSelector, responseSelector) {

        $(inputSelector).keyup(function(event) {
            if ($(this).val() <= 1) {
                $(responseSelector).html('');
            }
        });

    };

    // Function calls
    searchTitle('.search-title', '.title-search-results');
    addTitleToPost('#tveet-form');
    addCharacterCount('#tveet-form textarea', '#character-count');
    stopFormSubmit('#tveet-form', '#tveet-form textarea');
    resetFields('#search-title-query', '.title-search-results');
});
