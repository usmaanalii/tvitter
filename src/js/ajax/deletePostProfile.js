$(document).ready(function() {
    $('.delete-post-button').click(function() {
        var postTime = $(this).siblings(".post-time").html();
        var senderUsername = $(this).siblings(".sender-username").children('a').html();

        $.ajax({
             type: "POST",
             url: '../logic/functionality/delete-posts.php',
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
