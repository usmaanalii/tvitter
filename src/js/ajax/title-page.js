$(document).ready(function() {

    /**
     * Receives the form submission when a user searches for a title to get
     * it's details.
     * .
     * @return {string} [Inserts HTML markup that produces a list of
     * title results into a div with the class 'title-search-results'.
     * Also inserts a function that handles loading details of the title
     * the user selects (from the title results)]
     */
    var searchTitle = function() {
        $('.search-title').submit(function(event) {
            event.preventDefault();

            $('.title-details').html('');

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../logic/title-page.php',
                data: formData,
                success: function(response) {
                    $('.title-search-results').html(response);
                    getTitleDetails();
                }
        });

        });
    };

    /**
     * Returns details of the title that the user selects. Selection is
     * made via clicking on an anchor link associated with the title
     * @return {string} [Loads HTML markup that produces title details,
     * such as poster, actors etc...
     * This is inserted into a div with the class 'title-details']
     */
    var getTitleDetails = function() {
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
     * @return {string} [Inserts an empty string into a div with a class
     * 'title-details']
     */
    var resetFields = function() {

        $('#search-title-query').keyup(function(event) {
            if ($(this).val() <= 1) {
                $('.title-search-results').html('');
                $('.title-details').html('');
            }
        });

    };

    // function calls
    searchTitle();
    resetFields();

});
