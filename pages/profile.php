<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/css/header.css">
        <link rel="stylesheet" href="../src/css/center-page.css">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            ul {
                text-align: center;
            }

            #welcome {
                text-align: center;
            }

            #welcome span {
                color: rgb(97, 242, 61);
            }

            .profile-image {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 3px solid black;
                display: block;
                margin: 0 auto;
                margin-bottom: 2%;
            }

            .profile-bio {
                width: 75%;
                display: block;
                margin: 0 auto;
            }

            .profile-bio p {
                padding: 0;
                margin: 0;
                font-size: 1,1em;
                text-align: center;
                color: red;
            }

            #tveet-form {
                text-align: center;
            }

            #tveet-form input[type="submit"] {
                display: block;
                margin: 0 auto;
            }

            #tveet-form textarea {
                width: 70%;
                height: 50px;
            }

            #timeline-header {
                text-align: center;
            }

            .posts-section .post:not(:first-child) {
                margin-top: 3%;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
            }

            .post p.sender-username {
                margin : 0;
                padding: 0;
                display: inline-block;
                font-size: 0.7em;
                font-style: italic;
                float: right;
            }

            .post p.post-body {
                font-size: 0.9em;
            }

            .post span {
                font-weight: bold;
            }

        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <?php
            include_once '../components/headers/loggedin-header.php';
        ?>

        <?php
            if (!isset($_SESSION)) {
                session_start();
            }
        ?>
        <?php
            // If the user comes from the 'log in' page, then $_SESSION is used
            // If the user comes from the 'Users' (list of all users) paee, then $_GET is used
            $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username'];
        ?>
        <h4 id="welcome">Welcome <span><?php echo $username ?></span></h4>

        <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

        <div class="profile-bio">
            <p>
                <?php
                    require_once __DIR__ . "/../logic/profile.php";

                    echo $current_profile->bio;
                ?>

            </p>
        </div>

        <br>

        <form id="tveet-form" action="../logic/profile.php?recipient=<?php echo $username ?>" method="post">
            <textarea name="post-message"></textarea>
            <input type="submit" name="post-message-submit" value="tveet">
        </form>

        <h2 id="timeline-header">Timeline</h2>

        <div class="posts-section">
            <!--
                - If the user is on his own profile, then a blank space will be
                printed before the post
                - Else the user's name will be printed prefixed with @ before
                the post
                -
                - In the top right corner of each post will be the
                recipient_username
                -
                - Both, the prefixed sender_username and recipient_username will
                be hyperlinks leading to the profile pages 
            -->
            <?php foreach ($posts as $post): ?>

                <?php if ($post['sender_username'] == $current_profile->username): ?>
                    <?php $post['sender_username'] = ""; ?>
                <?php endif; ?>

                    <div class="post">
                        <p class = "sender-username"><a href="profile.php?username=<?php echo $post['recipient_username']; ?>"><?php echo $post['recipient_username']; ?></a></p>
                        <p class="post-body">

                            <?php if ($post['sender_username'] == ""): ?>
                                <span><?php echo ""; ?> </span>
                            <?php else: ?>
                                <span><a href="profile.php?username=<?php echo $post['sender_username']; ?>">@<?php echo $post['sender_username']; ?></a> </span>
                            <?php endif; ?>

                            <?php echo $post['post_body']; ?>
                        </p>
                    </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
