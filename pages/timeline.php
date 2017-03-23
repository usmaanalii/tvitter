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

            p {
                font-size: 0.9em;
            }

            h2 {
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
                /*margin-top: -0.1%;*/
            }

            .post span {
                font-weight: bold;
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
            <br><br>

            <h2>Timeline</h2>

            <div class="posts-section">
                <div class="post">
                    <p class = "sender-username">username</p>
                    <p class="post-body"><span>@user1</span> Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
                <div class="post">
                    <p class = "sender-username">username</p>
                    <p class="post-body"><span>@user1</span> Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
                <div class="post">
                    <p class = "sender-username">username</p>
                    <p class="post-body"><span>@user1</span> Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
            </div>


        </div>
    </body>
</html>
