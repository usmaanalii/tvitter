$(document).ready(function() {

    $('.search-movie').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'logic/search-film.php',
            data: formData,
            success: function(response) {
                console.log(formData);
                $('.ajax-response').html(response);
            }
    });

    });

});
