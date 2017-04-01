<?php require_once 'database-connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="src/css/navigation.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta charset="utf-8">
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

            .ajax-response-container {
                display: inline;
                padding: 0;
                margin: 0;
            }
        </style>
        <title><?php echo $web_app; ?></title>
    </head>
    <body>

        <div class="container">

            <?php include_once 'components/navigation/registration-navigation.php'; ?>

            <h2>Register for <b> <?php echo $web_app; ?></b></h2>

        <form id="reg-form" action="logic/registration.php" method="post">
            <input id="username-input" type="text" name="username" placeholder="username">
            <div id="username-ajax-response" class="ajax-response-container"></div>
            <br><br>
            <input id="password-input" type="text" name="password" placeholder="password">
            <div id="password-ajax-response" class="ajax-response-container"></div>
            <br><br>
            <input type="submit" name="register-submit" value="Sign up">
        </form>

        <br>

        </div>

        <script src="src/js/ajax/registration.js"></script>
    </body>
</html>
