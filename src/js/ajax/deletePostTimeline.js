$(document).ready(function() {
    $('.delete-post-button').click(function() {
        // Selecting these elements is the only difference to deletePostProfile.js
        var postTime = $(this).parent().siblings(".post-time").html();
        var senderUsername = $(this).parent().siblings('.post-usernames').children('a').html();

        $.ajax({
             type: "POST",
             url: '../logic/functionality/delete-post.php',
             data:{'post-time': postTime, 'post-username': senderUsername},
             success:function() {
             }

        });

        location.reload();
    });
});

// For timeline page
// var postTime = $(this).parent().siblings(".post-time").html();
// var senderUsername = $(this).parent().siblings('.post-usernames').children('a').html()
