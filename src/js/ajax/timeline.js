$(document).ready(function() {

    var resetPosts = function() {

        $('input[name="search-input"]').keyup(function(event) {
            if ($(this).val() < 1) {
                $('form.search-posts').submit();
            }
        });
    };

    resetPosts();
});
