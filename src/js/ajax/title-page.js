$(document).ready(function() {

    /**
     * Receives the form submission when a user searches for a title to get
     * it's details.
     * .
     * @param  {string} formSelector     [selector to retrieve the form]
     * @param  {string} searchResultsSelector [selector for the current search
     * results, this will be removed when the user begins a new query]
     * @param  {string} titleDetailsResponseSelector [selector to add
     * title details to]
     * @return {string} [Inserts HTML markup that produces a list of
     * title results into a div with the class 'title-search-results'.
     * Also inserts a function that handles loading details of the title
     * the user selects (from the title results)]
     */
    var searchTitle = function(formSelector, searchResultsSelector,
                                titleDetailsResponseSelector) {
        $(formSelector).submit(function(event) {
            event.preventDefault();

            $(searchResultsSelector).html('');

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/title-page.php',
                data: formData,
                success: function(response) {
                    $(titleDetailsResponseSelector).html(response);
                    getTitleDetails('.title-link', '.title-details');
                }
        });

        });
    };

    /**
     * Returns details of the title that the user selects. Selection is
     * made via clicking on an anchor link associated with the title
     *
     * @param  {string} inputSelector     [selector for the anchor link
     * clicked which provides the title id via it's id attribute]
     * @param  {string} responseSelector [selector to add results to]
     * @return {string} [Loads HTML markup that produces title details,
     * such as poster, actors etc...
     * This is inserted into a div with the class 'title-details']
     */
    var getTitleDetails = function(inputSelector, responseSelector) {
        $('.title-link').click(function(event) {
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

    /**
     * Reset title detail results
     *
     * @param  {string} inputSelector     [selector to retrieve the text]
     * @param  {string} formSelector     [selector to retrieve the form]
     * @param  {string} searchResultsSelector [selector for the current search
     * results, this will be removed when the user empties the current query
     * input]
     * @param  {string} titleDetailsSelector [selector for the current title
     * details, this will be removed when the user empties the current query
     * input]
     * @return {string} [Inserts an empty string into a div with a class
     * 'title-details']
     */
    var resetFields = function(inputSelector, searchResultsSelector,
                               titleDetailsSelector) {

        $(inputSelector).keyup(function(event) {
            if ($(this).val() <= 1) {
                $(searchResultsSelector).html('');
                $(titleDetailsSelector).html('');
            }
        });

    };

    // TODO: Get this to change the span to the metacritic color
    var metacriticBackground = function() {

        $('a.title-link').click(function() {
            var rating  = $('.metacritic-rating > .rating-value > span').text();

            console.log(rating);
        });
    };

    metacriticBackground();

    // function calls
    searchTitle('.search-title', '.title-details', '.title-search-results');
    resetFields('#search-title-query', '.title-search-results', '.title-details');
});
