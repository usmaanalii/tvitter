$(document).ready(function() {

    /**
     * TODO: return {css} needs to be changed to an appropriate type
     * Finds the current page and applies underline, letting users know
     * which page they are currently viewing
     * @return {css} underline style to current page
     */
    var styleActiveLink = function() {

        /**
         * Keys represent the url page names extracted by the regular
         * expression
         *
         * Values represent the text in the navigation anchor links
         * @type {Object}
         */
        var anchorValues = {
            'profile': 'Profile',
            'list-users': 'Users',
            'timeline': 'Timeline',
            'title-page': 'Search'
        };

        /**
         * Represents the 'page name' from the url
         * @type {string}
         */
        var matched_page = window.location.href.match(/pages\/(.*?)\.php/i)[1];

        /**
         * Represents the text in the anchor link of the navigation bar
         * @type {string}
         */
        var current_page = anchorValues[matched_page];

        $("#navigation li a").each(function(index) {
            if (current_page === $(this).text()) {
                $(this).addClass("active-link");
            }
            else {
                $(this).removeClass("active-link");
            }
        });
    };

    // Function calls
    styleActiveLink();
});
