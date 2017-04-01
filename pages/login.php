<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                list-style-type: none;
                margin: 0;
                padding: 0;
            }

            li {
                display: inline;
            }

            h2 {
                color: green;
            }

            .ajax-response-container {
                font-size: 0.9em;
                display: block;
                padding: 0;
                margin: 0;
            }
        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <div class="container">
            <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
            ?>

            <?php
                include_once '../components/navigation/loggedout-navigation.php';
            ?>

            <h2>Log in</h2>

            <form id="reg-form" action="../logic/login.php" method="post">
                <input type="text" name="username" placeholder="username">
                <br>
                <br>
                <input type="text" name="password" placeholder="password">
                <div id="password-ajax-response" class="ajax-response-container"></div>
                <br>
                <input type="submit" name="login-submit" value="Log in">
            </form>
        </div>

        <script src="../src/js/ajax/login.js"></script>
    </body>
</html>
