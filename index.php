<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="src/js/ajax/login.js"></script>
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

            h2 {
                color: green;
            }

            a#register-page-link {
                color: black;
                font-size: 0.9em;
                margin-bottom: 0.5%;
                display: block;
            }

            .ajax-response-container {
                font-size: 0.9em;
                display: block;
                padding: 0;
                margin: 0;
            }
        </style>
        <meta charset="utf-8">
        <title>Log in to tvitter</title>
    </head>
    <body>

        <div class="container">
            <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
            ?>

            <h2>Log in</h2>

            <form id="reg-form" action="logic/login.php" method="post">
                <a id="register-page-link" href="pages/registration.php">Click here to register!</a>
                <input id="username-input" type="text" name="username" placeholder="username">
                <div id="username-ajax-response" class="ajax-response-container"></div>
                <br>
                <input id="password-input" type="text" name="password" placeholder="password">
                <div id="password-ajax-response" class="ajax-response-container"></div>
                <br>
                <input type="submit" name="login-submit" value="Log in">
            </form>
        </div>

    </body>
</html>
