<!DOCTYPE html>
<html>
    <head>
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
                font-size: 0.8em;
            }

            #post-message {
                text-align: center;
            }

            #post-message input[type="submit"] {
                display: block;
                margin: 0 auto;
            }

            #timeline-header {
                text-align: center;
            }

            .posts-section .post:not(:first-child) {
                margin-top: 1%;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
            }

            .post p {
                font-size: 0.9em;
            }

        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <div class="container">

            <?php
                include_once '../components/headers/loggedin-header.php';
            ?>

            <h4 id="welcome">Welcome User</h4>

            <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

            <div class="profile-bio">
                <p><p>Reprehenderit enim consectetur fugiat labore cupidatat culpa labore. Ea reprehenderit excepteur aliqua ut do occaecat ad excepteur sit irure excepteur officia aliqua aute adipisicing cillum.</p></p>
            </div>

            <br>

            <form id="post-message" action="../posts-logic.php" method="post">
                <textarea name="post-message" rows="4" cols="50"></textarea>
                <input type="submit" name="post-message-submit" value="tveet">
            </form>

            <h2 id="timeline-header">Timeline</h2>

            <div class="posts-section">
                <div class="post">
                    <h4>Post 1</h4>
                    <p>Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
                <div class="post">
                    <h4>Post 2</h4>
                    <p>Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
                <div class="post">
                    <h4>Post 3</h4>
                    <p>Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
            </div>
        </div>
    </body>
</html>
