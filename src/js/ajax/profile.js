$(document).ready(function() {

    var searchtitle = function() {
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

    var styleTitleDiv = function() {
        $("input[name='title-selection']").change(function(){
            // TODO: Make the selected div change color and others remain white
        });
    };

    var addtitleToPost = function() {
        $('#tveet-form').submit(function() {
            $("input[name='title-selection']").val($("input[name='title-selection']:checked").val());

        });
    };

    var addCharacterCount = function() {
        $('#tveet-form textarea').keyup(function() {
            $('#character-count').html(140 - $('#tveet-form textarea').val().length);
        });
    };

    var stopFormSubmit = function() {
        $('#tveet-form').submit(function(event) {
            var tveetLength = $('#tveet-form textarea').val().length;
            if (tveetLength > 140 || tveetLength === 0) {
                event.preventDefault();
            }
        });

    };

    /**
     * reset ajax error displays when delete key is pressed
     * @return {[TODO: return type?]} [description]
     */
    var resetFields = function() {

        $('#search-title-query').keyup(function(event) {
            if ($(this).val() <= 1) {
                $('.title-search-results').html('');
            }
        });

    };

    // Function call
    searchtitle();
    addtitleToPost();
    addCharacterCount();
    stopFormSubmit();
    resetFields();
});
