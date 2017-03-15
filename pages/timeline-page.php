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

            p {
                font-size: 0.9em;
            }

            h2 {
                text-align: center;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
            }

            .posts-section .post:not(:first-child) {
                margin-top: 1%;
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
