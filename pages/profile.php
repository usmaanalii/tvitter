<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/css/header.css">
        <link rel="stylesheet" href="../src/css/center-page.css">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 5%;
            }

            ul {
                text-align: center;
            }

            #welcome-user-message {
                text-align: center;
            }

            #welcome-user-message span {
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

            form.edit-profile-form {
                margin-bottom: 2px;
            }

            form .edit-profile-button {
                display: block;
                margin: 0 auto;
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

            #tveet-form input {
                display: block;
                margin: 0 auto;
            }

            #tveet-form textarea {
                width: 70%;
                height: 50px;
            }

            #timeline-navigation {
                text-align: center;
            }

            .posts-section .post:not(:first-child) {
                margin-top: 3%;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
                word-wrap: break-word;
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
                margin-bottom: 1%;
            }

            h6.post-time {
                display: inline;
                /*margin-left: 95%;*/
                margin-top: 20px;
                color: rgb(184, 178, 178);
            }

            h6.post-time:hover {
                color: rgb(168, 165, 165);
                cursor: none;
            }

            .post .delete-button {
                float: right;
                margin: 0;
                padding: 0;
            }

        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <?php
            include_once '../components/navigation/loggedin-navigation.php';
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
        <h4 id="welcome-user-message">Welcome <span><?php echo $username ?></span></h4>

        <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

        <?php if ($_SESSION['username'] == $_GET['username']): ?>
            <form class="edit-profile-form" action="../logic/profile.php?username=<?php echo $username; ?>" method="post">
                <input class="edit-profile-button "type="submit" name="edit-profile" value="?">
            </form>
        <?php endif; ?>

        <div class="profile-bio">
            <p>
                <?php
                    require_once __DIR__ . "/../logic/profile.php";

                    echo $current_profile->bio;
                ?>

            </p>
        </div>

        <div class="container">

        <div class="posts-section">
            <form id="tveet-form" action="../logic/profile.php?recipient=<?php echo $username ?>" method="post">
                <textarea name="post-message"></textarea>
                <br>
                <input type="submit" name="post-message-submit" value="tveet">
            </form>

        <h2 id="timeline-navigation">Timeline</h2>

            <?php
                // individual posts
                require_once __DIR__ . "/../components/profile/posts.php";
            ?>
        </div>
    </div>
        <script src="../src/js/ajax/deletePostProfile.js"></script>
    </body>
</html>
